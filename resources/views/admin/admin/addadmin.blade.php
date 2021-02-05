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
    <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/save-admin')}}" method="post" enctype="multipart/form-data">	
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
                    
               
                  <div class="form-group">
                    <label for="exampleInputFile">Avata</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                        
                        <label class="custom-file-label" for="exampleInputFile"></label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
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
@endsection