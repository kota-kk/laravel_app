<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;

class PrefecturesController extends Controller
{

    private $Prefecture;
    public function __construct(Prefecture $list)
    {
        // dd('コントローラー到達');
        
        $this->Prefecture = $list;
    }

    public function show()
    {

        $Prefectures = $this->Prefecture->all();
        return view('leveltest.lv4', compact('Prefectures'));
    }

}
