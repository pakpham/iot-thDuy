<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ajaxController extends Controller
{
    //
    public function getLoaitin(Request $request){
    	$id_the_loai = $request->the_loai;
    	$data = App\TheLoai::find($id_the_loai)->loaitin;
    	//echo $data;
    	foreach ($data as $value) {
    		echo "<option value='$value->id'>$value->Ten</option>";
    	}
    }
}
