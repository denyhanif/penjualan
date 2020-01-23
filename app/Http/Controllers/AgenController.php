<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agen;


class AgenController extends Controller
{
    public function index(){
        $agen = Agen::orderBy('nama_toko','ASC')->paginate(10);

        $data_agen=Agen::all();
        $x=0;
        //data untuk leafjs
        foreach($data_agen as $row){
            $hasil[$x]['0']=$row ->nama_toko;
            
            $hasil[$x]['1']=$row ->latitude;
            $hasil[$x]['2']=$row ->longitude;
            
            $x++;


        }
        //ubad data array ke json dg fung jsonencode
        $hasil_lat_long= json_encode($hasil);
        //untuk leaf jsdata pertama pada record tabeel agen
        $lokasi=Agen::first();
        return view('agen.index',compact('agen','hasil_lat_long','lokasi'));
    }
}
