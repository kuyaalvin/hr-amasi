@extends('layouts.app')

@section('content')

<h1>Position Hierarchy</h1>

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">

        
        <!-- <label class=" ">Select Department</label>
        <select id="hierarchy_select">
          <option>Select department</option>
          <option>Insert department</option>
          <option>Select department</option>
        </select>

        <button type="button" style="float: right;" class="btn btn-primary" onclick="location.href='{{ url('departments/create') }}'">Edit Hierarchy
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

<form id="editForm" action="{{ url('positions/hierarchy/update') }}" method="post">
		{{ csrf_field() }}
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
</form>
<br>

<button type="submit" style="float: right;" id="save" class="btn btn-primary" form="editForm">Save Changes
        </button>



@endsection



@push('scripts')
<script>

$(document).ready(function(){
  
  $("#header_hierarchy").css("color","#fff");
  $("#header_project").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_department").css("color","rgba(255, 255, 255, 0.5)");

});

// $("#save").click(function() {

//   var trigger = 0;

//   $(".level").each(function() {

//     if($(this).val() === "0" || $(this).val() <= -1){
//       alert("no negative or zero value");
//       trigger = 0;
//       return false;

//     }else{
//       trigger = 1;
//     }

    
//   });

//   if(trigger == 1){
//     alert("send data");
//   }


// });

$(function() {

var i = 0;

var table = $('.table').DataTable({
  dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        serverSide: true,
        processing: true,
        ajax: "{{ url('positions/by_departments/' . $department_id . '/data') }}",
order: [],
        columns: [
          {data: 'name'},
          {data: 'level',
          render: function(data,type,row) {
                var input = '<input type="hidden" name="positions['+i+'][position_id]" value="'+row.position_id+'"/>'+
                '<input class="form-control col-md-4 level" type="number" name="positions['+i+'][level]" min="1" value="'+row.level+'"/>';
                  i++;
return input;
                }

          }
          ]
    });


});


</script>
@endpush
