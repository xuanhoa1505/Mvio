@extends('admin')
@section('MvioAdmin')
@foreach($details_order  as $key=>$data)
<!-- Content Header (Page header) -->
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
    </section>

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
                    <i class="fas fa-globe"></i> Orderer : {{$data->nameUser}}
                    <small class="float-right"><h3>Order date:</h3>{{$data ->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                Information
                  <address>
                    <strong>Orderer : {{$data->nameUser}}</strong><br>
                    Address of the seter :{{$data->addressUser}}<br>
                    
                    Phone: {{$data->phoneUser}}<br>
                    Email:  {{$data->emailUser}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <br>
                  <address>
                    <strong>Receiver : {{$data->nameReceiver}}</strong><br>
                   
                    Address of the recipient:{{$data->addressReceiver}}<br>
                    Phone: {{$data->phoneReceiver}}<br>
                    Email:  {{$data->emailReceiver}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Order ID:</b>{{$data->ma}}<br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Price/1Pro</th>
                      <th>Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_pro  as $key=>$data)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$data->pro_name}}</td>
                      <td>$ {{$data->pro_price}}</td>
                      <td>{{$data->pro_quantity}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
               
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax </th>
                        <td>$0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{url('/print-order/'.$data->id)}}"" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print "></i> Print</a>

                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endforeach
 
@endsection