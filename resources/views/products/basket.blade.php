@extends('layouts.master')

@section('title', 'Your Basket')

@section('content')
<div class="container mt-5 mb-5">
    @if(session('success'))
        <div class="alert alert-success shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning shadow-sm text-center">
            {{ session('warning') }}
        </div>
    @endif

    @if(count($basketItems) > 0)
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle shadow-sm rounded">
                <thead class="table-success">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="basket-body">
                    @php $grandTotal = 0; @endphp
                    @foreach($basketItems as $item)
                        @php
                            $total = $item->price * $item->quantity;
                            $grandTotal += $total;
                        @endphp
                        <tr>
                            <td>
                                @if($item->photo)
                                    <img src="{{ asset('images/' . $item->photo) }}" class="img-thumbnail" width="80" alt="{{ $item->name }}">
                                @else
                                    <div class="no-image">No Image</div>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $item->name }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($total, 2) }}</td>
                            <td>
                                <form action="{{ route('products.removeFromBasket', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Grand Total:</td>
                        <td colspan="2" class="text-success fw-bold">${{ number_format($grandTotal, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('products_list') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Continue Shopping
            </a>
            <form action="{{ route('products.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-credit-card"></i> Checkout
                </button>
            </form>
        </div>
    @else
        <div class="alert alert-warning text-center shadow-sm">
            Your basket is empty. <a href="{{ route('products_list') }}" class="alert-link">Start shopping</a>
        </div>
    @endif
</div>
@endsection

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-success {
            transition: 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .no-image {
            width: 80px;
            height: 80px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.75rem;
            border-radius: 0.25rem;
        }

        .img-thumbnail {
            border-radius: 8px;
            transition: transform 0.2s ease-in-out;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }

        .alert {
            font-weight: 500;
        }
    </style>
@endsection
