<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('providers.index');
    }

    public function getAll()
    {
        return Datatables::of(Provider::query())
                ->addColumn('actions', function($provider){
                    $editRoute = route('provider.edit',['id' => $provider->id]);
                    $str = "<a href='$editRoute'class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-edit'></i> تعديل </a> &nbsp";
                    return $str;
                })->rawColumns(['actions'])->make(true);
    }

    public function search(Request $request)
    {
        $term = trim($request->q);
        $formatted_tags = [];
        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Provider::where('name', 'like', '%'. $term .'%')
                        ->get();

        if (! count($tags)) {
            $new = Provider::create([
                'name' => $term,
                'address' => '',
                'phone' => '',
            ]);
            $formatted_tags[] = ['id' => $new->id, 'text' => $new->name];
        } else {
            foreach ($tags as $tag) {
                $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
            }    
        }

        return \Response::json($formatted_tags);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
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
            'address' => 'required',
            'phone' => 'required',
        ]);
        $provider = Provider::create([
            'name'  => $request->name,
            'address'  => $request->address,
            'phone'  => $request->phone,
        ]);

        
        session()->flash('message', 'تمت عملية المزود بنجاح ');
        session()->flash('status', 'success');
        return redirect(route('provider.index'));
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
        $provider = Provider::find($id);
        if (!$provider) return redirect(route('provider.index'));

        return view('providers.edit',compact('provider'));
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
        $provider = Provider::find($id);
        if (!$provider) return redirect(route('providers.index'));

        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        Provider::where('id',$id)
                ->update([
                    'name'  => $request->name,
                    'address'  => $request->address,
                    'phone'  => $request->phone,
                ]);

        session()->flash('message', 'تمت عملية التعديل بنجاح');
        session()->flash('status', 'success');
        return redirect(route('provider.index'));
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
