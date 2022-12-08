@extends('adminlte::page')

@section('title', 'Company')

@section('content_header')
<h1>Company</h1>
@stop

@section('content')
<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" disabled class="form-control"  placeholder="Password">
  </div>
  <div class="form-group">
  <label >Web site</label>
    <input type="url" disabled class="form-control" value="{{$company->website}}">
  </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop