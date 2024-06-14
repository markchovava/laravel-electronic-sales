<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    
    public function store(Request $request){
        if($request->product_categories) {
            $product_categories = $request->product_categories;
            foreach ($product_categories as $item) {
                $data = new ProductCategory();
                $data->user_id = Auth::user()->id;
                $data->product_id = $item['product_id'];
                $data->category_id = $item['category_id'];
                $data->created_at = now();
                $data->updated_at = now();
                $data->save();
            } 
        }
        return response()->json([
            'message' => 'Saved Successfully.',
        ]);
    }

    public function indexByProductId($id){
        $data = ProductCategory::with(['product', 'category', 'user'])->where('product_id', $id)->orderBy('created_at', 'asc')->get();
        if(!isset($data)){
            return response()->json([
                'status' => 0,
                'message' => 'No Data available.'
            ]);
        }

        return response()->json([
            'status' => 1,
            'data' => ProductCategoryResource::collection($data),
        ]);

    }
    
    public function delete($id){
        $data = ProductCategory::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Deleted Successfully.',
        ]);
    }

}
