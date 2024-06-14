<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveryOrderResource;
use App\Models\DeliveryOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryOrderController extends Controller
{
    public function index(Request $request){
        $data = DeliveryOrder::with(['user'])->orderBy('created_at', 'desc')->paginate(12);
        return DeliveryOrderResource::collection($data);
    }
    
    public function view(){
        $user_id = Auth::user()->id;
        $data = DeliveryOrder::with(['user'])->where('user_id', $user_id)->first();
        if(!isset($data)){
            return response()->json([
                'message' => "No data available.",
                'data' => [],
            ]);
        }
        return new DeliveryOrderResource($data);
    }
}
