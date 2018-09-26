@extends('layouts.app')

@section('content')


 


<h1>Project Transfer Page</h1>

<div>
  <span class="form-control">Selecting Employees from *insert Prj Name*</span>
</div>


<!-- @if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif -->
<br>



<table class="table" id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>employee_id</th>
                <th>Name</th>
                <th>Position</th>
            </tr>
        </thead>
    </table>

<button id="slect">asdasd</button>








<div id="transfer_details">
    <form class="form-inline">
      <div class="form-group">
          <label class="col-md-1 control-label">From</label>
          <div class="col-md-5">
            <input class="form-control" id="focusedInput" type="date">
          </div>
      </div>

      <div class="form-group">
          <label class="col-md-1 control-label">To</label>
          <div class="col-md-5">
            <input class="form-control" id="focusedInput" type="date">
          </div>
      </div>

    </form>

    <br>
    <div class="form-group row">
  

        <div class="col-md-6">
            <label >Transfer to project: </label>
            <select class="form-control">
                <option>insert prject lish here</option>
                <option>insert prject lish here</option>
                <option>insert prject lish here</option>
                <option>insert prject lish here</option>
                <option>insert prject lish here</option>
            </select>
        </div>

    </div>

    <div class="form-group row">

        <div class="col-md-3">
            <button class="btn btn-primary" id="transfer_preview" data-toggle="modal" data-target="#confirm_modal">PREVIEW</button>
        </div>

    </div>

</div>
   

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
                <h4>Transfer from Project A to Project B</h4>
                <p>asdkjasdklj</p>
                <p>asdkjasdklj</p>
                <p>asdkjasdklj</p>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-success btn_hris_color_blue" data-dismiss="modal" id="btn_save">Save</button>
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



$(document).ready(function() {
  
  var select_employees = [];

  var prefixUrl = "{{ url('employees') . '/' }}";

  var table = $('#example').DataTable({
  dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        
        serverSide: true,
        processing: true,
        ajax: prefixUrl+'data',
        lengthMenu: [[10, 25, 50, 100, 150, 200, 250, -1], [10, 25, 50, 100, 150, 200, 250, 'All']],
        order: [],
        columns: [
            {data: 'employee_id', visible:false , searchable:false },
            {data: 'last_name',
                render: function(data,type,row) {
                return '<a href="'+prefixUrl+row.employee_id+'/profile" id="full_name">' +row.last_name+', '+row.first_name+' '+row.middle_name.charAt(0)+ '.</a>';
                }
            },
            {data: 'position.name',
                render: function(data,type,row) {
                return '<a href="'+prefixUrl+row.employee_id+'/profile" id="full_name">' +row.last_name+', '+row.first_name+' '+row.middle_name.charAt(0)+ '.</a>';
                }
                }
           
            ],
            rowId:"employee_id",
            
            rowCallback : function( row, data ) {
                // alert(row);
                
                if($.inArray(data.employee_id, select_employees) != -1 ){
                  $(row).addClass("selected");
                }
              }
            });

  function add_selection(row){
    // alert(indexes);
    // var emp_id = table.rows(indexes).data().pluck("employee_id");

    var emp_id = row.attr('id');

    if ($.inArray(emp_id, select_employees) != -1) {
      return false;
    }


    select_employees.push(emp_id);



  }



  function remove_selection(row){
    // alert(indexes);
    // var emp_id = table.rows(indexes).data().pluck("employee_id");
    // select_employees.push(data[0]);

    var emp_id = row.attr('id');
    alert(emp_id);
    select_employees.splice($.inArray(emp_id, select_employees),1);


  }

  $("body").on("click","#example tr", function(e){
      
    var row = $(this);
    row.toggleClass("selected");

    if (row.hasClass("selected")) {
      add_selection(row);
    }else{
      remove_selection(row);
    }
  });

  $("#slect").click(function(){
    console.log(select_employees);
  });



    // $('#example tbody').on( 'click', 'tr', function () {
    //     $(this).toggleClass('selected');
    // } );

    // $('#button').click( function () {
    //     console.log( table.rows('.selected').data());

    // } );

} );





</script>
@endpush
