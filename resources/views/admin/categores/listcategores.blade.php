@extends('admin')
@section('MvioAdmin')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-customers"><a href="#">Home</a></li>
              <li class="breadcrumb-customers active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
 </section>


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <a style="float:right;" href="{{ url('/add-category-level-1') }}">Thêm mới</a>
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

            <ul>
            @foreach($categores1 as $key1=>$data1)
                <li style="margin-bottom: 10px;" >
                    <div class="menuadmin" style="border: 1px solid #b8b8b8; border-radius: 5px; background: #fff;height: 30px"> 
                    <a href="" style="    color: #000; font-size: 16px; font-weight: bold; padding: 10px 20px;">{{ $data1->name }}</a>
                    <a style="float:right;margin-right: 30px;" href="{{ url('/add-category-level-2/' . $data1->slug) }}"><i class="fas fa-plus-square" style="color: #40c587;font-size: 28px;"></i></a>
                    <a style="float:right;margin-right: 5px;" href="javascript:;" data-id="{{ $data1->id }}" class="remove-item"><i class="fas fa-window-close" style="color: red;font-size: 28px;"></i></a>
                   </div>
                    @if( $data1->sub_categories == 'co')
                        <ul style="padding:0 0 0 20px;margin-top: 5px;">
                        @foreach($categores2 as $key2=>$data2)
                        @if( $data1->id == $data2->id_category )
                            <li style="margin-bottom: 5px;">
                            <div class="menuadmin" style="border: 1px solid #b8b8b8; border-radius: 5px; background: #fff;height: 30px">
                                <a href=""  style="    color: #000; font-size: 16px; font-weight: bold; padding: 10px 20px;">{{ $data2->name }}</a>
                                <a style="float:right;margin-right: 30px;" href="{{ url('/add-category-level-3/' . $data2->slug) }}"><i class="fas fa-plus-square" style="color: #40c587;font-size: 28px;"></i></a>
                    <a style="float:right;margin-right: 5px;" href="javascript:;" data-id="{{ $data2->id }}" class="remove-item"><i class="fas fa-window-close" style="color: red;font-size: 28px;"></i></a>
                    </div>
                     @if( $data2->sub_categories == 'co')
                                <ul style="padding:0 0 0 20px;margin-top: 5px;">
                                @foreach($categores3 as $key3=>$data3)
                                @if( $data2->id == $data3->id_category)
                                  
                                    <li style="margin-bottom: 5px;">
                                    <div class="menuadmin" style="border: 1px solid #b8b8b8; border-radius: 5px; background: #fff;height: 30px">
                                        <a href=""  style="    color: #000; font-size: 16px; font-weight: bold; padding: 10px 20px;"  >{{ $data3->name }}</a>
                    <a style="float:right;margin-right: 30px;" href="javascript:;" data-id="{{ $data3->id }}" class="remove-item"><i class="fas fa-window-close" style="color: red;font-size: 28px;"></i></a>
                    </div>
                    </li>
                                @endif
                                @endforeach
                                </ul>
                                @endif
                            </li>
                        @endif
                        @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".remove-item").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-category') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection