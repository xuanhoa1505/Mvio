@extends('admin')
@section('MvioAdmin')
  

    <!-- Main content -->
    <section class="content">
    <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{URL::to('/save-category-level-2/' . $category->id)}}" method="post" enctype="multipart/form-data">
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
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    </section>
@endsection