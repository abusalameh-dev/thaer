<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    public function getAll()
    {
        return Datatables::of(Category::query())
                ->addColumn('actions', function($category){
                    $editRoute = route('category.edit',['id' => $category->id]);
                    $str = "<a href='$editRoute'class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-edit'></i> تعديل </a> &nbsp";
                    return $str;
                })->rawColumns(['actions'])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        ]);
        $category = Category::create([
            'name'  => $request->name,
        ]);

        
        session()->flash('message', 'تمت عملية التصنيف بنجاح ');
        session()->flash('status', 'success');
        return redirect(route('category.index'));
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
        $category = Category::find($id);
        if (!$category) return redirect(route('category.index'));
        return view('categories.edit',compact('category'));
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
        $category = Category::find($id);
        if (!$category) return redirect(route('category.index'));

        $this->validate($request,[ 'name' => 'required' ]);

        Category::where('id',$id)->update([ 'name'  => $request->name ]);

        session()->flash('message', 'تمت عملية التعديل بنجاح');
        session()->flash('status', 'success');

        return redirect(route('category.index'));
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
}
