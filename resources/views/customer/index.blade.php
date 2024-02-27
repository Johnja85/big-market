@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="p-4 sm:p-8">
            <table class="form-control bg-white shadow roundend py-3 list-group list-group-item mb-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Customers</h1>
                    <a class="btn btn-primary" href="{{ route('customer.create') }}">New Create</a>
                </div>
                <thead class="text-primary">
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
                        <th>
                            image
                        </th>
                        <th>
                            Active
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black-50 px-5">
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
                                @if ($customer->image)
                                    <img src="/storage/{{ $customer->image }}">
                                @endif
                            </td>
                            <td>
                                <nav>{{ $customer->is_active ? 'True' : 'False' }}</nav>
                            </td>
                            <td>
                                <a href="{{ route('customer.edit', $customer) }}">Edit</a>
                                {{-- <form action="{{ route('customer.destroy', $customer) }}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
@endsection
