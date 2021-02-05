@extends('admin')
@section('MvioAdmin')
<!-- Main content -->
<section class="content">
   <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      @foreach($edit_user as $key => $data)
      <form action="{{URL::to('/update-user/'.$data->id)}}" method="post" enctype="multipart/form-data">
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
                     <input type="text" name="name" class="form-control" value="{{$data->name}}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div class="form-group">
                        <label>Giới tính</label>
                        <select class="form-control" name="gioitinh">
                           <option value="{{$data->gioitinh}}">{{$data->gioitinh}}</option>
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
                     <input type="date" name="birth_day" class="form-control" value="{{$data->birth_day}}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Địa Chỉ:</label>
                     <input type="text" name="address" class="form-control" value="{{$data->address}}">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" value="{{$data->email}}" >
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Mật khẩu</label>
                     <input type="text" name="password" class="form-control" value="{{$data->password}}" >
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Số Điện Thoại</label>
                     <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                     <label>Đường dẫn đẹp</label>
                     <input type="text" name="slug" class="form-control" value="{{$data->slug}}">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="exampleInputFile">Avata</label>
               <div class="input-group">
                  <img src="{{URL::to('public/Img/user/'.$data->img)}}" height="100" width="100"> 
               </div>
               <input type="file" name="img"  >
            </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </form>
      @endforeach
   </div>
</section>
@endsection