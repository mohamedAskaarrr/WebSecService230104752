@extends('layouts.master')

@section('title', 'Your Basket')
@section('content')


<div class="container mt-5">
    <h2 class="mb-4 text-success">🧺 Your Basket</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Basket items table -->
    @if(count($basket) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center shadow-lg rounded">
                <thead class="bg-success text-white">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="basket-body">
                    @php $grandTotal = 0; @endphp
                    @foreach($basket as $item)
                        @php
                            $total = $item['price'] * $item['quantity'];
                            $grandTotal += $total;
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ $item['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ $total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <h5 class="text-success font-weight-bold">Total: <span class="display-4">${{ $grandTotal }}</span></h5>
        </div>
    @else
        <div class="alert alert-warning text-center shadow-sm rounded">Your basket is empty.</div>
    @endif
</div>

@endsection

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <style>
        /* Overall body style */
        body {
            background-color: #f5f5f5; /* Soft light grey background */
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background-color: #ffffff; /* Pure white background */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Table styles */
        table {
            border-collapse: collapse;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }

        table th {
            background-color: #28a745; /* Green header */
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2; /* Light grey for even rows */
        }

        /* Alert and success messages */
        .alert {
            font-weight: bold;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .alert-warning {
            background-color: #ffc107;
            color: black;
        }

        /* Grand total styling */
        .d-flex .display-4 {
            color: #28a745;
            font-weight: bold;
        }

        .text-success {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Styling for Checkout Button */
        .btn-checkout {
            background-color: #28a745;
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
            border: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #218838;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Alert Warning Styling */
        .alert-warning {
            border-radius: 5px;
        }
    </style>
@endsection
