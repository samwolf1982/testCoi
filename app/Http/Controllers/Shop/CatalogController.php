<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;


class CatalogController extends Controller
{



    /**
     * Returns the html for the catalog list page.
     *
     * @return \Illuminate\Http\Response Response object with output and headers
     */
    public function index()
    {
        $products = Product::where('status',1)->orderBy('updated_at', 'desc')->paginate(config('view.paginateSize'));
        $productsTotal=Product::where('status',1)->count();
        return view('shop.catalog', ['products' => $products,'productsTotal'=>$productsTotal]);
    }




}
