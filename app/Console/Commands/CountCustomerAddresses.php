<?php

namespace App\Console\Commands;
use App\Models\Customer;
use Illuminate\Console\Command;

class CountCustomerAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:count-addresses{id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count the number of addresses for a customer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        
        $customer = Customer::find($id);
        
        if(!$customer) {
            $this->error("Customer with id=$id not found.");
            return 1;
        }
        
        $count = $customer->addresses->count();
        
        $this->info("Customer with id=$id has $count addresses.");
        
        return 0;
    }

}
