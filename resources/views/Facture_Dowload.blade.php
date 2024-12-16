@php
use App\Models\Product;
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture Stroc</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .invoice-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 90%;
            text-align: left;
        }

        .invoice-header {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .invoice-header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
            flex: 1;
        }

        .invoice-logo img {
            max-height: 60px;
            margin-right: 20px;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .invoice-details label {
            font-weight: bold;
            color: #666;
        }

        .invoice-details h4 {
            margin: 5px 0;
        }

        .invoice-item {
            margin-bottom: 20px;
        }

        .invoice-item label {
            font-weight: bold;
            color: #666;
        }

        .invoice-item h4 {
            margin: 5px 0;
            color: #333;
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="invoice-header">
        <div class="invoice-logo">

        </div>
        <h1>Facture</h1>
    </div>

    <div class="invoice-details">
        <label>Industrie:</label>
        <h4>STROC</h4>
        <label>L'Acheteur:</label>
        <h4>{{ auth()->user()->name }}</h4>
        <label>Email:</label>
        <h4>{{ auth()->user()->email }}</h4>
        <label>ID Commande:</label>
        <h4>{{ $command->id }}</h4>
    </div>

    <div class="invoice-item">
        <label>Marque Produit:</label>
        <h4>{{ Product::withTrashed()->find($command->product_id)->brand }}</h4>
        <label>Nom Produit:</label>
        <h4>{{ Product::withTrashed()->find($command->product_id)->product_name }}</h4>
        <label>Quantité Commandée:</label>
        <h4>{{ $command->quantity }}</h4>
        <label>Prix Total:</label>
        <h4>${{ $command->total }}</h4>
    </div>
</div>

</body>
</html>






