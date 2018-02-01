@extends('layouts.app')

@section('content')

<h3>Employee Profile - {{ old('last_name', $employee->last_name) }}, {{ old('first_name', $employee->first_name) }} {{ old('middle_name', $employee->middle_name) }} </h3>

<@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif

<div class="row">
    <nav class="nav flex-column">
      <li class="nav-item">
      <button type="button"  class="btn btn-primary" onclick="location.href='{{ url() }}'">+ Edit Employee Information</button>
      </li>
    </nav>
</div>

<div class="row">
	
</div>