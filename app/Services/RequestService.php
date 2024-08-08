<?Php
// app/Services/RequestService.php

namespace App\Services;

use App\Models\MaterialRequest;
use App\Models\LabourRequest;
use App\Models\AssetRequest;

class RequestService
{
    public function getMaterialRequests()
    {
        return MaterialRequest::with(['material', 'material_type', 'site', 'site_plan_material'])
            ->where('is_active', 1)
            ->orderBy('material_requests.created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function getLabourRequests()
    {
        return LabourRequest::with(['labour_type', 'site', 'site_plan_labour'])
            ->where('is_active', 1)
            ->orderBy('labour_requests.created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function getAssetRequests()
    {
        return AssetRequest::with(['vehical_type', 'site', 'site_plan_asset'])
            ->where('is_active', 1)
            ->orderBy('asset_requests.created_at', 'desc')
            ->get()
            ->toArray();
    }
}
