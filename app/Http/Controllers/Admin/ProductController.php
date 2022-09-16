<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductDetail;
use App\Models\Price;
use App\Http\Requests\Admin\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Utils\UploadFile;

class ProductController extends Controller
{
    /**
     * Define Variable
     */
    private $folderThumb;
    private $folderImage;
    private $product;
    private $category;

    /**
     * Constructor
     * 
     * @param Product $product
     * @param Category $category
     * 
     * @description
     * Product $product (Automatic Injection)
     * Category $category (Automatic Injection)
     */
    public function __construct(Product $product, Category $category)
    {
        $this->category = $category;
        $this->product = $product;

        // Set Path for folder Upload File
        $this->folderThumb = config('common.folder_product_thumb_upload');
        $this->folderImage = config('common.folder_product_img_upload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $product = Product::with(['category']);
        //dd($product);

        if (!empty($request->name)) {
            $product = $product->where('name', 'like', '%' . $request->name . '%');
        }

        // // search category_name
        if (!empty($request->category_id)) {
            $product = $product->where('category_id', $request->category_id);
        }

        $product = $product->orderBy('id', 'desc');

        $product = $product->paginate(8);

        // get list data of table categories
        $categories = Category::pluck('name')
            ->toArray();

        $data['categories'] = $categories;
        // dd($posts);
        $data['products'] = $product;

        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $products = Product::get();
        $data['products'] = $products;

        $categories = Category::pluck('name', 'id')->toArray();
        $data['categories'] = $categories;

        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // Upload Thumbnail
        $thumbnailPath = UploadFile::upload($request->thumbnail, $this->folderThumb);

        // Upload Images
        $files = $request->images;
        $productImages = UploadFile::upload($files, $this->folderImage);
        $productImages = empty($productImages) ? [] : $productImages;

        // Define Variable
        $dataInsert = [
            'name' => $request->name,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
            'content' => $request->content,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'images' => json_encode($productImages),
            'category_id' => $request->category_id,
        ];

        try {
            // insert into table products
            $this->product->create($dataInsert);

            // success
            return redirect()->route('admin.product.index')
                ->with('success', 'Insert successful!');
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with('error', $ex->getMessage())
                ->withInput();
        }
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
        $data = [];
        $product = Product::find($id);
        $data['product'] = $product;
        return view('admin.products.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $categories = Category::pluck('name', 'id')
            ->toArray();
        // $post = Post::find($id); // case 1
        $product = Product::findOrFail($id); // case 2
        $data['product'] = $product;
        $data['categories'] = $categories;
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        // Get Product
        $product = $this->product
            ->findOrFail($id);

        /**
         * Update data for table products
         * 
         * Set value for attribute of model Product
         */
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        // Check have Upload Thumbnail ?
        if (!empty($request->thumbnail)) {
            // Upload file Thumbnail
            $thumbnailPath = UploadFile::upload($request->thumbnail, $this->folderThumb);

            // Set value for attribute "thumbnail"
            $product->thumbnail = $thumbnailPath;
        }

        try {
            // Update Data
            $product->save();
            // success
            return redirect()->route('admin.product.index')
                ->with('success', 'Update Product successful!');
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with('error', $ex->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($id);
            // delete data of table products
            $product->delete();

            DB::commit();
            // success
            return redirect()->route('admin.product.index')->with('success', 'Delete successful!');
        } catch (\Exception $ex) {
            // echo $ex->getMessage();exit;
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
