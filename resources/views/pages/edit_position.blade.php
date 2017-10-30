@extends('layouts.app')

@section('content')
	<h1>edit position</h1>
	
@if ($errors->any())
<label for="errorMessage">{{ $errors->all()[0] }}</label>
@endif

	<form id="editPositionForm" action="{{ url('positions/' . $position->position_id) }}" method="post">
{{ csrf_field() }}
{{ method_field('patch') }}
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="positionName">Position Name</label>
				<input type="text" class="form-control" name="name" placeholder="edit position here" value="{{ old('name', $position->name) }}">
			</div>
		</div>
		<input type="submit" value="Submit">

	</form>
@endsection

@section('scripts')
<script>
$(function() {
$("#editPositionForm").on("submit", function(event) {
event.preventDefault();
var form = $(this);

sendAjaxRequest(form, function(data) {
window.location.replace(data.redirect);
	},
function(jqXHR, textStatus, errorThrone) {
	var errorMessage;
if (jqXHR.status === 422)
{
errorMessage = jqXHR.responseJSON[0];
} else {
errorMessage = internalErrorMessage;
}
displayErrorMessage(form, errorMessage);
});
});
});

function displayErrorMessage(form, errorMessage)
{
var elementId = "errorMessage";
if ($("#"+elementId).length) {
$("#"+elementId).text(errorMessage);
	} else {
		form.before("<label id='"+elementId+"' for='errorMessage'>"+errorMessage+"</label>");
	}
}

</script>

@endsection
