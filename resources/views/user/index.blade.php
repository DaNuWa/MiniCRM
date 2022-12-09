@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

@include('flash::message')

<table class="table">
  <thead>
    <tr>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Company</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($users as $user)
    <tr>
      <td>{{$user->first_name}}</td>
      <td>{{$user->last_name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->company->name}}</td>

   <td>
    <a href="{{route('users.edit',$user->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
    <a href="{{route('users.destroy',$user->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
  </td>
   
    </tr>
    @empty
    @endforelse
  </tbody>
</table>

{{ $users->links() }}


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
   $(document).ready( function () {
    // $('.table').DataTable();
} );
</script>
@stop