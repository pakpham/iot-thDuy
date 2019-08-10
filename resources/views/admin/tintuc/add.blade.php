@extends('admin.layout.index')       
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tuc
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('tintuc-add')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tieu de</label>
                        <input class="form-control" name="TieuDe" placeholder="Please enter your text"/>
                    </div>
                    <div class="form-group">
                        <label>Tom Tat</label>
                        <input class="form-control" name="TomTat" placeholder="Please enter your text" />
                    </div>
                         <div class="form-group">
                        <label>The Loai</label>
                        <select class="form-control" id="the-loai" name="TheLoai">
                          @foreach($data as $value)
                          <option value="{{$value->id}}" >{{$value->Ten}}</option>
                          @endforeach

                      </select>
                    </div>
                    <div class="form-group">
                        <label>Loai Tin</label>
                        <select class="form-control" id="loai-tin" name="LoaiTin">
                        @foreach($data1 as $value)
                        <option value="{{$value->id}}" >{{$value->Ten}}</option>
                        @endforeach
                       </select>
                    </div>

                  <button type="submit" class="btn btn-default">Tin tuc Add</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                  <form>
                   @if (isset($result_add))
                   <div style="color: green">{{$result_add}}</div>
                   @endif
               </div>

           </div>
           <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
   </div>
   @endsection

   @section('script')

    <script type="text/javascript">
      $(document).ready(function(){
        $('#the-loai').change(function(){
          var the_loai = $(this).val();
          var token = '{{csrf_token()}}';
          $.ajax({
            url:  '../../ajax/getloaitin',
            type: 'POST',
            data: {
              '_token': token,
              'the_loai': the_loai
            },
            success:function(data){
              console.log(data);
              $('#loai-tin').html(data);
            }
          });
        });
      });

    </script>

   @endsection