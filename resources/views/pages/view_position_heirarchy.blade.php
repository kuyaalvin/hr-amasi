@extends('layouts.app')

@section('content')

<h1>Position Heirarchy</h1>

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">

        
        <label class=" ">Select Department</label>
        <select id="heirarchy_select_dept">
          <option value="">Select Department</option>
        @foreach ($departments as $department)
        <option value="{{ $department->department_id }}" @if (old('department_id') == $department->department_id) selected @endif>{{ $department->name }}</option>
        @endforeach
        </select>

        <button type="button" style="float: right;" class="btn btn-primary"  id="edit">Edit Heirarchy
        </button>

       
        
        
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



var table;
var department_id;

function get_url(department_id){
  var url = "{{ url('positions/by_departments')}}/"+department_id+"/data/";
  return url;

}

$("#edit").on("click",function(){

  if(department_id == null){
    alert("Select Department")
  }else{
    window.location.href="{{ url('positions/hierarchy')}}/"+department_id+"/edit/";
  }
});

$("#heirarchy_select_dept").on("change",function(){
  // alert(table);
  department_id = $(this).val();
  // alert(department_id);
  // alert(get_url(department_id));

//  alert("{{ url('positions/by_departments')}}/"+department_id+"/data/");
  // 

  if (typeof table == "undefined") {
        table = $('.table').DataTable({
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        serverSide: true,
        processing: true,
        ajax: get_url(department_id),
        order: [],
        columns: [
          {data: 'name'},
          {data: 'level'}
        ]
    });
  }
  else{

    
    table.ajax.url( get_url(department_id) ).load();
    
  }


  });
  

// alert(typeof table);

// if (typeof table != "undefined") {
//    alert("GOT THERE");
// }
// else{
//   alert("wala");
// }


</script>
@endpush
