<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users_model;
use App\Scopes\GlobeScope;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $records=[[
                            'company_id' => '1',
                            'first_name' => 'Super',
                            'last_name' => 'Admin',
                            'email_id' => 'admin@gmail.com',
                            'mobile' => '',
                            'user_role' => '1',
                            'designation_id' => '',
                            'shop_name' => '',
                            'password' => '$2y$10$HVII4qusmP59yQ.XEFLjzOOhfjn8CB2/aABLwdU0BrxM7RcpLG2I2',
                            'token' => '7aa6a4e35d82d240993ca1845fd71b76fe3dfe5e',
                            'created_by' => '0',
                            'is_active' => '1',
                            'created_at' => '2023-07-31 05:20:10',
                            'updated_at' => '2023-07-31 05:20:10',
                            'deleted_at' => ''
                        ]];

                foreach($records as $record) {
                    Users_model::withoutGlobalScopes()->firstOrCreate(
                        ['email_id'=>$record['email_id']],
                        $record
                    );
                    }
    }
}
