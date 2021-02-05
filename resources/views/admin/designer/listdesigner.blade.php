@extends('admin')
@section('MvioAdmin')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-designer"><a href="#">Home</a></li>
              <li class="breadcrumb-designer active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
 </section>


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <h5 class="box-title"><?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  @csrf
                  @foreach($all_designer as $key=>$data)
                  <tr>
                     <td>{{++$key}}</td>
                     <td>{{$data->name}}</td>
                     <td>
                        <?php
                          if($data->stt==0){
                        ?>
                        <a href="{{URL::to('/unactive-designer/'.$data->id)}}"><i class="fa fa-circle off" aria-hidden="true"></i>&#160;Offline</a>
                         <?php }else{ ?>
                          <a href="{{URL::to('/active-designer/'.$data->id)}}"><i class="fa fa-circle on" aria-hidden="true"></i></span>&#160;Online</a>
                          <?php  }
                          ?>
                     </td>
                     <td><div class="timeline-footer">
                    <a href="{{URL::to('/edit-designer/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{URL::to('/delete-designer/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                   
                  </div> </td>
                    </tr>
                    @endforeach
              
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 
@endsection