<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Применение фильтров
        if ($request->has('blocked')) {
            $query->where('blocked', $request->blocked);
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->has('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                    ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }

        // Получение списка покупателей с постраничной навигацией
        $customers = $query->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        $addresses = $customer->addresses()->orderBy('created_at', 'desc')->get();

        return view('customers.show', [
            'customer' => $customer,
            'addresses' => $addresses,
        ]);
    }
}
