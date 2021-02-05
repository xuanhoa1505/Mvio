@extends('admin')
@section('MvioAdmin')
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">DataTable with default features</h3>
            </div>
            <ul class="alert text-danger">
               @foreach($errors ->all() as $error)
               <li>{{$error }}</li>
               @endforeach
            </ul>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{URL::to('/save-user')}}" method="post" enctype="multipart/form-data">
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
                           <label>Tên người dùng:</label>
                           <input type="text" name="name" class="form-control" placeholder="Tên người dùng ...">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <div class="form-group">
                              <label>Giới tính</label>
                              <select class="form-control" name="gioitinh">
                                 <option value="Nam">Nam</option>
                                 <option value="Nữ">Nữ</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                           <label>Sinh Nhật:</label>
                           <input type="date" name="birth_day" class="form-control" placeholder=" ...">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Địa Chỉ:</label>
                           <input type="text" name="address" class="form-control" placeholder="Địa chỉ ...">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                           <label>Email</label>
                           <input type="text" name="email" class="form-control" placeholder="Email ...">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label>Mật khẩu</label>
                           <input type="text" name="password" class="form-control" placeholder="Password ...">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                           <label>Số Điện Thoại</label>
                           <input type="text" name="phone" class="form-control" placeholder="Enter ...">
                        </div>
                     </div> 
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                           <label>Kích Hoạt Tài Khoản</label>
                           <select class="form-control" name="stt">
                              <option value="0">Không kích hoạt</option>
                              <option value="1">Kích hoạt</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                   
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="exampleInputFile">Avata</label>
                           <div class="input-group">
                             
                                 <input type="file" name="img">
                              
                           
                             
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
         </div>
      </div>
   </div>
</section>
@endsection