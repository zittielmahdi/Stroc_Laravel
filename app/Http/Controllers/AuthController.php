<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\PubRequest;
use App\Http\Requests\UserRequest;
use App\Mail\ContactMail;
use App\Mail\ForgetPasswordMail;
use App\Models\Command;
use App\Models\Comment;
use App\Models\Employe;
use App\Models\Product;
use App\Models\Publication;
use App\Models\role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Stripe\Stripe;

class AuthController extends Controller
{
    public function SignUp(UserRequest $userRequest)
    {
        $cred = $userRequest->validated();
        $user = User::create([
            'name' => $cred['name'],
            'email' => $cred['email'],
            'password' => $cred['password']
        ]);
        DB::table('password_reset_tokens')->insert([
            'email' => $cred['email'],
            'token' => Str::random(64),
            'created_at' => now(),
        ]);
        $role = role::where('role', 'User')->first();
        $user->roles()->attach($role);
        return redirect('login_page');
    }
    public function Login(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|email|max:60|min:10',
            'password' => 'required|string|max:16|min:8',
        ]);
        $Role = '';
        if (auth()->attempt($cred)) {

            foreach (auth()->user()->roles as $role) {
                $Role = $role->role;
            }
            if ($Role == "Admin") {
                return redirect('admin_panel');
            } else {
                return redirect('main_vue_user');
            }
        }
        return redirect('signup_page');
    }
    public function LogOut()
    {
        auth()->logout();
        return redirect('login_page');
    }
    public function GetUsers()
    {
        $users = User::all();
        return view('User_Managing_Panel', ['users' => $users]);
    }
    public function DeleteUser(string $id)
    {
        User::find($id)->delete();
        return redirect('users_managing_panel');
    }
    public function AddProduct(ProductRequest $productRequest)
    {
        $filename = '';
        $details = $productRequest->validated();

        $product = Product::withTrashed()->where('product_name', $details['product_name'])->first();

        if ($product) {
         $product->restore();
         }
         else {
            if ($productRequest->hasFile('image')) {
                $file = $productRequest->file('image');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('Uploads/Images/'), $filename);
            }
            Product::create([
                'product_name' => $details['product_name'],
                'brand' => $details['brand'],
                'serial_number' => $details['serial_number'],
                'price_per_unit' => $details['price_per_unit'],
                'tva' => $details['tva'],
                'quantity' => $details['quantity'],
                'image' => $filename
            ]);
        }




        return redirect('product_managing_panel');
    }
    public function GetProduct()
    {
        $products = Product::all();
        return view('Product_Managing_Panel2', ['products' => $products]);
    }
    public function DeleteProduct(string $id)
    {
        Product::find($id)->delete();
        return redirect('product_managing_panel2');
    }
    public function EditProduct(string $id)
    {
        $prod = Product::find($id);
        return view('Edit_Product_Managing_Panel', ['prod' => $prod]);
    }
    public function UpdateProduct(string $id, ProductRequest $productRequest)
    {
        $filename = '';
        $details = $productRequest->validated();
        if ($productRequest->hasFile('image')) {
            $file = $productRequest->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('Uploads/Images/'), $filename);
        }
        Product::find($id)->update([
            'product_name' => $details['product_name'],
            'brand' => $details['brand'],
            'serial_number' => $details['serial_number'],
            'price_per_unit' => $details['price_per_unit'],
            'tva' => $details['tva'],
            'quantity' => $details['quantity'],
            'image' => $filename
        ]);
        return redirect('product_managing_panel2');
    }

    public function AddPub(PubRequest $pubRequest)
    {
        $filename = '';
        $details = $pubRequest->validated();
        if ($pubRequest->hasFile('image')) {
            $file = $pubRequest->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('Uploads/Images/'), $filename);
        }
        Publication::create([
            'title' => $details['title'],
            'objectif' => $details['objectif'],
            'description' => $details['description'],
            'image' => $filename,
        ]);

        return redirect('publication_managing_panel');
    }
    public function GetPub()
    {
        $pubs = Publication::all();
        return view('Publication_Managing_Panel2', ['pubs' => $pubs]);
    }
    public function DeletePub(string $id)
    {
        Publication::find($id)->delete();
        return redirect('publication_managing_panel2');
    }
    public function EditPub(string $id)
    {
        $pub = Publication::find($id);
        return view('Edit_Publication_Managing_Panel', ['pub' => $pub]);
    }
    public function UpdatePub(string $id, PubRequest $pubRequest)
    {
        $filename = '';
        $details = $pubRequest->validated();
        if ($pubRequest->hasFile('image')) {
            $file = $pubRequest->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('Uploads/Images/'), $filename);
        }
        Publication::find($id)->update([
            'title' => $details['title'],
            'objectif' => $details['objectif'],
            'description' => $details['description'],
            'image' => $filename,
        ]);
        return redirect('publication_managing_panel2');
    }

    public function GetNews()
    {
        $news = Publication::all();
        return view('User_News_Interface', compact('news'));
    }
    public function SendToken(Request $request)
    {
        $cred = $request->validate([
            'email' => 'email|required|max:60|min:10'
        ]);
        $resetCred = DB::table('password_reset_tokens')->where('email', $cred['email'])->first();

        if (DB::table('password_reset_tokens')->where('email', $cred['email'])->exists()) {
            $token = $resetCred->token;
            Mail::to($cred['email'])->send(new ForgetPasswordMail($token));
            return redirect()->back();
        } else {
            return redirect('signup_page');
        }
    }
    public function ResetPasswordView(string $token)
    {
        $resetCred = DB::table('password_reset_tokens')->where('token', $token)->first();
        $email = $resetCred->email;
        return view('Reset_Password', compact('email'));
    }

    public function ChangePassword(Request $request)
    {
        $cred = $request->validate([
            'email' => 'required|email|max:60|min:10',
            'password' => 'required|confirmed|min:8|max:16'
        ]);

        User::where('email', $cred['email'])->update([
            'password' => Hash::make($cred['password'])
        ]);

        return redirect('login_page');
    }

    public function ContactUs(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:30|min:2',
            'email' => 'required|email|max:60|min:10',
            'message' => 'required|max:60|min:2',
        ]);
        Mail::to('zittimehdi138@gmail.com')->send(new ContactMail($data));
        return redirect()->back();
    }

    public function ReadMore(string $id)
    {

        $new = Publication::find($id);
        return view('News_Details_Interface', compact('new'));
    }

    public function SendComments(string $id, Request $request)
    {
        $desc = $request->validate([
            'description' => 'required|string|max:100|min:1'
        ]);
        Publication::find($id)->comments()->create([
            'publication_id' => $id,
            'commentator_name' => auth()->user()->name,
            'commentator_email' => auth()->user()->email,
            'description' => $desc['description']
        ]);
        return redirect()->back();
    }

    public function SendReplies(string $id, Request $request)
    {
        $desc = $request->validate([
            'reply' => 'required|string|max:30|min:1'
        ]);
        Comment::find($id)->replies()->create([
            'comment_id' => $id,
            'replitator_name' => auth()->user()->name,
            'replitator_email' => auth()->user()->email,
            'reply' => $desc['reply']
        ]);
        return redirect()->back();
    }
    public function GetAllProd()
    {
        $products = Product::all();
        return view('Product_Review_Interface', compact('products'));
    }

    public function SearchProd(Request $request)
    {
        $ref = $request->validate([
            'searched_prod' => 'required|max:20|min:1'
        ]);
        $letter = $ref['searched_prod'];
        $products = Product::where('id', $ref['searched_prod'])
            ->orWhere('product_name', $ref['searched_prod'])
            ->orWhere('brand', $ref['searched_prod'])
            ->orWhereRaw("brand like '%$letter%'")
            ->orWhereRaw("product_name like '%$letter%'")
            ->get();
        return view('Product_Review_Interface', ['products' => $products]);
    }

    public function SearchPub(Request $request)
    {
        $ref = $request->validate([
            'searched_pub' => 'required|max:20|min:1'
        ]);
        $letter = $ref['searched_pub'];

        $news = DB::table('publications')
            ->where([
                ['id', '=', $ref['searched_pub']],
            ])
            ->orWhereRaw("title like '%$letter%'")
            ->orWhereRaw("objectif like '%$letter%'")
            ->get();
        return view('User_News_Interface', compact('news'));
    }

    public function AddNewEmployee(Request $request){
      $details=$request->validate([
        'full_name'=>'required|string|max:20|min:2',
        'email'=>'required|email|max:40|min:10',
        'description'=>'required|string|max:999|min:1',
        'image'=>'required',
      ]);
      $filename='';
      if ($request->hasFile('image')) {
       $file=$request->file('image');
       $filename=$file->getClientOriginalName();
       $file->move(public_path('Uploads/Images/'),$filename);
      }

      Employe::create([
        'full_name'=>$details['full_name'],
        'email'=>$details['email'],
        'description'=>$details['description'],
        'image'=>$filename
      ]);

      return redirect()->back();
    }

    public function GetAllEmp(){
        $employes=Employe::all();
        return view('New_Employe_Managing_Panel2',compact('employes'));
    }

    public function DeleteEmp(string $id){
     Employe::find($id)->delete();
     return redirect()->back();
    }

    public function EditEmp(string $id){
     $employe=Employe::find($id);
     return view('Edit_New_Employe_Managing_Panel',['employe'=>$employe]);
    }
    public function UpdateEmp(string $id,Request $request){
      $details=$request->validate([
        'full_name'=>'required|string|max:20|min:2',
        'email'=>'required|email|max:40|min:10',
        'description'=>'required|string|max:999|min:1',
        'image'=>'required',
      ]);
      $filename='';
      if ($request->hasFile('image')) {
        $file=$request->file('image');
        $filename=$file->getClientOriginalName();
        $file->move(public_path('Uploads/Images/'),$filename);
      }
      Employe::find($id)->update([
        'full_name'=>$details['full_name'],
        'email'=>$details['email'],
        'description'=>$details['description'],
        'image'=>$filename
      ]);

      return redirect('new_employe_managing_panel2');
    }

    public function ShowCaseEmp(){
        $employes=Employe::all();
        return view('Employe_Showcase_Panel',compact('employes'));
    }

    public function ChosenProduct(string $id){
      $product=Product::find($id);
      return view('Chosen_Product_Details',compact('product'));
    }
    public function PayCheck(string $id,Request $request){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session= \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => Product::find($id)->product_name,
                            'description' => 'Meilleur produit a Stroc',
                        ],
                        'unit_amount' => Product::find($id)->price_per_unit,
                    ],
                    'quantity' => $request->get('quantity'),
                ],

            ],
            'mode' => 'payment',
            'success_url' => route('payment_success', ['id' => $id, 'quantity' => $request->quantity]),
            'cancel_url' => route('product_review_panel'),

        ]);

        return redirect()->away($session->url);
    }


    public function CommandRegistred(string $id,string $quantity){
        $user=User::find(Auth::id());
        $product=Product::find($id)->first();
        $user->products()->attach($product,
        [
          'user_id'=>auth()->id(),
          'product_id'=>$id,
         'quantity' => $quantity,
         'total' =>$quantity*Product::find($id)->price_per_unit+($quantity*Product::find($id)->price_per_unit*Product::find($id)->tva)/100,
         'created_at'=>now(),
         'updated_at'=>now()
        ]);

        if (Product::find($id)->quantity==$quantity) {
            Product::find($id)->delete();
        }
        else {
            Product::find($id)->update([
               'quantity'=>Product::find($id)->quantity-$quantity
            ]);
        }

        return view('Payment_Success');
    }

    public function getUserProd(){
        $user=Auth::user();
        return view('User_Shopping_List_Panel',compact('user'));
    }

    public function FindCommand(string $id){
     $command=Command::find($id);
     return view('Follow_Command_Panel',compact('command'));
    }

    public function FollowAllClientsCommands(){
        $Clients=User::all();
        return view('Follow_Clients_Commands_Panel',['Clients'=>$Clients]);
    }

    public function UpdateStat(Request $request,string $id){
        $status=$request->get('Status');
         Command::find($id)->update([
            'Status'=>$status
         ]);

         return redirect()->back();
    }

    public function Charts(){
        $chart_options=[
            'chart_title'=>'Commandes Par Jour',
            'report_type'=>'group_by_date',
            'model'=>'App\Models\Command',
            'group_by_field'=>'created_at',
            'group_by_period'=>'day',
            'chart_type'=>'bar'
        ];
        $chart=new LaravelChart($chart_options);
        return view('Charts_Managing_Panel',compact('chart'));
    }

    public function PDFDownLoad(string $id){
         $command=Command::find($id);
         $pdf=PDF::loadview('Facture_Dowload',['command'=>$command]);
         return $pdf->download('commande'.$id.'.pdf');

        //return view('Facture_Dowload',['command'=>$command]);
    }
}

