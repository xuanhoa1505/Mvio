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
              <li class="breadcrumb-order"><a href="#">Home</a></li>
              <li class="breadcrumb-order active">DataTables</li>
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
                    <th>Người đặt</th>
                    <th>Người nhận</th>
                    <th>Trạng thái đơn</th>
                    <th>Giỏ hàng</th>
                    <th>Hoạt động</th>
                  </tr>
                  </thead>
                  <tbody>
                  @csrf
                  @foreach($order  as $key=>$data)
                  <tr>
                     <td>{{++$key}}</td>
             
                     <td>{{$data->nameUser}}</td>
                     <td><a href="{{URL::to('/add-receiver', $data->id)}}"><i class="fas fa-paint-brush"></i>...Nhập địa chỉ người nhận...</a></td>
                     
          
                     <td>
                        @if($data->stt==0)
                        <a href="{{URL::to('/unactive-order/'.$data->id)}}"><i class="fa fa-circle off" aria-hidden="true"></i>&#160;Chưa duyệt</a>
                        @else
                          <a href="{{URL::to('/active-order/'.$data->id)}}"><i class="fa fa-circle on" aria-hidden="true"></i>&#160;Đã duyệt</a>
                        
                           @endif    
                     </td>
                     <td><div class="timeline-footer">
                    <a href="{{URL::to('/add-ode_d/'.$data->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-cart-plus fa-lg mr-2"></i></a>
                    
                   
                  </div> </td>
                     <td><div class="timeline-footer">
                    <a href="{{URL::to('/details/'.$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye text-success text-active " style="color: #FFF!important;"></i>&#160;View</a>
                    <a href="{{URL::to('/delete-order/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                   
                  </div> </td>
                  
                    </tr>
                    @endforeach
              
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>STT</th>
                    <th>Người đặt</th>
                    <th>Người nhận</th>
                    <th>Trạng thái đơn</th>
                    <th>Giỏ hàng</th>
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 
@endsection