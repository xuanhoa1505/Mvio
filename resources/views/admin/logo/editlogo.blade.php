@extends('admin')
@section('MvioAdmin')
  

    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($edit_logo as $key => $data)
            <form action="{{URL::to('/update-logo/'.$data->id)}}" method="post" enctype="multipart/form-data">	
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
                  
                  </div>
                
                
                  <div class="form-group">
                    <label for="exampleInputFile">Avata</label>
                    <div class="input-group">
                      <div class="custom-file">
                      <img src="{{URL::to('public/Img/logo/'.$data->img)}}" height="100" width="100"> 
                        <input type="file" name="img" >
                        
                       
                      </div>
                      
                    </div>
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
                           <td>{{$data->pro_quantity}}
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
@endsection