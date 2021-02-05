@extends('admin')
@section('MvioAdmin')
  

    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/save-designer')}}" method="post" enctype="multipart/form-data">	
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
                        <label>Nhà thiết kế:</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên designer ...">
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
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    </section>
@endsection