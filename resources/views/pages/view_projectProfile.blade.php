@extends('layouts.app')

@section('content')

<h1>*Insert project name* - Project profile</h1>

@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif

<div class="row">
	<!-- insert the follow below - if there are no names just put " n/a "-->
	<ul>
		<li>PM: - *Insert name* </li> <!--  -- >
		<li>PIC: - *insert names* </li> <!-- can be more than one  example  " PIC: Alvin David, Franklin Chong, Ian Estalilla "-->
		<li>QA/QC: - *insert names*</li> <!-- can be more than one -->
		<li>CAD Operator: *insert names here *</li> <!-- can be more than one -->
		<li>SAFETY OFFICER: - *insert names*</li> <!-- can be more than one -->
		<li>FOREMAN: - *insert names*</li> <!-- can be more than one -->
		<li>WAREHOUSE MAN: - *insert names*</li> <!-- can be more than one -->
	</ul>
</div>

<div class="row">

</div>

<hr/>

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">
      	<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#transferModal">Transfer employee</button>
      	<button tpye="button" class="btn btn-primary" onclick="">Drop from project</button>
      </li>
    </nav>
  </div>
</div>

 Insert datatables here containing the ff: Name and Position.  table should only see employees from current selected project

<!-- Start Modal -->

<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="confirmModalLabel">Transfer Project</h5>
          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            	<span aria-hidden="true">&times;</span>
          		</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label class="col-form-label">Date Transferred:</label>
						<input type="date" class="form-control" id="" name="" value="" >
					</div>
					<div class="form-group">
						<label class="col-form-label">To Project:</label>
						<select class="form-control">
							<option></option>
							<option></option>
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         		<button type="button" class="btn btn-primary">Transfer</button>
			</div>
		</div>
	</div>
</div>


<!-- End Modal -->


@endsection
