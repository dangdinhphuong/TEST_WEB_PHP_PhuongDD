<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Common\Constants;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
     //   $Products = Products::join('categories', 'products.category_id', '=', 'categories.id')->orderBy('products.id', 'DESC')->select('*')->get();
       // $Products->load('category');
       $Products = DB::table('products')
       ->join('categories', 'products.category_id', '=', 'categories.id')
       ->select('products.*','categories.name AS CateName')
       ->where('products.status',\App\Common\Constants::ENABLED)
       ->where('categories.status',\App\Common\Constants::ENABLED)
       ->orderBy('products.id', 'DESC')
       ->paginate(10);
        if ($Products->currentPage() > $Products->lastPage()) {
            return redirect("/admin/products");
        }
        return view('client.pages.Home', compact('Products'));
    }
}
