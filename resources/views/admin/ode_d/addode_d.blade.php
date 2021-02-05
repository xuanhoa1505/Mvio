@extends('admin')
@section('MvioAdmin')
@foreach($all_ode_d as $key=>$data)


<!-- Main content -->
<section class="content">
   <div class="card card-primary">
   <!-- /.card-header -->
   <!-- form start -->
   <form action="{{URL::to('/save-ode_d')}}" method="post" enctype="multipart/form-data">
      <?php
         $message = Session::get('message');
         if($message){
             echo '<span class="text-alert">'.$message.'</span>';
             Session::put('message',null);
         }
         ?>
      <div class="card-body">
         {{ csrf_field() }}
         <div class="row">
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group">
                  <input type="hidden" name="ord_id"  value="{{$data->id}}" >
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
            
               <!-- text input -->
               <div class="form-group">
                  <label>Tên sản phẩm:</label>
                  <input type="text" id="name" name="pro_name" class="form-control" placeholder="Tên sản phẩm ...">
                 
               </div>
            </div>
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group">
                  <label>Giá :</label>
                  <input type="text" id="ma" name="pro_price" class="form-control" placeholder="Giá ...">
               </div>
            </div></div>
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Số lượng :</label>
                     <input type="text" id="name" name="pro_quantity" class="form-control" placeholder="Số lượng ...">
                  </div>
               </div>
              
            </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
   </form>
   </div>
</section>
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
                           <th>Tên sản phẩm</th>
                           <th>Giá</th>
                           <th>Số lượng</th>
                           <th>Xóa</th>
                        </tr>
                     </thead>
                     <tbody>
                        @csrf
                        @foreach($all_order_details as $key=>$data)
                        <tr>
                           <td>{{++$key}}</td>
                           <td>{{$data->pro_name}}</td>
                           <td>$ {{$data->pro_price}}</td>
                           <td>{{$data->pro_quantity}}</td>
                           <td>   
                           <a href="{{URL::to('/edit-order_details/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                           <a href="{{URL::to('/delete-order_details/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td></tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                        <th>STT</th>
                           <th>Tên sản phẩm</th>
                           <th>Giá</th>
                           <th>Số lượng</th>
                           <th>Xóa</th>
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
@endforeach
@endsection