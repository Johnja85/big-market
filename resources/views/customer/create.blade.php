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
        <form class="bg-white shadow rounded py-3 px-5" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group py-3">
                <input class="form-control @error('nit') is-invalid @enderror" type="number" name="nit" placeholder="Nit..." value={{ old('nit', '') }}>

                @error('nit')
                    <div class="alert alert-danger">{{ $errors->first('nit') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name..." value={{ old('name', '') }}>
                @error('name')
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Address..." value={{ old('address', '') }}>
                @error('address')
                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email..." value={{ old('email', '') }}>
                @error('email')
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone..." value={{ old('phone', '') }}>
                @error('phone')
                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                @enderror
            </div>

            <div class="form-group py-3">
                <input class="form-control @error('country') is-invalid @enderror" type="text" name="country" placeholder="Country..." value={{ old('country', '') }}>
                @error('country')
                    <div class="alert alert-danger">{{ $errors->first('country') }}</div>
                @enderror
            </div>

            <div class="form-groupy py-3">
                <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" placeholder="City..." value={{ old('city', '') }}>
                @error('city')
                    <div class="alert alert-danger">{{ $errors->first('city') }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Small file input example</label>
                <input name="image" class="form-control form-control-lg" id="formFileLg" type="file">
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
                    <button class="btn btn-primary" type="submit">Create</button>

                    <a class="btn btn-primary" href="{{ route('customer.index') }}">Go Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
