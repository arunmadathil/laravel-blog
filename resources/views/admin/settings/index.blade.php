@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('admin.layouts.pagehead')
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Website Setting</h3>
          </div>

          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Website Title/Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ Config::get('settings.general.site_name') }}">
                </div>
                {{--   <div class="form-group">
                  <label for="name">Website Font size:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ Config::get('settings.general.site_name') }}">
                </div> --}}
                <div class="form-group">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img @if(Config::get('settings.general.logo') != '') src="{{Config::get('settings.general.logo')}}" @else src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" @endif alt="" /> </div>
                
                  </div>
                  <div class="form-group">
                 
                    <label for="image">File input</label>
                    <input type="file" name="logo" id="logo">
                  
                  
                </div>
                  <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
                      </div>
                  </div>

                  </div>

                </form>
              </div>
              <!-- /.box -->


            </div>
            <!-- /.col-->
          </div>
          <!-- ./row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      @endsection