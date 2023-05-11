<?php

namespace Database\Seeders;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        
        foreach($customers as $customer){
            for($i = 1;$i<=3; $i++){
                $addresses = new Address([
                    'name' =>'Address ' .$i,
                    'city' => 'City' .$i,
                    'street' => 'Street' .$i,
                    'house' => 'House' .$i,
                    'flour' => ''.$i,
                    'apartment' => ''.$i,
                    'intercome_code' => 'Code' .$i,
                    
                ]);
                $customer->addresses()->save($addresses);
            }
        }
    }
}
