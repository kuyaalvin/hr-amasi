@extends('layouts.app')

@section('content')

@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<a href="{{ url('projects/create') }}">Add Project</a>
{!! $dataTable->table() !!}
@endsection
@push('scripts')
<script>
$(function() {
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
        	{data: 'edit'},
        	{data: 'delete'}
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
