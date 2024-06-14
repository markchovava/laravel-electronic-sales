<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    
    public function delete($id){
        $data = ProductImage::find($id);
        if(isset($data->image)){
            if(file_exists( public_path($data->image) )){
                unlink($data->image);
            }
        }
        $data->delete();

        return response()->json([
            'message' => 'Deleted successully.'
        ]);
    }
}
