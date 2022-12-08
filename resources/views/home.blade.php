@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Companies</h1>
@stop

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Web</th>
    </tr>
  </thead>
  <tbody>
    @forelse($companies as $company)
    <tr>
      <td>{{$company->name}}</td>
      <td>{{$company->email}}</td>
      <td>{{$company->website}}</td>
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
</script>
@stop