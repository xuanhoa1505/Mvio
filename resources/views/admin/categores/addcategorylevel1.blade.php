@extends('admin')
@section('MvioAdmin')
  

    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/save-category-level-1')}}" method="post" enctype="multipart/form-data">
                <div class="card-body">
                {{ csrf_field() }}
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tên thể loại:</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên thể loại ...">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Code:</label>
                        <input type="text" name="code" class="form-control" placeholder="Code ...">
                      </div>
                    </div>
                  </div>
                  <label>Hình ảnh:</label>
                  <div>
                    <input type="file" style="display:none;" id="imgInp" name="imgInp">
                    <label for="imgInp" style="cursor:pointer;height:200px;width:200px;border:1px solid #d2d6dc;padding:5px;border-radius:5px;" class="clone">
                    <img src="#" id="myImg" style="position:relative;margin-top:50%;transform:translateY(-50%);height:190px;width:190px;" class="image_rounded imgId" alt="">
                    </label>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    </section>
@endsection