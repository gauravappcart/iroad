<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Home_controller;
use App\Http\Controllers\admin\Login_controller;
use App\Http\Controllers\admin\Dashboard_controller;
use App\Http\Controllers\admin\User_controller;
use App\Http\Controllers\admin\Material_controller;
use App\Http\Controllers\admin\Labour_controller;
use App\Http\Controllers\admin\Monitoring_controller;
use App\Http\Controllers\admin\Vendor_controller;
use App\Http\Controllers\admin\Sites_controller;
use App\Http\Controllers\admin\ProjectComponentController;
use App\Http\Controllers\admin\TenderItemsController;
use App\Http\Controllers\admin\UnitsController;
use App\Http\Controllers\admin\MonitorTenderController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\DesignationsController;
use App\Http\Controllers\admin\Machine_controller;
use App\Http\Controllers\admin\Assets_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'valid:admin,data'], function() {
        valid();
    });

    Route::group(['middleware' => 'invalid:admin,data'], function() {
        invalid();
    });
});

Route::group(['prefix' => 'store'], function () {
    Route::group(['middleware' => 'valid:store,data'], function() {
        valid();
    });

    Route::group(['middleware' => 'invalid:store,data'], function() {
        invalid();
    });
});

Route::group(['prefix' => 'purchase'], function () {
    Route::group(['middleware' => 'valid:purchase,data'], function() {
        valid();
    });

    Route::group(['middleware' => 'invalid:purchase,data'], function() {
        invalid();
    });
});

Route::group(['prefix' => 'manager'], function () {
    Route::group(['middleware' => 'valid:manager,data'], function() {
        valid();
    });

    Route::group(['middleware' => 'invalid:manager,data'], function () {
        invalid();
    });
});

function valid()
{
    Route::get('/home', [Home_controller::class, 'index']);
    Route::get('/', [Login_controller::class, 'index']);
    Route::get('login', [Login_controller::class, 'index']);
    Route::post('login', [Login_controller::class, 'login']);
}

function invalid()
{
    Route::get('logout', [Dashboard_controller::class, 'logout']);
    Route::get('dashboard', [Dashboard_controller::class, 'index']);

    Route::get('users', [User_controller::class, 'index']);
    Route::post('add-user', [User_controller::class, 'add_user']);

    Route::get('machines', [Machine_controller::class, 'index'])->name('machines');
    Route::post('add-machines', [Machine_controller::class, 'add_machines']);
    Route::post('machines-import', [Machine_controller::class, 'machines_import']);
    Route::get('import-machine', [Machine_controller::class, 'import_machine']);
    Route::get('export-machine', [Machine_controller::class, 'export_machine']);

    Route::get('assets', [Assets_controller::class, 'assets_list'])->name('assets');
    Route::get('add-asset', [Assets_controller::class, 'add_asset'])->name('add_asset');
    Route::post('add-asset-form', [Assets_controller::class, 'create_asset'])->name('create_asset');
    Route::post('update-asset', [Assets_controller::class, 'update_asset'])->name('update_asset');
    Route::post('import-asset', [Assets_controller::class, 'import_asset'])->name('import_asset');
    Route::get('edit-asset', [Assets_controller::class, 'edit_asset'])->name('edit_asset');
    Route::get('delete-asset', [Assets_controller::class, 'delete_asset'])->name('delete_asset');

    Route::get('materials', [Material_controller::class, 'index'])->name('materials');
    Route::post('add-materials', [Material_controller::class, 'add_materials']);
    Route::post('material-import', [Material_controller::class, 'upload_file']);
    Route::get('export-material', [Material_controller::class, 'export_material']);
    Route::get('import-materials', [Material_controller::class, 'import_materials']);
    Route::post('copy-site-materials', [Material_controller::class, 'copy_site_materials']);

    Route::get('activities', [Monitoring_controller::class, 'index'])->name('activities');
    Route::post('add-activity', [Monitoring_controller::class, 'add_activity'])->name('activities');

    Route::get('vendors', [Vendor_controller::class, 'index'])->name('vendors');
    Route::post('add-vendors', [Vendor_controller::class, 'add_vendors']);

    Route::get('sites', [Sites_controller::class, 'index']);
    Route::post('add-site', [Sites_controller::class, 'add_site']);
    Route::get('project-details', [Sites_controller::class, 'project_datails']);
    Route::get('add-project-details', [Sites_controller::class, 'add_project_datails']);
    Route::post('add-component-chainage', [Sites_controller::class, 'add_component_chainage']);
    Route::post('update-road-compenet', [Sites_controller::class, 'update_road_compenet']);
    Route::post('remove-road-compenet', [Sites_controller::class, 'remove_road_compenet']);
    // Route::post('get-component-extra-field-details', [Sites_controller::class, 'remove_road_compenet']);

    Route::get('plan-project', [Sites_controller::class, 'plan_project']);
    Route::post('add-project-plan-activity', [Sites_controller::class, 'add_project_plan_activity']);
    Route::post('add-project-plan-labour', [Sites_controller::class, 'add_project_plan_labour']);
    Route::post('add-project-plan-vehicle-type', [Sites_controller::class, 'add_project_plan_vehicle_type']);

    Route::post('add-project-plan-material', [Sites_controller::class, 'add_project_plan_material']);
    Route::get('/get-material-options/{id}', [Sites_controller::class, 'get_material_options']);

    Route::get('/get-machine-options/{id}', [Sites_controller::class, 'get_machine_options']);
    Route::get('/get-machine-cost', [Sites_controller::class, 'get_machine_cost']);
    Route::post('add-project-plan-machine', [Sites_controller::class, 'add_project_plan_machine']);

    Route::post('add-project-plan-department', [Sites_controller::class, 'add_project_plan_department']);
    Route::get('/get-user-options/{id}', [Sites_controller::class, 'get_user_options']);

    Route::get('tender-item-list', [TenderItemsController::class, 'tender_item_list']);
    Route::get('weekly-plan', [Sites_controller::class, 'weekly_plan']);
    Route::get('add-weekly-plan', [Sites_controller::class, 'add_weekly_plan']);
    Route::get('view-weekly-plan', [Sites_controller::class, 'view_weekly_plan']);
    Route::post('save-weekly-plan', [Sites_controller::class, 'save_weekly_plan']);
    Route::get('monitor-activity-list', [Monitoring_controller::class, 'site_monitor_activity_list']);
    Route::post('attach-tender-items-to-monitoring-activity', [MonitorTenderController::class, 'attach_tender_items_to_monitoring_activity']);



    Route::post('add-tender-item', [TenderItemsController::class, 'add_tender_item']);

    Route::get('project-component', [ProjectComponentController::class, 'index']);
    Route::post('add-component', [ProjectComponentController::class, 'add_component']);
    Route::post('remove-component-extra-field', [ProjectComponentController::class, 'remove_component_extra_field']);

    Route::get('units-list', [UnitsController::class, 'units_list']);
    Route::post('add-units', [UnitsController::class, 'add_units']);

    Route::get('roles-list', [RolesController::class, 'roles_list']);
    Route::post('add-roles', [RolesController::class, 'add_roles']);
    Route::post('roles-import', [RolesController::class, 'roles_import']);
    Route::get('import-roles', [RolesController::class, 'import_roles']);
    Route::get('export-roles', [RolesController::class, 'export_roles']);

    Route::get('designations-list', [DesignationsController::class, 'designations_list']);
    Route::post('add-designations', [DesignationsController::class, 'add_designations']);
    Route::post('designations-import', [DesignationsController::class, 'designations_import']);
    Route::get('import-designations', [DesignationsController::class, 'import_designations']);
    Route::get('export-designations', [DesignationsController::class, 'export_designations']);


    Route::get('labours', [Labour_controller::class, 'index']);
    Route::post('add-labour-type', [Labour_controller::class, 'add_labour_type']);


    Route::get('export', [TenderItemsController::class, 'export']);
    Route::get('import-tender-items', [TenderItemsController::class, 'import_tender_items']);
    Route::post('import', [TenderItemsController::class, 'import']);



}

Route::get('mail', [Sites_controller::class, 'sendMail']);



