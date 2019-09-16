<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGoodRequest;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class GoodsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index','show']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->paginate(config('view.paginateSize'));
        $productsTotal=Product::where('user_id', auth()->user()->id)->count();
        return view('goods.catalog', ['products' => $products,'productsTotal'=>$productsTotal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods.create', ['productModel' => new Product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\CreateGoodRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGoodRequest $request)
    {

        $requestAll = $request->all();
        $requestAll['updated_at'] = $requestAll['created_at'] = Carbon::now();
        $p =  Product::create($requestAll);
        $p->saveImages($request);
        $p->savePrice($requestAll);
        return redirect('/goods')->with('success', 'Product saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $productModel = Product::find($id);
//        die('222');
//        return view('goods.create', ['productModel' => $productModel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productModel = Product::find($id);
        return view('goods.edit', ['productModel' => $productModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productModel = Product::find($id);
        $productModel->update($request->all());
        $productModel->saveImages($request);
        $productModel->updatePrice($request->all());
        return redirect('/goods')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/goods')->with('success', 'Product deleted successfully');
    }


    public function removeImages($id){
        Image::find($id)->delete();
        return redirect()->back()->with('success', ['Image deleted successfully']);
    }
}
