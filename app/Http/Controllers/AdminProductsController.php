<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use Illuminate\Support\Facades\Storage;
use App\Product;

class AdminProductsController extends Controller
{


    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository,
                                CategoryRepositoryInterface $categoryRepository){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();
        return view('admin.products.index')
            ->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->forDisplay();
        return view('admin.products.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $this->productRepository->createProduct($request);
        return redirect('/admin/products')
            ->with('success','Product created');
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
    public function edit($id)
    {
        $categories = $this->categoryRepository->forDisplay();
        $product = $this->productRepository->withId($id);

        return view('admin.products.edit')
            ->with('product',$product)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldProductImageName = $product->image;

        $this->productRepository->update($request, $id);
        Storage::delete('public/product_images/'.$oldProductImageName);


        return redirect('admin/products')
            ->with('success','Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect('admin/products')
            ->with('success','Product deleted');
    }
}
