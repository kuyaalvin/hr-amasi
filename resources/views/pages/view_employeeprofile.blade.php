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
  <h3>Employee Project History</h3>
  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Assigned Projects</th>
                  <th>Date Transferred</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Project A</td>
                  <td>Project B</td>
                </tr>
              </tbody>
         </table>
    </div>
</div>