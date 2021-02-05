@extends('admin')
@section('MvioAdmin')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> @foreach($details_product as $key=>$data)
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>



            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->  
               
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-clipboard-list"></i> Sản phẩm:{{$data->name}}.
                    <small class="float-right"><h3>Ngày nhập:</h3>{{$data ->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                <strong>Trạng thái:</strong>  @if($data->pro_stt==0)
                        <a href="#"><i class="fa fa-circle off" aria-hidden="true"></i>&#160;Không hiển thị trang chủ</a>
                        @else
                          <a href="#"><i class="fa fa-circle on" aria-hidden="true"></i>&#160;Hiển thị trang chủ</a>
                        @endif  
                  <address>
                    <strong>Mô tả</strong><br>
                    {!!$data->des!!}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <b> Đường dẫn sản phẩm: </b> {{$data->slug}}<br>
                  <address>
                    <strong>Thành phần</strong><br>
                    {!!$data->pro_nguyenlieu!!}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b> Mã sản phẩm: </b> {{$data->ma}}.<br>
                  <b>Nhà thiết kế:</b> {{$data->nameDesigner}}<br>
                  <b>Giá nhập:</b> ${{$data->price}}<br>
                  <b>Giá Sale:</b> ${{$data->price_sale}}  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
              
                <div class="col-12">
                
                  <div class="table-responsive">
                 
                    <table class="table">
                      <tr>
                        <th style="width:50%">Ảnh chính:</th>
                        <td><img src="{{URL::to('public/Img/product/'. $data->img) }}" height="100" width="200"></td> 
                      </tr>
                      
                      <tr> <th>Ảnh phụ:</th>
                        @foreach($details_img as $key=>$data)
                        <td><img src="{{URL::to('public/Img/imgs/'. $data->img) }}" height="100" width="200"></td> 
                      @endforeach</tr>
                     
                    </table>
                   
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
               
                  <table class="table table-striped">
                    <thead>
                    <tr>
                     
                      <th>Tên Size</th>
                      <th>Số Lượng</th>
                      <th>Trang thái</th>
                     
                    </tr>
                    </thead>
                    <tbody> @foreach($details_size as $key=>$data)
                    <tr>
                      
                      <td>{{$data->name}}</td>
                      <td>{{$data->soluong}}</td>
                      <td>
                        @if($data->size_stt==0)
                        <a href="#"><i class="fa fa-circle off" aria-hidden="true"></i>&#160;Offline</a>
                        @else
                          <a href="#"><i class="fa fa-circle on" aria-hidden="true"></i>&#160;Online</a>
                        @endif
                     </td>
                     
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                 

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             
              <!-- /.row -->

              <!-- this row will not appear when printing -->
             
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   
 @endforeach
 
@endsection