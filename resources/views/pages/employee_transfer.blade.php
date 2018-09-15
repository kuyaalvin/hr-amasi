@extends('layouts.app')

@section('content')

<h1>Project Transfer Page</h1>

<div class="row">
  <div class="col">
    <nav class="nav flex-column">
      <li class="nav-item">
        
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

    <form class="form-inline">
      <div class="form-group">
          <label class="col-md-1 control-label">From</label>
          <div class="col-md-4">
            <input class="form-control" id="focusedInput" type="date">
          </div>
      </div>

      <div class="form-group">
          <label class="col-md-1 control-label">To</label>
          <div class="col-md-4">
            <input class="form-control" id="focusedInput" type="date">
          </div>
      </div>

    </form>

    <br>
    <div class="form-group row">

        <div class="col-md-5">
          <div class="row">
            <div class="col">

              <label>Select Project</label>
              <select class="form-control">
                <option>Insert List of project Here</option>
              </select>


              <br>
              <table class="table" id="project_1">
                    <thead>
                    <tr>
                      <th>Name </th>
                      <th>Position </th>
                      <th><input type="checkbox" name=""></th>
                    </tr>
          
                  </thead>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>

          <button type="button" class="btn btn-primary" style="width: 100%;" id="transfer_to_project2"> ------------></button>

          <br>
          <br>
          <br>
          <br>


          <button type="button" class="btn btn-primary" style="width: 100%;" id="transfer_to_project1"> <------------</button>
        </div>

        <div class="col-md-5">
          <div class="row">
            <div class="col">
              <label>Select Project</label>
              <select class="form-control">
                <option>Insert List of project Here</option>
              </select>
              <br>

              <table class="table" id="project_2">
                    <thead>
                    <tr>
                      <th>Name </th>
                      <th>Position </th>
                      <th><input type="checkbox" name=""></th>
                    </tr>
          
                  </thead>
              </table>
            </div>
          </div>
        </div>
    </div>

    <button type="button" style="float: right;" class="btn btn-primary"  id="save" data-toggle="modal" data-target="#confirm_modal">Confirm
        </button>
        <br>
        <br>
        <br>
        <br>


<div class="container">
    <div class="modal fade" id="confirm_modal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" >
                <h4 class="modal-title font-weight-bold">Transferred Employees</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>Date: FROM: 11/11/1111 TO: 11/11/1111</p>
              <div>
                <h4>Transfer to Sample Project A</h4>
                <p>asdkjasdklj</p>
                <p>asdkjasdklj</p>
                <p>asdkjasdklj</p>
              </div>

              <div>
                <h4>Transfer to Sample Project B</h4>
                <p>asdkjasdklj</p>
                <p>asdkjasdklj</p>
                <p>asdkjasdklj</p>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-default btn_hris_color_blue" data-dismiss="modal" id="btn_save">Save</button>
                <button type="button" id="close" class="btn btn-default btn_hris_color_blue" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
  </div>



@endsection



@push('scripts')
<script>

$(document).ready(function(){
  
  $("#header_project").css("color","#fff");
  $("#header_hierarchy").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_department").css("color","rgba(255, 255, 255, 0.5)");

});
$(function() {




var data = [
    [
        "Tiger Nixon",
        "System Architect",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ]
]


var table = $('#project_1').DataTable({
        dom: "<'row'<'col-sm-12 col-md-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-12'p>>",
        ajax: '',
        data: data
    });






});

$(function() {




var data = [
    [
        "Tiger Nixon",
        "System Architect",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ],
    [
        "Garrett Winters",
        "Director",
        ""
    ]
]


var table = $('#project_2').DataTable({
        dom: "<'row'<'col-sm-12 col-md-12'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-12'p>>",
        ajax: '',
        lengthMenu: [[10, 25, 50, 100, 150, 200, 250, -1], [10, 25, 50, 100, 150, 200, 250, 'All']],
        data: data
    });



});




  




</script>
@endpush
