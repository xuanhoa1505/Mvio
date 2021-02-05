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
          <div class="col-md-3">
            <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách khách hàng</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                @csrf
                  @foreach($email as $key=>$data)
                  <li class="nav-item active">
                    <a href="{{URL::to('/send_mail', $data->id)}}" class="nav-link">
                      <i class="fas fa-inbox"></i> {{$data->name}}<br><i class="nav-icon far fa-envelope"></i> {{$data->email}}
                    </a>
                    
                  </li>
                  
                  @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
                <?php $message = Session::get('message'); if ($message) {	echo $message;	Session::put('message', null);}?>
   
              </div>  
              <form action="{{URL::to('/send/email')}}" method="post">
              <!-- /.card-header -->
              <div class="card-body">
             {{ csrf_field() }}
                <div class="form-group">
                <div class="form-group">
                  <label>Gửi tới:</label>
                  <select class="form-control" name="email">
                  <option >Chọn email cần gửi</option>
                  @foreach($email as $key=>$data)
                  
                     <option value="{{$data->email}}">{{$data->name}}:{{$data->email}}</option>
                    
                     @endforeach
                  </select>
               </div>
                   <!-- /.card  <input class="form-control" placeholder="To:" name="email" >--> 
              
                <div class="form-group">
                <label>Tiêu đề:</label>
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
              
              </div>
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
 
