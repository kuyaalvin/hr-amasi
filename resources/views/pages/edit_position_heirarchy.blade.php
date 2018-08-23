@extends('layouts.app')

@section('content')

<h1>Position Heirarchy</h1>

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">

        
        <!-- <label class=" ">Select Department</label>
        <select id="heirarchy_select">
          <option>Select department</option>
          <option>Insert department</option>
          <option>Select department</option>
        </select>

        <button type="button" style="float: right;" class="btn btn-primary" onclick="location.href='{{ url('departments/create') }}'">Edit Heirarchy
        </button> -->

       
        
        
      </li>
    </nav>
  </div>
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
      <th>Position Name </th>
      <th>Level </th>
    </tr>

    
  </thead>
</table>
  </div>
</div>
<br>
<button type="button" style="float: right;" class="btn btn-primary" onclick="location.href=''">Save Changes
        </button>



@endsection



@push('scripts')
<script>

$(document).ready(function(){
  
  $("#header_heirarchy").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_department").css("color","rgba(255, 255, 255, 0.5)");

});

$(function() {
var prefixUrl = "{{ url('positions') . '/' }}";


var table = $('.table').DataTable({
  dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        serverSide: true,
        processing: true,
        ajax: prefixUrl,
order: [],
        columns: [
          {data: 'name'},
          {data: 'level',
          render: function(data,type,row) {
                return '<input class="form-control col-md-4" type="number" name="level[]" value="'+row.level+'">';


                }

          }
          ]
    });

});


</script>
@endpush
