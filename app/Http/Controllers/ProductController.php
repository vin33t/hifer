<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index')->with('products',Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $category = Category::find($request->category);
        $product = new Product;
        $product->category_id = $category->id;
        $product->name = $request->name;

        $img = $request->img;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/',$img_new_name);
        $product->img = 'uploads/'.$img_new_name;
        $product->save();


        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('product.show')->with('product',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('product.edit')->with('product',$products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        
        $product = Product::find($id);
        $product->name = $request->name;

        $img = $request->img;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/',$img_new_name);
        $product->img = 'uploads/'.$img_new_name;
        $product->save();

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        Product::find($id)->delete();
        return redirect()->back();
    }

    public function save(Request $request,$id){
        $product = Product::find($id);
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->vendor_id = Auth::user()->vendor->id;
        $product->save();

        return redirect()->back();
    }
}
