<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discount\StoreDiscountRequest;
use App\Http\Requests\Discount\UpdateDiscountRequest;
use App\Models\Shared\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Http\Requests\StoreDiscountRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscountRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shared\Discount  $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shared\Discount  $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscountRequest  $request
     * @param  \App\Models\Shared\Discount  $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shared\Discount  $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
    }
}
