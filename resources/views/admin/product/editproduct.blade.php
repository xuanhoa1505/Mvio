@extends('admin')
@section('MvioAdmin')
<!-- Main content -->
@foreach($edit_product as $key => $data)
<section class="content">
   <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{URL::to('/update-product/'.$data->id)}}" method="post" enctype="multipart/form-data">	
              <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
         {{ csrf_field() }}
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Tên sản phẩm:</label>
                     <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Mã sản phẩm:</label>
                     <input type="text" id="ma" name="ma" class="form-control" value="{{$data->ma}}">
                  </div>
               </div>
            </div>
            <div class="row">
           
               
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group">
                  <label>Loại sản phẩm:</label>
                  <select class="form-control" name="muc">
                     <option value="0">Sản phẩm bán chạy</option>
                     <option value="1">Sản phẩm New</option>
                     <option value="2">Sản phẩm Sele</option>
                  </select>
               </div>
            </div>
           
           
               <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                     <label>Nhà thiết kế</label>
                     <select class="form-control" name="id_des">
                     <option value="{{$data->id_des}}">{{$data->nameDesigner}}</option>
                        @foreach($cate_des as $key => $des)
                        
                        <option value="{{$des->id}}">{{$des->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
             
            </div>
            <div class="row">
               <div class="col-sm-12">
                 
                     <label>Mô tả sản phẩm:</label>
                     <textarea id="ckeditor" name="des" value=""> {{$data->des}}</textarea> 
                  
                  </div>
                  <div class="col-sm-12">
                     <!-- text input -->
                     <div class="form-group">
                        <label>Nguyên Liệu:</label>
                        
                        <textarea id="ckeditor1" name="pro_nguyenlieu" value=""> {{$data->pro_nguyenlieu}}</textarea> 
                  </div>
               </div>
            </div>
           
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Giá gốc:</label>
                     <input type="text" name="price" class="form-control" value="{{$data->price}}">
                  </div>
               </div>
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Giá sale:</label>
                     <input type="text" name="price_sale" class="form-control" value="{{$data->price_sale}}">
                  </div>
               </div>
            </div>
          
        
         
         <div class="row">
            <div class="col-sm-12">
               <!-- text input -->
               <div class="form-group">
               <img src="{{URL::to('public/Img/product/'. $data->img) }}" height="100" width="100">
               <label for="exampleInputFile">Hình ảnh</label>
            <input id="fileInput" type="file"  name="img" multiple>
               </div>
            </div>
           
         </div>
        

         <!-- /.card-body -->
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
         
      </form>
   </div>

  
</section>@endforeach


@endsection