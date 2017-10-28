@extends('layouts.app')

@section('content')


<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Franky</td>
      <td><a href="Edit">X</a></td>
      <td><a href="Delete">Z</a></td>
    </tr>
    </tr>
  </tbody>
</table>

@endsection