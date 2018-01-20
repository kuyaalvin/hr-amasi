@extends('layouts.app')

@section('content')

<h3>Employee Profile - *insert employee fullname*</h3>

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