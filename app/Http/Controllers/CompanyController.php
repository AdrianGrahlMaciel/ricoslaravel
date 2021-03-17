<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyPhoto;
use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class CompanyController extends Controller
{
    

    public function create(Request $request){
        $company = new Company($request->all());
        $company->save();
        return response()->json([
            'company' => $company,
            'status' => 'ok'
        ]);
    }

    public function getById($id){
        $company = Company::find($id);
        
        if($company){
            $histories = CompanyPhoto::where('type','history')->where('company_id',$company->id)->get();
            $company->histories = $histories;
            return response()->json([
                'company' => $company,
                'status' => 'ok'
            ]);
        }else{
            return response()->json([
                'status' => 'no'
            ]);
        }
    }
    public function getByZone($zoneid){
        $company = Company::where('zone_id',$zoneid)->get();
        if($company){
            return response()->json([
                'company' => $company,
                'status' => 'ok'
            ]);
        }else{
            return response()->json([
                'status' => 'no'
            ]);
        }
    }
    public function getByCity($cityid){
        $companies = Company::where('city_id',$cityid)->get();
        if($companies){
            return response()->json([
                'companies' => $companies,
                'status' => 'ok'
            ]);
        }else{
            return response()->json([
                'status' => 'no'
            ]);
        }
    }
    public function all(){
        $companies = Company::all();

        return response()->json([
            'companies' => $companies,
            'status' => 'ok'
        ]);
    }

    public function getProducts($id){
        $products = Product::where('deleted',0)->where('company_id',$id)
        ->leftJoin('categories','products.category_id','categories.id')
        ->leftJoin('productsphotos','products.id','productsphotos.product_id')
        ->select(
            'products.id',
            'categories.name as category',
            'products.name', 
            'products.description', 
            'products.price', 
            'products.discount', 
            'products.stock',
            'productsphotos.path as image_path'
            )
        ->get();
        return response()->json([
            'products' => $products,
            'status' => 'ok'
        ]);
    }
}
