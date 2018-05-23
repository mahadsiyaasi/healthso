@extends('layouts.app')

@section('content')
<?php 
    use App\http\Controllers\labController;
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{Route::currentRouteName()}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Lab > Editor</a></li>
        
      </ol>
    </section>

    <!-- Main content -->

    
    <section class="content">

      <!-- Default box -->
      <div class="box w3-white" style="padding: 0px 0px 0px 0px; background:inherit;">
        <div class="box-header with-border">
      
        <a  class="button btn" href="/role"><strong>Roles</strong></a>
        <a  class="button btn" href="/role?new=role"><i class="fa fa-plus"> add</i></a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" onclick="location.href='/'" data-toggle="tooltip" title="Remove" >
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive" style="">
          <div class="errorController">
            @if(Request::get("new"))
            <div class="warner">
              
            </div>
            @else


            @endif
          
  </div>
</div>
  </div>
 </div>
</section>

</div>

@endsection





