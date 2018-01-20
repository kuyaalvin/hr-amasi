@extends('layouts.app')

@section('content')



<h1>Project List</h1>

@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">
      <button type="button"  class="btn btn-primary" onclick="location.href='{{ url('projects/create') }}'">+ Add Project</button>
      </li>
    </nav>
  </div>
</div>

<hr/>
<div class="row">
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
</table>
</div>
@endsection

@push('scripts')
<script>
$(function() {
	var prefixUrl = "{{ url('projects/') . '/' }}";
	var headers = $(".table th");
  var filter = '<div class="row"><div class="col"><label for="search">Search:</label>'+
                '<input type="search" class="search form-control" id="search"></div>'+
                '<div="col"><label for="searchIn">Search in: </label>'+
                '<select class="search form-control" id="searchIn">'+
                '<option class="search form-control" value="">Global</option>';

headers.each(function(index, element) {
var columnValue = $(this).text();
	if (columnValue !== "Edit" && columnValue !== "Delete")
	{
filter += '<option class="search form-control" value="'+index+'">'+columnValue+'</option>';
	}
});
filter += "</option></div>";

var table = $('.table').DataTable({
dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<\"#filter\">>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    	serverSide: true,
        processing: true,
        ajax: '',
        order: [],
        columns: [
        	{data: 'name'},
        	{data: 'address'},
        	{data: 'time_in'},
        	{data: 'time_out'},
        	{data: 'edit', searchable: false, orderable: false,
        		render: function(data, type, row) {
        		return '<a class="btn btn-dark" href="'+prefixUrl+row.project_id+'/edit">Edit</a>';
        		}
        		},
        		{data: 'delete', searchable: false,orderable: false,
        		render: function(data, type, row) {
        			return '<form action="'+prefixUrl+row.project_id+'" method="post">'+
        			'{{ csrf_field() }}'+
        			'{{ method_field('delete') }}'+
        			'<input class="btn btn-danger" onclick=\"return confirm(\'Do you want to delete this record?\')\" type="submit" value="Delete"/>'+
        			'</form>';	
        		}
        		}
        	]
    });

$("#filter").html(filter);

$('#search').on('keyup change', function(event) {
  search();
});

$('#searchIn').on('change', function(event) {
	search();
});

function search() {
	var input = $('#search').val();
  var column = $('#searchIn').val();
    table.search( '' ).columns().search( '' ).draw();
      if (column === '')
	     {
table.search(input).draw();
	} else {
		table.column(column).search(input).draw();
	}
	}

});

</script>
@endpush
