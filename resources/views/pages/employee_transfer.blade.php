@extends('layouts.app')

@section('content')



<h1>Employee Project Transfer</h1>

@if (session('message'))
<div class="alert alert-info" role="alert">
{{ session('message') }}
</div>
@endif

<div class="row">
	<p>The Employee Project Transfer allows user to reassign employees to different projects</p>
</div>
<div class="row">
	<p>Instructions:  
1.	Select from dropdown which you want to transfer/get from.
2.	Select the employees you want to transfer
3.	Input the date of transfer
4.	Click on transfer button
5.	Review transferred employee then once satisfied select confirm button.
	</p>
</div>
<hr/>
<div class="row">
<div class="col-md-5">
  <div class="form-group">
    <label class="  col-form-label">From Project:</label>
        <select class="form-control" name="" id="">
          <option></option>
          <option></option>
        </select>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Employee 1</td>
        </tr>
        <tr>
          <td>Employee 1</td>
        </tr>
        <tr>
          <td>Employee 1</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <input type="text" class="form-control" id="" name="" placeholder="" value="Search">
    </div>
    </div>
</div>
<div class="col-md-2">
  <div class="form-group">
    <label class="col-form-label">Transfer Date:</label>
        <input type="date" class="form-control" id="" name="" value="" >
  </div>

  <br/><br/>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Transfer">
  </div>
 </div> 
<div class="col-md-5">
  <div class="form-group">
    <label class="  col-form-label">From Project:</label>
        <select class="form-control" name="" id="">
          <option></option>
          <option></option>
        </select>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Employee 1</td>
        </tr>
        <tr>
          <td>Employee 1</td>
        </tr>
        <tr>
          <td>Employee 1</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <input type="text" class="form-control" id="" name="" placeholder="" value="Search">
    </div>
    </div>
</div>
</div>
<div class="form-group row">
  <div class="col-sm-12">
    <input class="btn btn-secondary" type="submit" value="Back"> <input class="btn btn-primary" type="submit" value="Confirm">
  </div>
</div>
