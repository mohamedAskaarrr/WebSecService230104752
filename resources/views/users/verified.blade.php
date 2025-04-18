@extends('layouts.master')
 @section('title', 'User Profile')
 @section('content')
 <div  class="row"> <div class="m-4 col-sm-6"> <div class="alert alert-success">
 <strong>
 {{$user->email}} is verified.Congratulation!
 </div>
 </div>
 </div>
 @endsection
 </strong>
 Dear {{$user->name}}, your email  is verified.