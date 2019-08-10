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
		<br>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h4 class="mb-3">Real Chart</h4>
						<div class="card-body">
							<canvas id="sales-chart"></canvas>
						</div>
					</div>
				</div>
			</div><!-- /# column -->

			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
						<h4 class="mb-3">Line Chart</h4>
						<div class="flot-container">
							<div id="flot-line" class="flot-line"></div>
						</div>
					</div>
				</div>
			</div><!-- /# column -->
		</div><!-- /# row -->

		<div class="row">
		</div><!-- /# row -->
		<div class="row">
			
		</div><!-- /# row -->



	</div><!-- .animated -->
</div><!-- .content -->

<script type="text/javascript">
	$(document).ready(function(){
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
                            var text = '';
                            var ss = parseInt(result.ss);
                            //var ss = result.ss;
                            result = result.data;
                            switch (ss){
                            	case 1:
                            	for (var i = result.length-1; i>=0; i--) {
                            	//console.log(result.max[i].id);
                            	text = text + "<tr><th>"+"#"+result[i].id+"</th><th scope='row'>"+result[i].ss1+"</th><th>"+"*C"+"</th><th>"+"1"+"</th><th>"+result[i].created_at+"</th></tr>";
                            	}
                            	break;
                            	case 2:
                            	for (var i = result.length-1; i>=0; i--) {
                            	//console.log(result.max[i].id);
                            	text = text + "<tr><th>"+"#"+result[i].id+"</th><th scope='row'>"+result[i].ss2+"</th><th>"+"*C"+"</th><th>"+"1"+"</th><th>"+result[i].created_at+"</th></tr>";
                            	}
                            	break;
                            	case 3:
                            	for (var i = result.length-1; i>=0; i--) {
                            	//console.log(result.max[i].id);
                            	text = text + "<tr><th>"+"#"+result[i].id+"</th><th scope='row'>"+result[i].ss3+"</th><th>"+"*C"+"</th><th>"+"1"+"</th><th>"+result[i].created_at+"</th></tr>";
                            	}
                            	break;
                            	case 4:
                            	for (var i = result.length-1; i>=0; i--) {
                            	//console.log(result.max[i].id);
                            	text = text + "<tr><th>"+"#"+result[i].id+"</th><th scope='row'>"+result[i].ss4+"</th><th>"+"*C"+"</th><th>"+"1"+"</th><th>"+result[i].created_at+"</th></tr>";
                            	}
                            	break;
                            }
                            console.log (text);
                            $('#max').html(text);
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

