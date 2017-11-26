@extends('layouts.app')

@section('content')

@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<a href="{{ url('projects/create') }}">Add Project</a>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Address</th>
      <th>Time In</th>
      <th>Time Out</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
</table>
@endsection

@push('scripts')
<script>
$(function() {
	var prefixUrl = "{{ url('projects/') . '/' }}";
	var headers = $(".table th");
var filter = '<label for="search">Search</label>'+
'<input type="search" class="search" id="search">'+
'<label for="searchIn">Search in</label>'+
'<select class="search" id="searchIn">'+
'<option value="">Global</option>';

headers.each(function(index, element) {
var columnValue = $(this).text();
	if (columnValue.toUpperCase() !== "EDIT" && columnValue.toUpperCase() !== "DELETE")
	{
filter += '<option value="'+index+'">'+columnValue+'</option>';
	}
});
filter += "</option";

var table = $('.table').DataTable({
dom: 'l<"#filter">rtip',
    	serverSide: true,
        processing: true,
        ajax: '',
        columns: [
        	{data: 'name'},
        	{data: 'address'},
        	{data: 'time_in'},
        	{data: 'time_out'},
        	{data: 'edit',
        		render: function(data, type, row) {
        		return '<a href="'+prefixUrl+row.project_id+'/edit">Edit</a>';
        		}
        		},
        		        	{data: 'delete',
        		render: function(data, type, row) {
        			return '<form action="'+prefixUrl+row.project_id+'" method="post">'+
        			'{{ csrf_field() }}'+
        			'{{ method_field('delete') }}'+
        			'<input type="submit" value="Delete"/>'+
        			'</form>';	
        		}
        		            	}
        	]
    });

$("#filter").html(filter);

$('#search').on('keyup', function(event) {
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
