<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\Category_Product;

class ProductController extends Controller
{

    public function index(Request $request){
        $products =Product::all();
        $categoryId=0;

        if ($request->category){
            $products = Category::findOrFail($request->category)->products;
            $categoryId = $request->category;
        }

        $categories = Category::with('children')
        ->whereNull('parent')
        ->orderBy('name', 'asc')
        ->get();

        return view('pages.shop',[
            'products'=>$products,
            'categoryId'=>$categoryId,
            'categories'=>$categories
        ]);
    }

    public function create(){
        
    }

    public function store(Request $request){
       
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|min:1',
            'product_images'=>'required'
        ]);

        $product=Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price
        ]);

        $productId = $product->id;

        if ($request->hasFile('product_images')){
            foreach($request->file('product_images') as $image){
                $filename = $image->getClientOriginalName();
                $imageBaseName = pathinfo($filename,PATHINFO_FILENAME);
                $imageExtension = pathinfo($filename,PATHINFO_EXTENSION);
                $filenameToStore = $imageBaseName . '-' . time() . '.' . $imageExtension;
                $path = $image->storeAs('public/assets/images/products' , $filenameToStore);

                $imageTable= Image::create([
                    'src'=>$filenameToStore,
                    'product_id'=>$productId
                ]);
            }
        }

        if($request->product_categories){
            foreach($request->product_categories as $categoryId){
                $product_category=Category_Product::create([
                    'product_id'=>$productId,
                    'category_id'=>$categoryId
                ]);
            }
        }
        
        return redirect()
                ->route('dashboard.products')
                ->with('success','Product has been added!');

    }


    public function show($id){
        $product = Product::findOrFail($id);
        return view('pages.show-product',[
            'product'=>$product
        ]);
    }


    public function edit($id){
        $product = Product::findOrFail($id);
        return view('pages.admin.edit-product',[
            'product'=>$product,
            'categories'=>Category::all()
        ]);
    }


    public function update(Request $request, $id){
        
        $product = Product::findOrFail($id);

        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        // remove product images

        if ($request->removed_images){
            foreach($request->removed_images as $imageToRemove){
                Image::where('src',$imageToRemove)->delete();
    
                if (file_exists(storage_path().'/app/public/assets/images/products/'.$imageToRemove))
                    unlink(storage_path().'/app/public/assets/images/products/'.$imageToRemove);
            }
        }

        // add the new images 

        if ($request->hasFile('product_images')){
            foreach($request->file('product_images') as $image){
                $filename = $image->getClientOriginalName();
                $imageBaseName = pathinfo($filename,PATHINFO_FILENAME);
                $imageExtension = pathinfo($filename,PATHINFO_EXTENSION);
                $filenameToStore = $imageBaseName . '-' . time() . '.' . $imageExtension;
                $path = $image->storeAs('public/assets/images/products' , $filenameToStore);

                $imageTable= Image::create([
                    'src'=>$filenameToStore,
                    'product_id'=>$product->id
                ]);
            }
        }

        // update info

        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;

        // update product categories

        Category_Product::where('product_id',$product->id)->delete();


        if($request->product_categories){
            foreach($request->product_categories as $categoryId){
                $product_category=Category_Product::create([
                    'product_id'=>$product->id,
                    'category_id'=>$categoryId
                ]);
            }
        }

        $product->save();

        return redirect()
                ->route('dashboard.product.edit',$id)
                ->with('success','Product has been saved!');

    }

    public function destroy($id){
        $product = Product::findOrFail($id)->delete();
        return redirect()->route('dashboard.products');

    }
    
}
