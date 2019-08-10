@extends('admin.layout.index')       
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loai Tin
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('loaitin-add')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Ten</label>
                        <input class="form-control" name="name" placeholder="Please enter your text" />
                    </div>
                    <div class="form-group">
                        <label>Ten Khong Dau</label>
                        <input class="form-control" name="name_not_sym" placeholder="Please enter your text" />
                    </div>
                    <div class="form-group">
                        <label>The Loai</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="theloai">
                          @foreach($data as $value)
                          <option value="{{$value->id}}" >{{$value->Ten}}</option>
                          @endforeach

                      </select>
                  </div>

                  <button type="submit" class="btn btn-default">Loai Tin Add</button>
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