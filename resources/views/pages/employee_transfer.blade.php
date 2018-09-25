@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

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

<div class="ui-widget form-group row">
  

    <div class="col-md-6">
        <label for="tags">Employees: </label>
        <input id="tags" class="form-control">
    </div>

</div>

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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

$(document).ready(function(){
  
  $("#header_project").css("color","#fff");
  $("#header_hierarchy").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_employee").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_position").css("color","rgba(255, 255, 255, 0.5)");
  $("#header_department").css("color","rgba(255, 255, 255, 0.5)");

});



$( function() {
    var availableTags = [
      "kelvin",
      "frank",
      "kelvs",
      "alvin",
      "menard",
      "nard",
      "ced",
      "cedric",
      "ace",
      "ramos",
      "calire",
      "jessin"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  




</script>
@endpush
