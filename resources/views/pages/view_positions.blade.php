@extends('layouts.app')

@section('content')

@include('layouts.sidebaremployee')

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
$(function() {
var prefixUrl = "{{ url('positions/') . '/' }}";

var table = $('.table').DataTable({
        serverSide: true,
        processing: true,
        ajax: '',
        columns: [
        	{data: 'name'},
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
            	'<input class="btn btn-sm btn-danger" type="submit" value="Delete"/>'+
            	'</form>';	
            }
            	}
        	],
    });

});
</script>
@endpush
