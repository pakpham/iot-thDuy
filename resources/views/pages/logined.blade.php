@extends('layouts.master')
@section('content')

<h1>Dang nhap thanh cong!</h1>
<b>Thong tin nguoi dung</b>
<br>
@if (isset($user))
<div>User Name: {{$user->name}}</div>
<div>Email: {{$user->email}}</div>
@endif

<a href="{{url('dangxuat')}}">Logout</a>
@endsection() 	