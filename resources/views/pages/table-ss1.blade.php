@extends('layouts.master')


@section('content')
 <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            	{{-- <div class="row">
                            		<div  class="col-md-4"> <strong class="card-title">Thống kê giá trị: <b>{{$name}}</b></strong></div>
                            		<div   class="col-md-4"><a class="btn btn-primary" href="donwload-1">Download Excel</a></div>
                            	</div> --}}
                            	<div class="row">
                            		<div class="col-lg-2">
                            			<h3 class="box-title text"><b>THỐNG KÊ</b></h3>
                            		</div>
                            		<div class="col-lg-2">
                            			<input  class="form-control" id="datepicker-from" width="150" placeholder="Từ ngày"/>
                            		</div>
                            		<div class="col-lg-2">
                            			<input class="form-control" id="datepicker-to" width="150" placeholder="Đến ngày"/>
                            		</div>
                            		<input type="hidden" name="ss" id="ss" value="{{$name}}">
                            		<div class="col-lg-3">
                            			<button id="btn-xuat-du-lieu" class="btn btn-success">Xuất dữ liệu</button>
                            		</div>
                            		<div class="col-lg-3">
                            			<button id="btn-xuat-du-lieu" class="btn btn-success">Download Excel</button>
                            		</div>
                            	</div> 
                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="background-color: green">
                                            <th>.ID</th>
                                            <th>Giá trị</th>
                                            <th>Đơn vị</th>
                                            <th>Trạm</th>
                                            <th>Thời gian</th>
                                        </tr>
                                    </thead>
                                    <tbody id="max">
                                    	
                                    	{{-- @foreach($data_ss1 as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            @if(isset($value->ss1))
                                            <td>{{$value->ss1}}</td>
                                            @elseif(isset($value->ss2))
                                            <td>{{$value->ss2}}</td>
                                            @elseif(isset($value->ss3))
                                            <td>{{$value->ss3}}</td>
                                            @elseif(isset($value->ss4))
                                            <td>{{$value->ss4}}</td>
                                            @endif
                                            <td>*C</td>
                                            <td>{{$value->id_station}}</td>
                                            <td>{{$value->created_at}}</td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- {!!$data_ss1->links()!!} --}}

                            </div>
                        </div>
                    </div>
                </div>
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
                            'date_to':date_to,
                            'ss': '{{$name}}'
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
@endsection() 	
