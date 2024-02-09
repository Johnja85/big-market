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
    <div class="py-12">∫
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
            <form action="{{ route('customer.store')}}" method="POST">
                @csrf
                <div>
                    <label for="">Nit</label>
                    <input type="number" name="nit" value={{ old('nit', '') }}>
                    
                    @error('nit')
                        <div class="alert alert-danger">{{ $errors->first('nit') }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Name</label>
                    <input type="text" name="name" value={{ old('name', '') }}>
                    @error('name')
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Address</label>
                    <input type="text" name="address" value={{ old('address', '') }} >
                    @error('address')
                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" value={{ old('email', '') }} >
                    @error('email')
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Phone</label>
                    <input type="text" name="phone" value={{ old('phone', '') }} >
                    @error('phone')
                        <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">Country</label>
                    <input type="text" name="country" value={{ old('country', '') }} >
                    @error('country')
                        <div class="alert alert-danger">{{ $errors->first('country') }}</div>
                    @enderror
                </div>

                <div>
                    <label for="">City</label>
                    <input type="text" name="city" value={{ old('city', '') }} >
                    @error('city')
                        <div class="alert alert-danger">{{ $errors->first('city') }}</div>
                    @enderror
                </div>

                {{-- <div>
                    <label for="">Active</label>
                    <select name="active">
                        <option {{ old('active', '') == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                        <option {{ old('active', '') == 'no' ? 'selected' : '' }} value="no">Not</option>
                    </select>
                </div> --}}

                <button type="submit">Create</button>

                <a href="{{ route('customer.index') }}">Go Back</a>
            </form>
        </div>
    </div>
@endsection