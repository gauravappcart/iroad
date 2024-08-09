<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\AssetMaterialLabourRequest;
use App\Models\AssetRequest;
use App\Models\LabourRequest;
use App\Models\MaterialRequest;
use Illuminate\Http\Request;
use App\Http\Requests\AssignRequiredMaterialRequest;
use App\Services\RequestService;

class AssetMaterialLabourRequestController extends Controller
{
    protected $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function index()
    {
        $material_request_data = $this->requestService->getMaterialRequests();
        $labour_request_data = $this->requestService->getLabourRequests();
        $asset_request_data = $this->requestService->getAssetRequests();

        return view('admin/asset_material_labour_request', compact('material_request_data', 'labour_request_data', 'asset_request_data'));
    }




    public function assign_required_material(AssignRequiredMaterialRequest $request)
    {
        $response =$this->requestService->assignRequiredMaterial($request->validated(),$request->all());
        // return response()->json($order, 201);
        dd($response);
        if ($response['status']) {
            return redirect()->back()->with('success', $response['message']);
        } else {
            return redirect()->back()->with('error', $response['message']);
        }
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
