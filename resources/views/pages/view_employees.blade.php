@extends('layouts.app')

@section('content')

<div class="container">
@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<div class="row">
<button type="button"  class="btn btn-outline-primary" onclick="location.href='{{ url('employees/create') }}'">+ Add Employee</button>
</div>

<br/>
<div class="row">
<h4>Employee Master List</h4>
</div>

<div class="row">
<table class="table table-hover">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID Number</th>
      <th scope="col">Name</th>
      <th scope="col">Position</th>
      <th scope="col">Project</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
@foreach ($employees as $employee)
    <tr>
      <th scope="row">{{ $employee->employee_id }}</th>
      <td>{{ $employee->id_number }}</td>
      <td>{{ $employee->last_name . ', ' . $employee->first_name . ' ' . $employee->middle_name }}</td>
      <td>@isset ($employee->position->name) {{ $employee->position->name }} @endisset</td>
      <td>@isset ($employee->project->name) {{ $employee->project->name }} @endisset</td>
      <td><a href="{{ url('employees/' . $employee->employee_id . '/edit') }}">Edit</a></td>
      <td><form action="{{ url('employees/' . $employee->employee_id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <input type="submit" value="Delete">
    </form></td>
    </tr>
@endforeach
  </tbody>
</table>

  </div>
@endsection
