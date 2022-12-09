@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
<h1>User</h1>
@stop

@section('content')

@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" value="{{old('first_name')}}" name="first_name" placeholder="First name">
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" value="{{old('last_name')}}" name="last_name" placeholder="Last name">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="email" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label>Contact No</label>
        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" name="phone" placeholder="phone">
    </div>

    <div class="form-group">
        <select class="form-select" name="company_id" aria-label="Default select example">
            <option disabled selected>Select the company</option>
            @foreach(\App\Models\Company::all() as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop