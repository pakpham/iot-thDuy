<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
use App;

class pakController extends Controller
{

  public function addUser ($name, $pass){
    $data = New App\User();
    $data->name = $name;
    $data->email = $name.'@gmail.com';
    $data->password = bcrypt($pass);
    $data->save();
    echo "Da them User!";
  }
  public function getTest (){
    $test = App\Test::get();
    Excel::create('Filename', function($excel) {

    })->export('xls');
    //return $test;
  }
  public function addDataSensor(Request $request){
    $data = New App\DataSensor();
    $data->ss1 = $request -> data1;
    $data->ss2 = $request -> data2; 
    $data->ss3 = $request -> data3;
    $data->ss4 = $request -> data4;
    $data->id_station = 1;
    $data->save();
    //return "Saved to DataBase ";
  }
  public function addData(Request $request){
    return $request->name;
  }
  public function getHome(){
    

    //$last_id = App\DataSensor::get()->last();   
    $date_from = date("Y-m-d") . " 00:00:00";
    $date_to   = date("Y-m-d") . " 23:59:59";

    $date_from_1 = date('Y-m-d',strtotime($date_from. '-1 days')). " 00:00:00";
    $date_to_1 = date('Y-m-d',strtotime($date_to. '-1 days')). " 23:59:59"; 
    $date_from_2 = date('Y-m-d',strtotime($date_from. '-2 days')). " 00:00:00";
    $date_to_2 = date('Y-m-d',strtotime($date_to. '-2 days')). " 23:59:59"; 
    $date_from_3 = date('Y-m-d',strtotime($date_from. '-3 days')). " 00:00:00";
    $date_to_3 = date('Y-m-d',strtotime($date_to. '-3 days')). " 23:59:59"; 


    $data = App\DataSensor::whereBetween('created_at', [$date_from, $date_to]) -> orderBy('id')->get();
    $data_1 = App\DataSensor::whereBetween('created_at', [$date_from_1, $date_to_1]) -> orderBy('id')->get();
    
    $data_2 = App\DataSensor::whereBetween('created_at', [$date_from_2, $date_to_2]) -> orderBy('id')->get();
    $ss1_2 = $data_2->avg('ss1'); $ss2_2 = $data_2->avg('ss2'); 
    $ss3_2 = $data_2->avg('ss3'); $ss4_2 = $data_2->avg('ss4');
    $data_3 = App\DataSensor::whereBetween('created_at', [$date_from_3, $date_to_3]) -> orderBy('id')->get();

    $obj = New App\DataSensor;
    $obj_1 = New App\DataSensor;
    $obj_2 = New App\DataSensor;
    $obj_3 = New App\DataSensor;

    $obj->ss1 = round($data->avg('ss1'));
    $obj->ss2 = round($data->avg('ss2'));
    $obj->ss3 = round($data->avg('ss3'));
    $obj->ss4 = round($data->avg('ss4'));
    $obj_1->ss1 = round($data->avg('ss1'));
    $obj_1->ss2 = round($data->avg('ss2'));
    $obj_1->ss3 = round($data->avg('ss3'));
    $obj_1->ss4 = round($data->avg('ss4'));
    $obj_2->ss1 = round($data->avg('ss1'));
    $obj_2->ss2 = round($data->avg('ss2'));
    $obj_2->ss3 = round($data->avg('ss3'));
    $obj_2->ss4 = round($data->avg('ss4'));
    $obj_3->ss1 = round($data->avg('ss1'));
    $obj_3->ss2 = round($data->avg('ss2'));
    $obj_3->ss3 = round($data->avg('ss3'));
    $obj_3->ss4 = round($data->avg('ss4'));
    $data_avg = [
      $obj, $obj_1, $obj_2, $obj_3
    ];
    $last_data;
    if($data->count() > 0 ){
      $last_id = $data[$data->count()-1]->id;
      for ($i = 4; $i >=0 ; $i--) { 
        $last_data[$i] = App\DataSensor::where('id','=',$last_id-$i)->get()[0];
      }
      return view ('pages.home', ['last_data' => $last_data,'data_avg'=>$data_avg]);
    }else{
      $last_data = [];
      return view('pages.home',['data_avg'=>$data_avg]);
    }   
  }

  // AJAXXXXXXXXXXXXXXXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  public function getDataHome(){
    $date_from = date("Y-m-d") . " 00:00:00";
    $date_to   = date("Y-m-d") . " 23:59:59";
    $data = App\DataSensor::whereBetween('created_at', [$date_from, $date_to])->get();
    //$data =  App\DataSensor::get();
    return $data;
  }


  // LOGIN AND LOGOUT
  public function handlingLogin(Request $request) {
    $user_name = $request->name;
    $pass = $request->password;

    if(Auth::attempt(['name'=>$user_name, 'password'=>$pass])){
      return view('pages.logined',['user'=> Auth::user()]);
      //$user => Auth::user();
    }
    else
      return view('pages.login',['error'=>'Dang nhap khong thanh cong']);
  }

  public function logout(){
    Auth::logout();
    return view('pages.login');
  }

  public function checkLogin (){
    if (Auth::check()){
      return view('pages.logined');
    }
    else echo "Ban chua dang nhap";
  }
}
