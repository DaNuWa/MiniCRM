@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
<h1>Company</h1>
@stop

@section('content')
<form>
<div class="form-group">
    @csrf
    <label >Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{old('name')}}" name="name" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email"  class="form-control"  placeholder="email" name="email" value="{{old('email')}}">
  </div>
  <div class="form-group">
  <label >Web site</label>
    <input type="url"  class="form-control" name="website" value="{{old('website')}}" >
  </div>

  <div class="form-group">
  <label >Image</label>
    <input type="file"  class="form-control" name="image" value="{{old('image')}}" >
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop