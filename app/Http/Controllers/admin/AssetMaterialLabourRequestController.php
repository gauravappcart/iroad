<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\AssetMaterialLabourRequest;
use Illuminate\Http\Request;

class AssetMaterialLabourRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/asset_material_labour_request');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetMaterialLabourRequest  $assetMaterialLabourRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AssetMaterialLabourRequest $assetMaterialLabourRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetMaterialLabourRequest  $assetMaterialLabourRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetMaterialLabourRequest $assetMaterialLabourRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssetMaterialLabourRequest  $assetMaterialLabourRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetMaterialLabourRequest $assetMaterialLabourRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetMaterialLabourRequest  $assetMaterialLabourRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetMaterialLabourRequest $assetMaterialLabourRequest)
    {
        //
    }
}
