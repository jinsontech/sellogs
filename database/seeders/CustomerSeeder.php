<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate(); 
        $customers = [ 
                        [ 
                            'name'     => 'Customer1',
                            'username' => 'customer1',
                            'password' => '123456',
                        ],
                        [
                            'name'     => 'Customer2',
                            'username' => 'customer2',
                            'password' => '123456',
                        ],
                        [
                            'name'     => 'Customer3',
                            'username' => 'customer3',
                            'password' => '123456',
                        ] 
                     ];

       foreach($customers as $customer)
       {
           Customer::create([
                                'name'     => $customer['name'],
                                'username' => $customer['username'],
                                'password' => Hash::make($customer['password'])
                            ]);
        }
    }
}
