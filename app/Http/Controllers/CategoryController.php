<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);   

        $filenameToStore=NULL;
        if($request->hasFile('category_image')){
            $image=$request->category_image;
            $filename = $image->getClientOriginalName();
            $imageBaseName = pathinfo($filename,PATHINFO_FILENAME);
            $imageExtension = pathinfo($filename,PATHINFO_EXTENSION);
            $filenameToStore = $imageBaseName . '-' . time() . '.' . $imageExtension;
            $path = $image->storeAs('public/assets/images/categories' , $filenameToStore);
        }

        Category::create([
            'name'=> $request->category_name,
            'description' =>$request->category_description,
            'parent'=> ($request->category_parent == 0 ? NULL:$request->category_parent),
            'image'=> $filenameToStore,
        ]);

        return redirect()
                ->route('dashboard.categories')
                ->with('success','Category has been added!');
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

        $parentCategories = DB::table('categories')
                ->where('parent', '=', NULL)
                ->get();

        return view('pages.admin.edit-category',[
            'category'=>Category::findOrFail($id),
            'categories'=>$parentCategories
        ]);
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
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
        ]); 
        
        $Category=Category::findOrFail($id);
        //dd($request);
        
        $filenameToStore=$Category->image;
        if ($request->hasFile('category_image')){

            if($Category->image){
                if (file_exists(storage_path().'/app/public/assets/images/categories/'.$Category->image))
                    unlink(storage_path().'/app/public/assets/images/categories/'.$Category->image);
            }

            $image=$request->category_image;
            $filename = $image->getClientOriginalName();
            $imageBaseName = pathinfo($filename,PATHINFO_FILENAME);
            $imageExtension = pathinfo($filename,PATHINFO_EXTENSION);
            $filenameToStore = $imageBaseName . '-' . time() . '.' . $imageExtension;
            $path = $image->storeAs('public/assets/images/categories' , $filenameToStore);
        }else{
            if($request->hidden_category_image == ''){
                if (file_exists(storage_path().'/app/public/assets/images/categories/'.$Category->image))
                    unlink(storage_path().'/app/public/assets/images/categories/'.$Category->image);
                $filenameToStore=NULL;
            }
        }

        $Category->name = $request->category_name;
        $Category->description=$request->category_description;
        $Category->parent=$request->category_parent == 0 ? NULL:$request->category_parent;
        $Category->image=$filenameToStore;

        $Category->save();

        return redirect()->route('dashboard.category.edit',$id);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category= Category::findOrFail($id);

        $itsChildren = DB::table('categories')
                     ->select('id')
                     ->where('parent','=',$id)
                     ->get();

        foreach($itsChildren as $child){
            $childCategory = Category::findOrFail($child->id);
            $childCategory->parent=NULL;
            $childCategory->save();
        }

        // remove category image
        if ($Category->image){
            if (file_exists(storage_path().'/app/public/assets/images/categories/'.$Category->image))
                 unlink(storage_path().'/app/public/assets/images/categories/'.$Category->image);
        }
        
        $Category->delete();

        return redirect()->route('dashboard.categories');

    }
}
