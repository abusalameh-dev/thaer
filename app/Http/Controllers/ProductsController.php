<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Product;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Facades\Datatables;

class ProductsController extends Controller
{
    protected $path = 'products';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    public function getAll(Request $request)
    {
        return Datatables::of(Product::query())
                ->addColumn('image', function($product){
                    $image = '<img src="/products/'.$product->image->filename.'" class="img-thumbnail" style="width:100px;height:100px" />';
                    return  $image;    
                })
                ->editColumn('provider_id',function($product){
                    return ($product->load('provider'))->name;
                })
                ->editColumn('category_id',function($product){
                    return $product->category->name;
                })
                ->addColumn('actions', function($product){
                    $editRoute = route('products.edit',['id' => $product->id]);
                    $deleteRoute = route('products.destroy',['id' => $product->id]);
                    $str = "<a href='$editRoute'class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-edit'></i> تعديل </a> &nbsp";
                    $str .= "<a href='#'class='btn btn-sm btn-danger delete' onclick='deleteItem($product->id)' data-id='$product->id'><i class='glyphicon glyphicon-trash'></i> حذف </a> &nbsp";
                    $str .= "<form id='delete-form-{$product->id}' action=". route('products.destroy',['id'=> $product->id]). " method='POST' style='display: none;'> ". csrf_field()." ";
                    $str .= method_field('DELETE') . "</form>";
                    return $str;
                })->rawColumns(['actions','image'])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::select('id','name as text')->get();
        $categories = Category::select('id','name as text')->get();
        return view('products.create', compact('providers','categories'));
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
            'name' => 'required',
            'code' => 'required',
            'sell_price' => 'required|numeric',
            'origin_price' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'category_id' => 'required|exists:categories,id',
            // 'image' => 'required|image', 
        ]);
        $product = Product::create([
            'name'  => $request->name,
            'code'  => $request->code,
            'sell_price'  => $request->sell_price,
            'origin_price'  => $request->origin_price,
            'provider_id'  => $request->provider_id,
            'category_id'  => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');    
            $filename = time() . time() * 360 . time() * 1024 . "." . $file->extension();
            
            $obj = Photo::create([
                'filename' => $filename,
                'filesize' => $file->getClientSize(),
                'extension' => $file->extension(),
                'product_id' => $product->id,
            ]);

            $path = $file->move($this->path,$filename);
        }
        session()->flash('message', 'تمت عملية الاضافة بنجاح');
        session()->flash('status', 'success');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect(route('products.index'));
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
        $providers = Provider::select('id','name as text')->get();
        $categories = Category::select('id','name as text')->get();
        if (!$product) return redirect(route('products.index'));

        return view('products.edit',compact('product','providers','categories'));

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
        if (!$product) return redirect(route('products.index'));

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'sell_price' => 'required|numeric',
            'origin_price' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
        ]);
        Product::where('id',$id)
                ->update([
                    'name'  => $request->name,
                    'code'  => $request->code,
                    'sell_price'  => $request->sell_price,
                    'origin_price'  => $request->origin_price,
                    'provider_id'  => $request->provider_id,
                ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');    
            $filename = time() . time() * 360 . time() * 1024 . "." . $file->extension();
            
            $oldImage = $product->image->filename;

            Photo::where('id',$product->image->id)
                    ->update([
                        'filename' => $filename,
                        'filesize' => $file->getClientSize(),
                        'extension' => $file->extension(),
                        'product_id' => $product->id,
                    ]);
            $path = $file->move($this->path,$filename);
            File::delete($this->path . '/' . $oldImage);
            
        }
        session()->flash('message', 'تمت عملية التعديل بنجاح');
        session()->flash('status', 'success');
        return redirect(route('products.index'));
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
        if (!$product) return redirect(route('products.index'));

        // Delete Image and Record 
        $product->image->deleteFile();
        $product->image->delete();
        // Delete Product 
        $product->delete();
        // Flash Message 
        session()->flash('message', 'تمت عملية الحذف بنجاح');
        session()->flash('status', 'success');
        // Redirect Back 
        return redirect(route('products.index'));

    }
}
