<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\PutRequest;
use App\Http\Requests\Customer\StoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    protected $customers;

    public function __construct()
    {
        $this->customers = new Customer();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customers->paginate('4');
        return view('customer.index',compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // return $request->file('image')->store('images', 'public');
        $this->customers->create(
            [
                'nit' => $request['nit'],
                'name' => $request['name'],
                'address' => $request['address'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'country' => $request['country'],
                'city' => $request['city'],
                'image' => $request->file('image')->store('images', 'public'),
                'is_active' => true
                ]
        );

        return to_route('customer.index')->with('status', 'Se guardo datos exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return to_route('customer.index')->with('status', 'Datos del cliente actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
