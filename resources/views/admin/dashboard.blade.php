@extends('admin')
@section('MvioAdmin')
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile"> 
              <?php $name = Session::get('img'); ?>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="public/Img/user/<?php echo $name;?>" 
                       alt="User profile picture">
                </div>
               
                <h3 class="profile-username text-center"><?php $name = Session::get('name');if($name){  echo $name;} ?></h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Đơn hàng </a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <!-- /.tab-pane -->
                  <div class="active tab-pane"  id="activity" >
                    <!-- The timeline --> @foreach($order  as $key=>$data)
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                        {{$data ->created_at}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                       <!-- timeline item -->
                     
                      <!-- timeline item -->
                      <div>
                      <i class="fas fa-cart-plus fa-lg mr-2" style="color: #f6f6f6;"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> {{$data ->created_at}}</span>

                          <h3 class="timeline-header">  <i class="fas fa-user " ></i><a href="#">  {{$data->nameUser}}</a> Đã đặt 1 đơn hàng</i>
                          <br>
                         </h3>
                          <h3 class="timeline-header">  <a href="#">Thông tin đơn hàng</a> </h3>
                          <div class="timeline-body">
                         
                            
                          </div>
                          <div class="timeline-footer">  
                          <a href="{{URL::to('/details/'.$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye text-success text-active " style="color: #FFF!important;"></i>&#160;View</a>
                            
                            <a href="{{URL::to('/delete-order/'.$data->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                     
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div> @endforeach
                    <div style="float: right;">
                        {!! $order->render() !!}
                      </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="timeline">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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
<style>
  .flex.justify-between.flex-1{
    display: none;
  }
  p.text-sm.text-gray-700.leading-5{
    margin-right: 15px;
    margin-top: 15px;
  }
  {display: inline-block;
    font-size: 16px;
    font-weight: 700;
    color: #111111;
    height: 30px;
    width: 30px;
    border: 1px solid transparent;
    border-radius: 50%;
    line-height: 30px;
    text-align: center;}
</style>