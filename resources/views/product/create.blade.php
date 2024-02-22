@extends('layouts.app')
@section('content')
    {{-- @if ($errors->any())
        {{ $errors }}
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
        
    @endif --}}
    <div class="container">
        <form class="bg-white shadow rounded py-3 px-5" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group py-3">
                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" placeholder="Description Product..." value={{ old('description', '') }}>

                @error('description')
                    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" placeholder="Stock product..." value={{ old('stock', '') }}>
                @error('stock')
                    <div class="alert alert-danger">{{ $errors->first('stock') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" placeholder="Price product..." value={{ old('price', '') }}>
                @error('price')
                    <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input name="image" class="form-control form-control-lg" id="formFileLg" type="file">
                @error('image')
                    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                @enderror
            </div>
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button class="btn btn-primary" type="submit">Create</button>

                    <a class="btn btn-primary" href="{{ route('product.index') }}">Go Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
