@extends('admin')
@section('MvioAdmin')
@foreach($edit_Ord_d as $key=>$data)


<!-- Main content -->
<section class="content">
   <div class="card card-primary">
   <!-- /.card-header -->
   <!-- form start -->
   <form action="{{URL::to('/update-order_details/'.$data->id)}}" method="post" enctype="multipart/form-data">
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
                  <input type="hidden" name="ord_id"  value="{{$data->id}}" >
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
            
               <!-- text input -->
               <div class="form-group">
                  <label>Tên sản phẩm:</label>
                  <input type="text" id="name" name="pro_name" class="form-control" value="{{$data->pro_name}}">
                 
               </div>
            </div>
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group">
                  <label>Giá :</label>
                  <input type="text" id="ma" name="pro_price" class="form-control" value="{{$data->pro_price}}">
               </div>
            </div></div>
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Số lượng :</label>
                     <input type="text" id="name" name="pro_quantity" class="form-control" value="{{$data->pro_quantity}}">
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

<!-- /.content -->
@endforeach
@endsection