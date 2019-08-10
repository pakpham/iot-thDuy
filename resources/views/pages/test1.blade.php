@extends('layouts.master')
@section('content')    
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-2">
                        <h5 class="box-title text"><b>THỐNG KÊ</b></h5>
                    </div>
                    <div class="col-lg-2">
                        <input  class="form-control" id="datepicker-from" width="150" placeholder="Từ ngày"/>
                    </div>
                    <div class="col-lg-2">
                        <input class="form-control" id="datepicker-to" width="150" placeholder="Đến ngày"/>
                    </div>
                    <input type="hidden" name="ss" id="ss" value="">
                    <div class="col-lg-3">
                        <button id="btn-xuat-du-lieu" class="btn btn-success">Xuất dữ liệu</button>
                    </div>
                    <div class="col-lg-3">
                        <button id="btn-xuat-du-lieu" class="btn btn-success">Download Excel</button>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Sensor 1</h4>
                                <canvas id="chart-ss-1"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Sensor 2 </h4>
                                <canvas id="chart-ss-2"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Sensor 3 </h4>
                                <canvas id="chart-ss-3"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Sensor 4 </h4>
                                <canvas id="chart-ss-4"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->

                </div>

            </div><!-- .animated -->
        </div><!-- .content -->



    <script type="text/javascript">
        var ss1 = [], ss2 = [], ss3 = [], ss4 = [];
        $(document).ready(function(){
            // TIME PICKUP
            $('#datepicker-to').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
            });
            $('#datepicker-from').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });
            $('#datepicker').change(function(){
                var date = $('#datepicker').val();
                console.log(date);
            });

            // AJAXXXXXXXX
            $('#btn-xuat-du-lieu').click(function(){
            var date_from = $('#datepicker-from').val();
            var date_to   = $('#datepicker-to').val();
            if (date_to.length < 9||date_from.length < 9 ){
                alert("Bạn chưa nhập ngày thống kê");
            } else{
                $.ajax({
                        url:"{{route('get-data-chart')}}",
                        type: "POST",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'date_from':date_from,
                            'date_to':date_to
                        },
                        success: function(result){
                            console.log(result.data);
                            length_array =  result.data.length;
                            for(i = 0; i<length_array; i++){
                                ss1[i] =result.data[i].ss1;
                            }
                            console.log("SS1: " + ss1);
                            result = result.data;
                           
                            //$('#max').html(text);
                            $('#max').load(); 
                        }
                    }); 
            }
        });

        });
    </script>    
    <!--  Chart js -->
    <script src="../assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../assets/js/lib/chart-js/chartjs-init.js"></script>
@endsection()   
