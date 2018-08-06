@extends('layouts.app')

@section('content')

<h1>Position List</h1>

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">
        <button type="button"  class="btn btn-primary" onclick="location.href='{{ url('positions/create') }}'">+ Add Position</button>
      </li>
  </div>
    </nav>
</div>

<hr/>

@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif

<div class="row">
  <div class="col">
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Type</th>
      <th>Position Level</th>
      <th>Department </th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
</table>
  </div>
</div>
@endsection



@push('scripts')
<script>

$(document).ready(function(){
  
  $("#header_position").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");

});



$(function() {
var prefixUrl = "{{ url('positions') . '/' }}";

var table = $('.table').DataTable({
        serverSide: true,
        processing: true,
        ajax: '',
order: [],
        columns: [
        	{data: 'name'},
          {data: 'type'},
          {data: 'type'},
          {data: 'type'},
        	{data: 'edit',
        searchable: false,
        orderable: false,
        render: function(data, type, row) {
        return '<a class="btn btn-sm btn-dark" href="'+prefixUrl+row.position_id+'/edit">Edit</a>';
        }
        },
        	{data: 'delete',
            searchable: false,
            orderable: false,
            render: function(data, type, row) {
            	return '<form action="'+prefixUrl+row.position_id+'" method="post">'+
            	'{{ csrf_field() }}'+
            	'{{ method_field('delete') }}'+
            	'<input class="btn btn-sm btn-danger" onclick=\"return confirm(\'Do you want to delete this record?\')\" type="submit" value="Delete"/>'+
            	'</form>';	
            }
            	}
        	]
    });

});
</script>
@endpush
