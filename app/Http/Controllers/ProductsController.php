<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepo;
    public function __construct ()
    {
        $this->productRepo = new ProductRepository();
    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view('allProducts',compact('allProducts'));
    }
    public function saveProduct (SaveProductRequest $request){

        $this->productRepo->createNew($request);

        return redirect()->route('sviProizvodi');
    }
    public function delete($product)
    {
        $singleProduct = $this->productRepo->getProductById($product);
        if ($singleProduct == null) {
            die("Ovaj proizvod ne postoji!");
        }
        $singleProduct->delete();
        return redirect()->back();
    }
    public function singleProduct(Request $request, ProductsModel $product)
    {
        return view ('products.edit', compact('product'));
    }
    public function edit(EditProductRequest $request, ProductsModel $product)
    {
        $this->productRepo->editProduct($product, $request);

        return redirect()->route('sviProizvodi');
    }
}
