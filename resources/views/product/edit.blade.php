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
        <form class="bg-white shadow rounded py-3 px-5" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="py-2" for="">Id</label>
                <input class="field left form-control" readonly="readonly" type="number" name="nit"
                    value="{{ $product->id }}">

                @error('id')
                    <div class="alert alert-danger">{{ $errors->first('id') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Description</label>
                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ $product->description }}">

                @error('description')
                    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Price</label>
                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ $product->price }}">

                @error('price')
                    <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Stock</label>
                <input class="form-control @error('stock') is-invalid @enderror" type="number" name="stock" value="{{ $product->stock }}">

                @error('stock')
                    <div class="alert alert-danger">{{ $errors->first('stock') }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input name="image" class="form-control form-control-lg @error('image') is-invalid @enderror" id="formFileLg" type="file">
                @error('image')
                    <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                @enderror
            </div>
            {{-- <div>
                        <label for="">Active</label>
                        <select name="active">
                            <option {{ old('active', '') == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                            <option {{ old('active', '') == 'no' ? 'selected' : '' }} value="no">Not</option>
                        </select>
                    </div> --}}
            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a class="btn btn-primary" href="{{ route('product.index') }}">Go Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
