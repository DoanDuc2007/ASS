<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::query()->orderByDesc('id')->get();

        return view(OBJECT_BRAND . DOT . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(OBJECT_BRAND . DOT . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Brand();

        $model->fill($request->all());

        $model->save();

        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String  $id)
    {
        return view(OBJECT_BRAND . DOT . __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $model = Brand::query()->findOrFail($id);

        return view(OBJECT_BRAND . DOT . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Brand::query()->findOrFail($id);

        $model->fill($request->all());

        $model->save();

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return back();
    }
}
