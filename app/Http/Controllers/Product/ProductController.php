<?php

namespace App\Http\Controllers\Product;

use App\Events\ProductSaved;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    protected $products;

    public function __construct()
    {
        $this->products = new Product();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->with('category')->get();

        return view('product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Product $product)
    {
        $product->create(
            [
                'category_id' => $request['category_id'],
                'description' => $request['description'],
                'stock' => $request['stock'],
                'price' => $request['price'],
                'image' => $request->file('image')->store('images', 'public'),
            ]
        );
        $product->image = $request->file('image')->store('images', 'public');

        ProductSaved::dispatch($product);

        return to_route('product.index')->with('status', 'Se guardo el producto exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($product->image);
            $product->fill($request->validated());

            $product->image = $request->file('image')->store('images', 'public');

            $product->save();

            ProductSaved::dispatch($product);

        }else {
            $product->update( array_filter($request->validated()));
        }

        return redirect()->route('product.index', $product)->with('status', 'El producto fue actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('product.index')->with('status', 'El producto se elimino con satisfacción');
    }
}
