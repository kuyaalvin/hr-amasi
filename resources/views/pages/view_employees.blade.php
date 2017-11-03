@extends('layouts.app')

@section('content')

@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<a href="{{ url('employees/create') }}">Add Employee</a>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>ID Number</th>
      <th>Name</th>
      <th>Position</th>
      <th>Project</th>
      <th>Edit</th>
      <th>Delete</th>
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
<td><form class="deleteEmployeeForm" action="{{ url('employees/' . $employee->employee_id) }}" method="post">
{{ csrf_field() }}
{{ method_field('delete') }}
<input type="submit" value="Delete">
</form></td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection
