@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
<h1>Company</h1>
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

<form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" value="{{old('name')}}" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="email" name="email" value="{{old('email')}}">
  </div>
  <div class="form-group">
    <label>Web site</label>
    <input type="url" class="form-control" name="website" value="{{old('website')}}">
  </div>

  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="image" value="{{old('image')}}">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop