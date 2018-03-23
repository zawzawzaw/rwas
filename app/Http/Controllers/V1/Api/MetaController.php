<?php

namespace App\Http\Controllers\V1\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PortData;
use App\Models\ShipData;
use App\Models\CabinData;

class MetaController extends Controller
{
    public function getPortData(){
        return response()->json(PortData::get());
    }
    
    public function getShipData(){
        return response()->json(ShipData::get());
    }

    public function getCabinData(){
        return response()->json(CabinData::get());
    }
}
