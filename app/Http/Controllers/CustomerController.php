<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::query()->orderByDesc('id')->get();

        return view(OBJECT_CUSTOMER . DOT . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return view(OBJECT_BRAND    . DOT . __FUNCTION__);
        return view(OBJECT_CUSTOMER . DOT . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Customer();

        $model->fill($request->all());

        $model->save();

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String  $id)
    {
        return view(OBJECT_CUSTOMER . DOT . __FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $model = Customer::query()->findOrFail($id);

        return view(OBJECT_CUSTOMER . DOT . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Customer::query()->findOrFail($id);

        $model->fill($request->all());

        $model->save();

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back();
    }
}
