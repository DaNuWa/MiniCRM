@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
<h1>Companies</h1>
@stop

@section('content')

@include('flash::message')

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Web</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($companies as $company)
    <tr>
      <td>{{$company->name}}</td>
      <td>{{$company->email}}</td>
      <td>{{$company->website}}</td>
      <td><img src="{{asset('storage/companies/'.$company->image_path)}}" alt="companyimage"></td>
   <td>
    <a href="{{route('companies.edit',$company->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
    <form action="{{route('companies.destroy',$company->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </td>
   
    </tr>
    @empty
    @endforelse
  </tbody>
</table>@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
   $(document).ready( function () {
    $('.table').DataTable();
} );
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

</script>
@stop