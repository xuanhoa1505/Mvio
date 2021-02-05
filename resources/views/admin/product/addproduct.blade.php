@extends('admin')
@section('MvioAdmin')
<!-- Main content -->
<section class="content">
   <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" id="upload_form" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Tên sản phẩm:</label>
                     <input type="text" id="name" name="name" class="form-control" placeholder="Tên sản phẩm ...">
                  </div>
               </div>
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Mã sản phẩm:</label>
                     <input type="text" id="ma" name="ma" class="form-control" placeholder="Mã sản phẩm ...">
                  </div>
               </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                  <!-- select -->
                  <div id="categores" class="form-group">
                     <label>Danh mục :</label>
                     <a href="javascript:;" class="form-control" id="button-categores">
                        <span id="danhmuc">Lựa chọn danh mục</span><i style="float:right;margin-right: -8px;margin-top: 5px;font-size: 15px;" class="fas fa-angle-down"></i>
                     </a>
                     <div class="list-categores" style="display:none;">
                        <ul>
                        @foreach($categores1 as $key1=>$data1)
                           <li>
                              <label style="cursor:pointer;" for="category{{$data1->id}}">
                                 <input type="checkbox" id="category{{$data1->id}}" data-name="{{ $data1->name }}" name="categoryId" value="{{$data1->id}}">
                                 {{ $data1->name }}
                              </label>
                              @if( $data1->sub_categories == 'co')
                                    <ul style="padding:0 0 0 20px;">
                                    @foreach($categores2 as $key2=>$data2)
                                    @if( $data1->id == $data2->id_category )
                                       <li><label style="cursor:pointer;" for="category{{$data2->id}}">
                                          <input type="checkbox" id="category{{$data2->id}}" data-name="{{ $data2->name }}" name="categoryId" value="{{$data2->id}}">
                                          {{ $data2->name }}</label>
                                          @if( $data2->sub_categories == 'co')
                                          <ul style="padding:0 0 0 20px;">
                                          @foreach($categores3 as $key3=>$data3)
                                          @if( $data2->id == $data3->id_category)
                                                <li><label style="cursor:pointer;" for="category{{$data3->id}}">
                                                   <input type="checkbox" id="category{{$data3->id}}" data-name="{{ $data3->name }}", name="categoryId" value="{{$data3->id}}">
                                                   {{ $data3->name }}</label>
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
                  </div>
               </div>
               
       
           
               <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                     <label>Nhà thiết kế</label>
                     <select class="form-control" name="id_des">
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
                    <textarea id="ckeditor" name="des"> </textarea> 
                  
               </div>
               <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Nguyên Liệu:</label>
                     
                     <textarea id="ckeditor1" name="pro_nguyenlieu"> </textarea> 
                  </div>
               </div>
            </div>
           
            <div class="row">
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Giá gốc:</label>
                     <input type="text" name="price" class="form-control" placeholder="Mô tả sản phẩm ...">
                  </div>
               </div>
               <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                     <label>Giá sale:</label>
                     <input type="text" name="price_sale" class="form-control" placeholder="Nguyên liệu sản phẩm ...">
                  </div>
               </div>
            </div>
            <div class="row">
             <div class="col-sm-12">
               <!-- text input -->
               <div class="form-group">
                  <label style="width: 100%;">Size: <a id="add-size" href="javascript:;" style="float: right;">Thêm mới</a></label>
                  <table class="table" id="dsTable">
                     <thead id="side_product">
                        <tr>
                           <th>Size</th>
                           <th>Số lượng</th>
                           <th>Xóa</th>
                        </tr>
                     </thead>
                     <tbody id="side_product">

                     </tbody>
                  </table>
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
               <!-- text input -->
               <div class="form-group">
                  <label>Kích Hoạt Tài Khoản</label>
                  <select class="form-control" name="pro_stt">
                     <option value="0">Không kích hoạt</option>
                     <option value="1">Kích hoạt</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="exampleInputFile">Hình ảnh</label>
            <div>
            <div class="row files" id="files1">
                <input id="fileInput" type="file" style="display:none;" name="file" multiple>
               <label for="fileInput" style="cursor:pointer;height:150px;width:150px;border:1px solid #d2d6dc;border-radius:5px;display:flex;justify-content:center;align-items:center;" class="clone">
               <span style="font-weight:500;">chọn hình ảnh</span>
               </label>
                <br />
                <div class="form-group js-file-list">
         <div class="row" id="list"></div>
         </div>
            </div>
               
            </div>
         </div>
         <!-- <ul class="fileList"></ul>
         <div class="form-group js-file-list">
         <div class="row"></div>
         </div> -->
         <!-- /.card-body -->
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
         
      </form>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
   $('#categores').each(function() {
      $this = $(this);
      $this.find('#button-categores').click(function () {
         $this.find('.list-categores').toggle();
         $("#danhmuc").html('');
         var checkbox = document.getElementsByName('categoryId');
         // Lặp qua từng checkbox để lấy giá trị
         for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
               if($("#danhmuc").html() == "") {
                  $("#danhmuc").append(checkbox[i].getAttribute('data-name'));
               } else {
                  $("#danhmuc").append(', ' + checkbox[i].getAttribute('data-name'));
               }
            }
         }
      });
      $(document).click(function (e) {
            if (!$this.is(e.target) &&
               $this.has(e.target).length === 0) {
               if ($this.find('.list-categores').css("display") == 'block') {
                  $this.find('.list-categores').toggle();  
                  $("#danhmuc").html('');
                  var checkbox = document.getElementsByName('categoryId');
                  // Lặp qua từng checkbox để lấy giá trị
                  for (var i = 0; i < checkbox.length; i++){
                     if (checkbox[i].checked === true){
                        if($("#danhmuc").html() == "") {
                           $("#danhmuc").append(checkbox[i].getAttribute('data-name'));
                        } else {
                           $("#danhmuc").append(', ' + checkbox[i].getAttribute('data-name'));
                        }
                     }
                  }
               }
            }
      });
   });
   </script>
   <script>
      $dem = 1;
      $("#add-size").click(function () {
         $("#side_product").append(' <tr> <td><input type="text" id="size' + $dem + '" name="size' + $dem + '" class="form-control" placeholder="size"></td><td><input type="text" id="quantity' + $dem + '" name="quantity' + $dem + '" class="form-control" placeholder="số lượng"></td><td>  <a href="javascript:;"><i class="fas fa-window-close" style="color: red;font-size: 28px;"></i></a></td>  </tr>');
         $dem += 1;
      });

      function deleteRow(row) {
         document.getElementById('dsTable').deleteRow(row);
      }

      function tableclick(e) {
         if (!e)
            e = window.event;
         if (e.target.className == "fas fa-window-close")
            deleteRow(e.target.parentNode.parentNode.parentNode.rowIndex);
      }
      document.getElementById('dsTable').addEventListener('click', tableclick, false);


      $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
         var fileIdCounter = 0;
         var fileIdCounter1 = 0;

         this.closest(".files").change(function (evt) {
            var output = [];

            for (var i = 0; i < evt.target.files.length; i++) {
                  fileIdCounter++;
                  var file = evt.target.files[i]; 
                  var fileId1 = sectionIdentifier + fileIdCounter;
                  filesToUpload.push({
                     id: fileId1,
                     file: file
                  });
                  var fileReader = new FileReader();
                  fileReader.onload = function () {
                     fileIdCounter1++;
                     var fileId = sectionIdentifier + fileIdCounter1;
                     var str = '<div class="col-md-2">' +
                        '<label for="' + fileId + '">' +
                        '<img class="img-thumbnail js-file-image" style="width: 100%; height: 100%">' +
                        '<a style="position:absolute;top:0;right:10px;z-index:99;" class="removeFile" href="#" data-fileid="' + fileId + '"><i class="fas fa-window-close" style="color:red;font-size:18px;background-color:#ffffff;"></i></a>' +
                        '<input style="position:absolute;top:3px;left:10px;" type="radio" id="' + fileId + '" name="checkImage" value="' + fileId + '"></label></div>';
                     $('.js-file-list .row').append(str);

                     var imageSrc = event.target.result;
                     $('.js-file-image').last().attr('src', imageSrc);
                  };
                  fileReader.readAsDataURL(file);
            }
            //reset the input to null - nice little chrome bug!
            evt.target.value = null;
         });

         $(this).on("click", ".removeFile", function (e) {
            e.preventDefault();

            var fileId = $(this).parent().children("a").data("fileid");

            // loop through the files array and check if the name of that file matches FileName
            // and get the index of the match
            for (var i = 0; i < filesToUpload.length; ++i) {
                  if (filesToUpload[i].id === fileId)
                     filesToUpload.splice(i, 1);
            }

            $(this).parent().parent().remove();
         });

         this.clear = function () {
            for (var i = 0; i < filesToUpload.length; ++i) {
                  if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                     filesToUpload.splice(i, 1);
            }

            $(this).children(".fileList").empty();
         }

         return this;
      };

      (function () {
         var filesToUpload = [];

         var files1Uploader = $("#files1").fileUploader(filesToUpload, "file");
         $('#upload_form').on('submit', function (event) {
            event.preventDefault();
            var dataSize = {}
            for (i = 1; i <= $dem; i++) {
                  if ($('#size' + i).val() != null && $('#size' + i).val() != '') {
                     if ($('#quantity' + i).val() != null && $('#quantity' + i).val() != '') {
                        var data = {
                              name: $('#size' + i).val(),
                              quantity: $('#quantity' + i).val()
                        };
                     } else {
                        var data = {
                              name: $('#size' + i).val(),
                              quantity: 0
                        };
                     }
                     dataSize[i] = data;
                  }
            }
            var dataCategory = {}
            var checkbox = document.getElementsByName('categoryId');
            // Lặp qua từng checkbox để lấy giá trị
            for (var i = 0; i < checkbox.length; i++) {
                  if (checkbox[i].checked === true) {
                     dataCategory[i] = checkbox[i].value;
                  }
            }
            var formData = new FormData(this);
            formData.append('dataCategory', JSON.stringify(dataCategory));
            formData.append('dataSize', JSON.stringify(dataSize));
            //formData.append('files', JSON.stringify(filesToUpload));
            for (var i = 0, len = filesToUpload.length; i < len; i++) {
               formData.append("idFile" + i, filesToUpload[i].id);
               formData.append("files" + i, filesToUpload[i].file);
            }
            formData.append('totalFiles', filesToUpload.length);
            $.ajax({
                  url: "{{ url('save-product') }}",
                  method: "POST",
                  data: formData,
                  dataType: 'JSON',
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function (response) {
                     if ($.isEmptyObject(response.error)) {
                        window.location = "{{ url('all-product') }}";
                     } else {
                        printErrorMsg(response.error);
                     }
                     //window.location = "{{ url('all-product') }}";
                  },
                  error: function () {
                     //window.location = "{{ url('all-product') }}";
                  }
            })

            function printErrorMsg(msg) {
                  $(".text-gray-500").html('');
                  $(".print-error-msg").css('display', 'block');
                  $.each(msg, function (key, value) {
                     $(".text-gray-500").append('<span>' + value + '</span></br>');
                  });
            }
         });
      })()

      function closeError() {
         $(".print-error-msg").css('display', 'none');
      }
   </script>
   <div style="display:none;z-index: 99;" class="print-error-msg">
   <div class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
   <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto border-l-4 border-red-600">
      <div class="relative rounded-lg shadow-xs overflow-hidden">
         <div class="p-4">
            <div class="flex items-start">
               <div class="inline-flex items-center bg-red-600 p-2 text-white text-sm rounded-full flex-shrink-0">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="x w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
               </div>
               <div class="ml-4 w-0 flex-1">
                  <p class="text-base leading-5 font-medium capitalize     text-red-600 ">
                     error
                  </p>
                  <p class="mt-1 text-sm leading-5  text-gray-500 ">
                  </p>
               </div>
               <div class="ml-4 flex-shrink-0 flex">
                  <button onclick="closeError()" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                     <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                     </svg>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
  
</section>
<style>
.list-categores {
   max-height: 200px;
    overflow: auto;
    border-radius: 5px;
    border: 1px solid #d2d6dc;
    padding: 10px;
    width: 300px;
    position: absolute;
    z-index: 99999;
    background: #ffffff;
}
.show {
   display: block !important;
}
#categores ul li label {
   width: 100%;
   font-weight: 500;
}
#categores ul li label:hover {
   background-color: #ececec;
}
</style>
@endsection