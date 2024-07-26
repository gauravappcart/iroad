<?php

namespace App\Services;

use App\Models\VehicleTypesModel;
// use App\Models\AssetGroup;
// use App\Models\ProfitCenter;
use App\Models\Supplier;


class UserService
{

    public function get_suppliers($request)
    {
        $query=Supplier::select('suppliers.*');
        !empty($request['supplier_id']) ? $query->where('suppliers.id',$request['supplier_id']) : '';
        $suppliers=!empty($request['supplier_id']) ? $query->first() : $query->get();
        return $suppliers;
    }
}
