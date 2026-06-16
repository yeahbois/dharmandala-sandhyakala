<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JvlynTicket;
use App\Models\Order;

class JVLYNController extends Controller
{
    public function data()
    {
        return response()->json([JvlynTicket::all(), Order::all()]);
    }
}
