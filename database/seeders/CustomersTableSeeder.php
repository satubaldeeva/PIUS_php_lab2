<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1;$i <= 100;$i++){
            Customer::create([
                'first_name' => 'Customer' .$i,
                'last_name' => 'LastName' .$i,
                'email' => 'customer' .$i.'@example.com',
                'phone' => '123-456-78' .$i,
                'blocked' =>false,
            ]);
        }
    }
}
