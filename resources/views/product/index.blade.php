@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="p-4 sm:p-8">
            <div class="d-flex justify-content-between align-items-center">
                @isset($category)
                    <div>
                        <h1 class="display-4">{{ $category->name }}</h1>
                        <a href="{{ route('product.index') }}" class="badge text-bg-secondary">Go to all products</a>
                    </div>
                @else
                    <h1 class="display-4">Products</h1>
                @endisset
                @can('create', $newProduct)
                    <a class="btn btn-primary" href="{{ route('product.create') }}">New Create</a>
                @endcan
            </div>
            <div class="d-flex flex-wrap justify-content-between align-items-start">
                    @forelse($products as $product)
                    <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem;">

                        @if ($product->image)
                            <img src="/storage/{{ $product->image }}" class="card-img-top" alt="{{ $product->image }}" style="height: 250px; object-fit: cover">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->description }}</h5>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="badge text-bg-secondary">{{ 'Price: ' . $product->price }}</a>
                                <a href="#" class="badge text-bg-secondary">{{ 'Stock: ' . $product->stock }}</a>
                            </div>
                            @if ($product->category)
                                <a href="{{ route('category.show', $product->category->id ) }}" class="badge text-bg-success justify-content-right">{{ 'Category: ' . (isset($product->category) ? $product->category->name : 'Without category') }}</a>  
                            @endif
                            <p>
                            <div class="d-flex justify-content-between">
                                @can('update', $newProduct)
                                    <a href="{{ route('product.edit', $product) }}" class="btn btn-primary">Edit</a>
                                @endcan
                                @can('delete', $newProduct)
                                    <form action="{{ route('product.destroy', $product) }}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-primary" type="submi t">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                        
                    </div>
                    @empty
                        <p>There are not products</p>
                    @endforelse
            </div>         
        </div>
    </div>
@endsection
