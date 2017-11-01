@extends('layouts.app')

@section('content')

@if ($errors->any())
{{ $error->all()[0] }}
@endif

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
  <tbody>
@foreach ($projects as $project)
    <tr>
      <th scope="row">{{ $project->project_id }}</th>
      <td>{{ $project->name }}</td>
      <td>{{ $project->address }}</td>
      <td>{{ $project->time_in }}</td>
      <td>{{ $project->time_out }}</td>
      <td><a href="{{ url('projects/' . $project->project_id . '/edit') }}">Edit</a></td>
<td><form class="deleteProjectForm" action="{{ url('projects/' . $project->project_id) }}" method="post">
{{ csrf_field() }}
{{ method_field('delete') }}
<input type="submit" value="Delete">
</form></td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection

@section('scripts')
<script>
$(function() {
$(".deleteProjectForm").on("submit", function(event) {
event.preventDefault();
var form = $(this);

sendAjaxRequest(form, function(data) {
		form.parent().parent().remove();
		var message = data.message;
		var elementId = "message";
		if ($("#"+elementId).length) {
		$("#"+elementId).text(message);
			} else {
				$("body").prepend("<h4 id='"+elementId+"'>"+message+"</h4>");
			}
	},
function(jqXHR, textStatus, errorThrone) {
	var errorMessage;

});
});
});
</script>

@endsection
