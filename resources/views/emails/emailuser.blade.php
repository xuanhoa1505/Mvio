@extends('admin')
@section('MvioAdmin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
                <?php $message = Session::get('message'); if ($message) {	echo $message;	Session::put('message', null);}?>
   
              </div>   @foreach($user as $key=>$data)
              <form action="{{URL::to('/send/email/user')}}" method="post">
              <!-- /.card-header -->
              <div class="card-body">
             {{ csrf_field() }}
                <div class="form-group">
                   <input class="form-control" placeholder="To:" name="email"   value="{{$data->email}}" >
                </div>
                <div class="form-group">
                   <input class="form-control" placeholder="Subject:" name="subject">
                </div>
                <div class="form-group">
                <textarea id="ckeditor2" class="form-control" style="height: 300px" name="message">
                     
                     </textarea>
                </div>
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              
              </div>  @endforeach
              <!-- /.card-footer -->
              </form>
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  
    <!-- /.content -->
@endsection
 
