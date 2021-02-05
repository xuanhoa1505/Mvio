@extends('admin')
@section('MvioAdmin')
  

    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/save-logo')}}" method="post" enctype="multipart/form-data">	
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
                        <input type="text" name="name" class="form-control" placeholder="Tên logo ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Hiển thị</label>
                        <select class="form-control" name="stt">
                          <option value="0">Không hiển thị</option>
                          <option value="1">Hiển thi</option>
                          
                        </select>
                      </div>
                   </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
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
            </div>
    </section>
@endsection