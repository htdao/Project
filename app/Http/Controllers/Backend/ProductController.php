<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);
        return view('backend.products.index', [
                'products'=>$products,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $user=Auth::user();

//        if ($user->cannot('create', Product::class)){
//            // User hiện tại có thể cập nhật sản phẩm
//            abort(403);
//        }

        $this->authorize('create', Product::class);

        $categories = Category::all();
        return view('backend.products.create', [
            'categories' => $categories
        ]);

//        $categories = Category::all();
//        return view('backend.products.create', [
//            'categories' => $categories
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->save();

        if ($request->hasFile('image')){

            $files = $request->file('image');

            foreach ($files as $file){
                $name = $file->getClientOriginalName();
                $disk_name='public';
                $path = Storage::disk('public')->putFileAs('images', $file, $name);

                $image = new Image();
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
            // dd($path);
            }

        }else{
            dd('khong co file');
        }

         return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id)->products;
        foreach ($products as $product){

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::all();
//        $product = Product::find($id);
        $category = Category::find($product->category_id);
//xuôi
//        if (Gate::allows('update-product', $product)){
//            // User hiện tại có thể cập nhật sản phẩm
//            return view('backend.products.edit', [
//                'categories' => $categories,
//                'product' => $product,
//                'category' => $category,
//            ]);
//        }else{
//            abort(403);
//        }

        //ngược
//        if (Gate::define('update-product', $product)){
//            // User hiện tại có thể cập nhật sản phẩm
//            abort(403);
//
//        }
//        return view('backend.products.edit', [
//                'categories' => $categories,
//                'product' => $product,
//                'category' => $category,
//            ]);

        //chỉ định user
//        $user=User::find(99);
//        if (Gate::forUser($user)->denies('update-product', $product)){
//            // User hiện tại có thể cập nhật sản phẩm
//            return view('backend.products.edit', [
//                'categories' => $categories,
//                'product' => $product,
//                'category' => $category,
//            ]);
//        }else{
//            abort(403);
//        }

//        $user=Auth::user();
//        if ($user->can('update', $product)){
            // User hiện tại có thể cập nhật sản phẩm
            return view('backend.products.edit', [
                'categories' => $categories,
                'product' => $product,
                'category' => $category,
            ]);
//        }else{
//            abort(403);
//        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
//        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name'));
        $product->category_id = $request->get('category_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->save();

        if ($request->hasFile('image')){

            $files = $request->file('image');

            foreach ($files as $file){
                $name = $file->getClientOriginalName();
                $disk_name='public';
                $path = Storage::disk('public')->putFileAs('images', $file, $name);
                $image = Image::where('product_id', $product->id)->first();

                if(!$image){
                    $image = new Image();
                }
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;
                $image->save();
                // dd($path);
            }

        }else{
            dd('khong co file');
        }

        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showImages($id){
        $images = Product::find($id)->images;
        return view('backend.products.image', [
            'images' => $images
        ]);
        // dd($images);
    }
}
