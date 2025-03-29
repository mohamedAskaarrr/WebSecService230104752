@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-center">Supermarket Bill</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Apples</td>
                                        <td>$2.50</td>
                                        <td>3</td>
                                        <td>$7.50</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Milk</td>
                                        <td>$1.80</td>
                                        <td>2</td>
                                        <td>$3.60</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Bread</td>
                                        <td>$1.50</td>
                                        <td>2</td>
                                        <td>$3.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="text-danger">Total: <strong>$14.10</strong></h5>
                            <button type="button" class="btn btn-success">Print Receipt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
