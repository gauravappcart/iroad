<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\App;
use App\Services\AssetService;
use App\Models\User;
use App\Models\Asset;
use App\Models\ProfitCenter;
use App\Models\AssetGroup;
use App\Models\AssetSubGroup;
use App\Models\AssetTransfer;
use App\Models\SiteAddress;
use App\Models\Supplier;

class AssetImport implements ToCollection,WithHeadingRow
{


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Asset([
    //         //
    //     ]);
    // }


    public function collection(Collection $rows)
    {
        // echo "<pre>";
        // print_r($result);
        // exit;


        // $date_column = gmdate("Y-m-d", ($rows[0]['invoice_date'] - 25569) * 86400);

        // echo $date_column;
        // echo date('Y-m-d',strtotime($rows[0]['invoice_date']));
        // exit;

        foreach($rows as $key=>$row)
        {
            // echo "<pre>";
            // print_r($row);
            // wrong_supplier
            // echo (??'******************************').' - '.$key;
            // echo "<br>";
            // echo $row['serial_number'].' - '.( )." <br>";
            // echo ProfitCenter::where('location',rtrim(ltrim($row['asset_location'])))->first()->id ?? NULL ;

            if(!empty($row['asset_sub_group']) && rtrim(ltrim($row['asset_sub_group']))!="Vehicles" && !empty($row['asset_name']))
            {


                    if(!empty($row['asset_location']))
                    {
                        $profitCenter=ProfitCenter::updateOrCreate(
                                [
                                    "location"=>rtrim(ltrim($row['asset_location'])),
                                ],
                                [
                                    "location"=>rtrim(ltrim($row['asset_location']))
                                ]
                            );
                    }

                    if(!empty($row['supplier_name']))
                    {

                        $supplier=Supplier::updateOrCreate(
                            [
                                "supplier_name"=>$row['supplier_name'],
                            ],
                            [
                                'supplier_name'=>$row['supplier_name'],
                                "gstin"=>$row['gstin']??NULL,
                                ]
                            );
                    }

                     $assetData=[
                    'asset_name' => $row['serial_number'].'-'.$row['asset_name'],
                    'asset_group' => AssetGroup::where('group_name',$row['asset_group'])->first()->id?? NULL,

                    'put_to_use' => !empty($row['put_to_use_date']) ? gmdate("Y-m-d", ($row['put_to_use_date'] - 25569) * 86400) : NULL ,


                    'asset_sub_group' => AssetSubGroup::where('sub_group_name',rtrim(ltrim($row['asset_sub_group'])))->first()->id ?? NULL,

                    'assetLocation' =>  $profitCenter->id ?? NULL,

                    'asset_life_years' => $row['assets_life_year']?? NULL,

                    'end_life_date' =>!empty($row['end_life_year']) ? gmdate("Y-m-d", ($row['end_life_year'] - 25569) * 86400) : NULL ,

                    'insurance_end' => $row['insurance_end']?? NULL,

                    'upcoming_maintenance' => $row['upcoming_maintenance']?? NULL,

                    'asset_quantity' => $row['asset_quantity']?? NULL,

                    'purchase_value' => $row['purchase_value']?? NULL,

                    'purchase_description' => $row['purchase_description']?? NULL,

                    'sale_date' => $row['sale_date']?? NULL,

                    'sale_value' => $row['sale_value']?? NULL,

                    'sale_description' => $row['sale_description']?? NULL,

                    'supplier' => $supplier->id ?? 0,

                    'invoice_number' => $row['invoice_number']?? NULL,

                    'invoice_date' => !empty($row['invoice_date']) ? gmdate("Y-m-d", ($row['invoice_date'] - 25569) * 86400) : NULL ,

                    'finance_bank_name' => $row['finance_bank_name']?? NULL,
                    'account_no' => $row['account_no']?? NULL,
                    'loan_amount' => $row['loan_amount']?? NULL,
                    'loan_start_date' => $row['loan_start_date']?? NULL,
                    'loan_end_date' => $row['loan_end_date']?? NULL,
                    'roi' => $row['roi']?? NULL,
                    'emi_amount' => $row['emi_amount']?? NULL,
                    'emi_date' => $row['emi_date']?? NULL,

                    'first_gross_value' => $row['gross_value_as_on_01_04_2022']?? NULL,

                    'addition_during_period' => $row['additions_during_the_year']?? NULL,

                    'deduction' => $row['deletions_during_the_year']?? NULL,

                    'second_gross_value' => $row['gross_value_as_on_31_03_2023']?? NULL,
                    'acc_dep' => $row['accu_dep_as_on_01_04_2022']?? NULL,
                    'acc_dep2' => $row['accu_dep_as_on_31_03_2023']?? NULL,
                    'dep_deduction' => $row['dep_deduction']?? NULL,
                    'net_block' => $row['net_block_as_on_31_03_2023']?? NULL,
                ];

                // echo "<pre>";
                // echo $row['asset_name']."<br>";
                // print_r($assetData);

                Asset::updateOrCreate(
                    ['asset_name' => $row['serial_number'].'-'.$row['asset_name']],
                    $assetData
                );

            //     App::make('App\Services\AssetService')->create_asset($assetData);
             }
        }
    }
}
