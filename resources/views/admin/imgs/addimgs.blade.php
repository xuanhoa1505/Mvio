@extends('admin')
@section('MvioAdmin')
  
   @foreach($all_imgs as $key=>$data)
    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
 
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/save-imgs')}}" method="post" enctype="multipart/form-data">	
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
                      
                        <input type="hidden" name="id_pro"  value="{{$data->id}}" >
                      
                      </div>
                    </div>
                    
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile">imgs</label>
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
                    <th>imgs</th>
                    <th>Img imgs</th>
                    <th>Hoạt động</th>
                  </tr>
                  </thead>
                  <tbody>
                  @csrf
                  @foreach($all_img as $key=>$data)
                  <tr>
                     <td>{{++$key}}</td>
                     <td>{{$data->id_pro}}</td>
                     <td><img src="{{URL::to('public/Img/imgs/'. $data->img) }}" height="100" width="100"></td>
                     <td>
                        <?php
                          if($data->stt==0){
                        ?>
                        <a href="{{URL::to('/unactive-imgs/'.$data->id)}}"><i class="fa fa-circle off" aria-hidden="true"></i>&#160;Offline</a>
                         <?php }else{ ?>
                          <a href="{{URL::to('/active-imgs/'.$data->id)}}"><i class="fa fa-circle on" aria-hidden="true"></i>&#160;Online</a>
                          <?php  }
                          ?>
                     </td>
                     <td><div class="timeline-footer">
                    <a href="{{URL::to('/edit-imgs/'.$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{URL::to('/delete-imgs/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                   
                  </div> </td>
                    </tr>
                    @endforeach
              
                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>imgs</th>
                    <th>Img imgs</th>
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
 @endforeach
@endsection