@extends('layouts.app')
@section('content')

<div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <table>
                <thead>
                    <tr>
                        <th>
                            Nit 
                        </th>
                        <th>
                            Name 
                        </th>
                        <th>
                            Address 
                        </th>
                        <th>
                            Email 
                        </th>
                        <th>
                            Phone 
                        </th>
                        <th>
                            Country 
                        </th>
                        <th>
                            City 
                        </th>
                    </tr>  
                </thead>
                <tbody>  
                    @foreach ($customers as $customer)
                        <tr>
                            <td>
                                <nav>{{ $customer->nit }}</nav>
                            </td>

                            <td>
                                <nav>{{ $customer->name }}</nav>
                            </td>
                            <td>
                                <nav>{{ $customer->address }}</nav>
                            </td>
                            <td>
                                <nav>{{ $customer->email }}</nav>
                            </td>
                            <td>
                                <nav>{{ $customer->phone }}</nav>
                            </td>
                            <td>
                                <nav>{{ $customer->country }}</nav>
                            </td>
                            <td>
                                <nav>{{ $customer->city }}</nav>
                            </td>
                            <td>
                                <a href="{{ route('customer.edit', $customer) }}">Edit</a>
                                <form action="{{ route('customer.destroy', $customer) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
            {{ $customers->links() }}
            <a href="{{ route('customer.create') }}">New Create</a>
         </div>
     </div>
@endsection