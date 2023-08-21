<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        ->with(['category'])
        $data = Product::query()->paginate();

        return view(OBJECT_PRODUCTS . DOT . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::query()->get();
        $model = Brand::query()->get();
//        dd($data);
        return view(OBJECT_PRODUCTS . DOT . __FUNCTION__, compact('data','model'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $tableName = (new Product())->getTable();
//        $this->validate($request, [
//            'name' => ['required', 'min:3', 'max:20', Rule::unique($tableName)],
//            'img' => ['nullable', 'image', 'max:1024']
//        ]);

        try {
            $model = new Product();

            $model->fill($request->all());

            if ($request->hasFile('img')) {
                $model->img = upload_file(OBJECT_PRODUCTS, $request->file('img'));
            }

            $model->save();

            return redirect()->route('product.index')
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công!');
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);

            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::query()->get();
        $model = Brand::query()->get();
        return view(OBJECT_PRODUCTS . DOT . __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $model = Product::query()->findOrFail($id);
        return view(OBJECT_PRODUCTS . DOT . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tableName = (new Product())->getTable();
//        $this->validate($request, [
//            'name' => ['required', 'min:3', 'max:20', Rule::unique($tableName)],
//            'img' => ['nullable', 'image', 'max:1024']
//        ]);

        try {
            $model = new Product();

            $model->fill($request->all());

            if ($request->hasFile('img')) {
                $model->img = upload_file(OBJECT_PRODUCTS, $request->file('img'));
            }

            $model->save();

            return redirect()->route('product.index')
                ->with('status', Response::HTTP_OK)
                ->with('msg', 'Thao tác thành công!');
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);

            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('msg', 'Thao tác thất bại!');
        }
//        $model = Product::query()->findOrFail($id);
//
//        $model->fill($request->all());
//
//        $model->save();
//
//        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }
}
