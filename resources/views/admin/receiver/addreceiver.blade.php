@extends('admin')
@section('MvioAdmin')
@foreach($all_receivers as $key=>$data)


<!-- Main content -->
<section class="content">
   <div class="card card-primary">
   <!-- /.card-header -->
   <!-- form start -->
   <form action="{{URL::to('/save-receiver')}}" method="post" enctype="multipart/form-data">
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
                  <label>Tên người nhận:</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Tên người nhận ...">
                 
               </div>
            </div>
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group">
                  <label>Địa chỉ:</label>
                  <input type="text" id="ma" name="address" class="form-control" placeholder="Địa chỉ ...">
               </div>
            </div></div>
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>SĐT:</label>
                     <input type="text" id="name" name="phone" class="form-control" placeholder="SĐT...">
                  </div>
               </div>
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Email:</label>
                     <input type="text" id="ma" name="email" class="form-control" placeholder="Email ...">
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
                           <th>Tên người nhận</th>
                           <th>Địa chỉ</th>
                           <th>SĐT</th>
                           <th>Email</th>
                           <th>Xóa</th>
                        </tr>
                     </thead>
                     <tbody>
                        @csrf
                        @foreach($all_receiver as $key=>$data)
                        <tr>
                           <td>{{++$key}}</td>
                           <td>{{$data->name}}</td>
                           <td>{{$data->address}}</td>
                           <td>{{$data->phone}}</td>
                           <td>{{$data->email}}
                           <td>   <a href="{{URL::to('/delete-receiver/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td></tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>STT</th>
                           <th>Tên người nhận</th>
                           <th>Địa chỉ</th>
                           <th>SĐT</th>
                           <th>Email</th>
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