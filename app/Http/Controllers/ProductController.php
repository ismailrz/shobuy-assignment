<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Validator;
class ProductController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return  response()->json(['categories' => $categories]);
    }
    public function getProducts()
    {
        $products = Product::all();
        return  response()->json(['products' => $products]);
    }
    public function addCategory(Request $request){
        $result['response'] = 'success';
         $validator = Validator::make($request->all(), [
             'name' => 'required',
         ]);
         if ($validator->fails()) {
             $result['response'] = 'error';
             $result['message'] = $validator->errors();
             return response()->json($result);
         }
       
         $account = new Category();
         $account->name = $request->name;
         $account->description = $request->description;
         if($account->save()){
            $result['message'] = 'Great!, Category Added sucessful.';
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry, action failed! Please try again.';
        }
         return response()->json($result);
    }
    public function addProduct(Request $request){
        $result['response'] = 'success';
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'category_id' => 'required',
         ]);
         if ($validator->fails()) {
             $result['response'] = 'error';
             $result['message'] = $validator->errors();
             return response()->json($result);
         }
       
         $account = new Product();
         $account->name = $request->name;
         $account->category_id = $request->category_id;
         $account->description = $request->description;
         if($account->save()){
            $result['message'] = 'Great!, Product Added sucessful.';
        }else{
            $result['response'] = 'error';
            $result['message'] = 'Sorry, action failed! Please try again.';
        }
         return response()->json($result);
    }
}
