<?php

namespace App\Http\Controllers;
use Salman\Mqtt\MqttClass\Mqtt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class mqttController extends Controller
{
    //
    public function test(){
    	return 'MQTT';
    }

	public function testPub($topic, $message){
	        $mqtt = new Mqtt();
	        //$client_id = Auth::user()->id;
	        $client_id = 1;
	        $output = $mqtt->ConnectAndPublish($topic, $message, $client_id);
	        if ($output === true)
	        {
	            return "PUBLIC DONE";
	        } else{
	        	return "PUBLIC ERROR";	
	        }  
	}

	public function testSub($topic){
        $mqtt = new Mqtt();
        $client_id = Auth::user()->id;
        $mqtt->ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            return "SUB DONE";
        }, $client_id);
    }
}

