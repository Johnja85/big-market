@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="p-4 sm:p-8">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">Products</h1>
                <a class="btn btn-primary" href="{{ route('product.create') }}">New Create</a>
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-start">
                    @forelse($products as $product)
                    <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">

                        @if ($product->image)
                            <img src="/storage/{{ $product->image }}" class="card-img-top" alt="{{ $product->image }}" style="height: 250px; object-fit: cover">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->description }}</h5>
                            <p class="card-text">{{ $product->price }}</p>
                            <a href="{{ route('product.edit', $product) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('product.destroy', $product) }}" method="post">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </form>
                        </div>
                        
                    </div>
                    @empty
                        <p>There are not products</p>
                    @endforelse
            </div>         
        </div>
    </div>
@endsection
