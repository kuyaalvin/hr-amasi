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
                <th>Name</th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td>Developer</td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td>Developer</td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
            </tr>
        </tbody>
    </table>










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
    $('#example').DataTable( {
        select: {
            style: 'multi'
        }
    } );
} );





</script>
@endpush
