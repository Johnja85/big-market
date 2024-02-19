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
        <form class="bg-white shadow rounded py-3 px-5" action="{{ route('customer.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label class="py-2" for="">Nit</label>
                <input class="field left form-control" readonly="readonly" type="number" name="nit"
                    value="{{ $customer->nit }}">

                @error('nit')
                    <div class="alert alert-danger">{{ $errors->first('nit') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $customer->name }}">

                @error('name')
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Address</label>
                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $customer->address }}">

                @error('address')
                    <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $customer->email }}">

                @error('email')
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Phone</label>
                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $customer->phone }}">

                @error('phone')
                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Country</label>
                <input class="form-control @error('country') is-invalid @enderror" type="text" name="country" value="{{ $customer->country }}">

                @error('country')
                    <div class="alert alert-danger">{{ $errors->first('country') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">City</label>
                <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ $customer->city }}">

                @error('city')
                    <div class="alert alert-danger">{{ $errors->first('city') }}</div>
                @enderror
            </div>

            <div>
                <label class="py-2" for="">Acive</label>
                <select class="form-control" name="is_active">
                    <option value="1" {{ $customer->is_active == true ? 'selected' : '' }}>True</option>
                    <option value="0" {{ $customer->is_active == false ? 'selected' : '' }}>False</option>
                </select>

                @error('is_active')
                    <div class="alert alert-danger">{{ $errors->first('is_active') }}</div>
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
                    <a class="btn btn-primary" href="{{ route('customer.index') }}">Go Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
