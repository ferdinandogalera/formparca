<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GravaFormController extends Controller
{
    public function index(Request $request) {

        $inserts = [];
        $c = [];
        $bids = $_POST;

        #$cam = "";
        #$val = "";

        foreach($bids as $k => $v) {
            #$cam .= $k.",";
            #$val .= "'".$v."',";
            if ($k!="_token" and $k!="Send_mail" and $k!="finalizando") {
                $c[$k] =  $v;
            }
        }

        $inserts[] = $c;
        DB::table('credenciado')->insert($inserts);
    }
}
