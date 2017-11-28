@extends('layouts.app')

@section('content')

@if (session('message'))
<h4 id="message">{{ session('message') }}</h4>
@endif

<a href="{{ url('positions/create') }}">Add Position</a>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th data-orderable="false">Edit</th>
      <th data-orderable="false">Delete</th>
    </tr>
  </thead>
</table>
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
return '<a href="'+prefixUrl+row.position_id+'/edit">Edit</a>';
}
},
        	{data: 'delete',
searchable: false,
orderable: false,
render: function(data, type, row) {
	return '<form action="'+prefixUrl+row.position_id+'" method="post">'+
	'{{ csrf_field() }}'+
	'{{ method_field('delete') }}'+
	'<input type="submit" value="Delete"/>'+
	'</form>';	
}
            	}
        	],
    });

});
</script>
@endpush
