@extends('layouts.app')

@section('content')


@if (session('message'))
<h4>{{ session('message') }}</h4>
@endif

<a href="{{ url('positions/create') }}">Add Position</a>
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
@foreach ($positions as $position)
    <tr>
      <th scope="row">{{ $position->position_id }}</th>
      <td>{{ $position->name }}</td>
      <td><a href="{{ url('positions/' . $position->position_id . '/edit') }}">Edit</a></td>
<td><form action="{{ url('positions/' . $position->position_id) }}" method="post">
{{ csrf_field() }}
{{ method_field('delete') }}
<input type="submit" value="Delete"/>
</form></td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection