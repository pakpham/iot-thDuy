@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loai Tin
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Ten</th>
                        <th>Ten Khong Dau</th>
                        <th>Created</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $value)
                    <tr class="odd gradeX" align="center">
                        <td>{{$value->id}}</td>
                        <td>{{$value->Ten}}</td>
                        <td>{{$value->TenKhongDau}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection