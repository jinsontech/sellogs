<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate(); 
        $admins    = [ 
                        [ 
                            'name'     => 'Admin1',
                            'username' => 'admin1',
                            'password' => '123456',
                        ],
                        [
                            'name'     => 'Admin2',
                            'username' => 'admin2',
                            'password' => '123456',
                        ],
                        [
                            'name'     => 'Admin3',
                            'username' => 'admin3',
                            'password' => '123456',
                        ] 
                     ];

       foreach($admins as $admin)
       {
           Admin::create([
                                'name'     => $admin['name'],
                                'username' => $admin['username'],
                                'password' => Hash::make($admin['password'])
                            ]);
        }
    }
}
