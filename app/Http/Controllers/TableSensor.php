<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TableSensor extends Controller
{
    public function getSs1(){
    	
    	return view('pages.table-ss1',['name'=>1]);
    }
    public function getSs2(){
    	return view('pages.table-ss1',['name'=>2]);
    	//return $data;
    }
    public function getSs3(){
    	return view('pages.table-ss1',['name'=>3]);
    }
    public function getSs4(){
    	return view('pages.table-ss1',['name'=>4]);
    }

    public function getData(Request $request){
    	$date_from  = $request->date_from;
    	$date_to	= $request->date_to;
    	$date_from = $request->date_from . " 00:00:00";
		$date_to   = $request->date_to . " 23:59:59";
		$ss = $request->ss;
		$data = App\DataSensor::whereBetween('created_at', [$date_from, $date_to])->orderBy('id')->get();

    	return ["data"=>$data,"ss"=>$ss];
    }
}
