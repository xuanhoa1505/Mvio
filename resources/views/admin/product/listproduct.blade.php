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
              <li class="breadcrumb-product"><a href="#">Home</a></li>
              <li class="breadcrumb-product active">DataTables</li>
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
                <!-- Large modal -->
              <a href="{{ url('add-product') }}" style="float:right;" type="button" class="btn btn-primary">Thêm mới</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Item type</th>
                    <th>Designer</th>
                    <th>Customers</th>
                    <th>Hoạt động</th>
                    <th>Customers</th>
                    <th>Hoạt động</th>
                  </tr>
                  </thead>
                  <tbody>
                  @csrf
                  @foreach($all_product as $key=>$data)
                  <tr>
                     <td>{{++$key}}</td>
                     <td><a href="{{URL::to('/add-imgs', $data->id)}}"><i class="fas fa-camera "></i>...Thêm ảnh...</a></td>
                     <td>{{$data->name}}</td>
                     <td><a href="{{URL::to('/add-size', $data->id)}}">...Thêm size...</a></td>
                     <td><img src="{{URL::to('public/Img/product/'. $data->img) }}" height="100" width="100"></td>  
          
                     <td>
                        @if($data->pro_stt==0)
                        <a href="{{URL::to('/unactive-product/'.$data->id)}}"><i class="fa fa-circle off" aria-hidden="true"></i>&#160;Offline</a>
                        @else
                          <a href="{{URL::to('/active-product/'.$data->id)}}"><i class="fa fa-circle on" aria-hidden="true"></i>&#160;Online</a>
                        @endif
                     </td>
                     <td><div class="timeline-footer">
                    <a href="{{URL::to('/edit-product/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{URL::to('/delete-product/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                   
                  </div> </td>

                  <td><div class="timeline-footer">
                    <a href="{{URL::to('/Invoicepro/'.$data->id)}}" class="btn btn-primary btn-sm">Chi Tiết</a>
  
                   
                  </div> 
                  </td>
                    </tr>
                    @endforeach
              
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Item type</th>
                    <th>Designer</th>
                    <th>Customers</th>
                    <th>Hoạt động</th>
                    <th>Customers</th>
                    <th>Hoạt động</th>
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
          </section>
@endsection