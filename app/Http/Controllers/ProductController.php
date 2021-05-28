<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    protected $paginate = 5;
    private $sizes = ['XS', 'S', 'M', 'L', 'XL'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->paginate);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('back.product.create', ['categories' => $categories, 'sizes' => $this->sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'string',
            'category_id' => 'integer',
            'price' => 'required|numeric',
            'sizes' => 'required|in:XS,S,M,L,XL',
            'state' => 'in:discount,standard',
            'visible' => 'in:published,unpublished',
            'picture' => 'image|max:5000',
        ]);

        $product = Product::create($request->all());

        // save the timage
        $im = $request->file('picture');
        if (!empty($im)) {
            $link = $request->file('picture')->store('images');
            $timestamp = date_timestamp_get(date_create());
            $title = "{$product->id}{$timestamp}.{$im->extension()}";
            $product->picture()->create([
                'link' => $link,
                'title' => $title,
            ]);
        }

        $categories = Category::pluck('name', 'id')->all();
        return view('back.product.create', ['categories' => $categories, 'sizes' => $this->sizes, 'message'=> 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('back.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('back.product.edit', ['product' => $product, 'categories' => $categories, 'sizes' => $this->sizes]);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'string',
            'category_id' => 'integer',
            'price' => 'required|numeric',
            'sizes' => 'required|in:XS,S,M,L,XL',
            'state' => 'in:discount,standard',
            'visible' => 'in:published,unpublished',
            'picture' => 'image|max:5000',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        // image
        $im = $request->file('picture');

        if (!empty($im)) {
            $link = $im->store('images');
            // remove image if it exist
            if(count($product->picture)>0){
                // Remove image on storage
                Storage::disk('local')->delete($product->picture->link);
                $product->picture()->delete();
            }

            // update picture table
            $timestamp = date_timestamp_get(date_create());
            $title = "{$product->id}{$timestamp}.{$im->extension()}";
            $product->picture()->create([
                'link' => $link,
                'title' => $title,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'success delete');
    }
}
