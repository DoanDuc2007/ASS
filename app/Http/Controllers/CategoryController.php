<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data = Category::query()->orderByDesc('id')->get();

        return view(OBJECT_CATEGORY . DOT . __FUNCTION__, compact('data'));
    }
    public function create()
    {
        // return view('categories.create');
        return view(OBJECT_CATEGORY . DOT . __FUNCTION__);
    }
    public function store(Request $request)
    {
        $model = new Category();

        $model->fill($request->all());

        $model->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view(OBJECT_CATEGORY . DOT . __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Category::query()->findOrFail($id);

        return view(OBJECT_CATEGORY . DOT . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Category::query()->findOrFail($id);

        $model->fill($request->all());

        $model->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
