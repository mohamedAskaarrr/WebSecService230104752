


@extends('layouts.master')


@section('title', 'Home')

@section('content')
@role('Admin')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="{{ route('products_list') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
            @role('Admin')
            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53</h3>
                        <p>Active Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('users') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            @endrole
            
            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>Prime Numbers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <a href="./prime" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
       
        </div>
    </div>
</div>
@endrole
<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <br>
                    <div class="card-header">
                        <h3 class="card-title">Welcome to Askarr Store</h3>
                    </div>
                    <div class="card-body">
                        <p>This is the home page of Askarr Store. Browse our products and enjoy your shopping experience.</p>
                    </div>
                </div>
            </div>
@endsection