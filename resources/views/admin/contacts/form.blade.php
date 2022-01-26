@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>
                <div class="card-body">

                    @if ($data->id == "")
                        <form method="POST" action="{{ route('contacts.store') }}">
                    @else
                        <form method="POST" action="{{ route('contacts.update',$data) }}">
                        @method('PUT')
                    @endif

                    @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                {{ __('Name') }}
                            </label>

                            <div class="col-md-6"> 
                                <input id="name" type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name', $data->name) }}"    
                                autofocus>

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-end">
                                {{ __('Birth date') }}
                            </label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" 
                                class="form-control @error('birth_date') is-invalid @enderror" 
                                name="birth_date" value="{{ old('birth_date', $data->birth_date) }}"   >

                                @error('birth_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">
                                {{ __('Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="address" type="text" 
                                class="form-control @error('address') is-invalid @enderror" 
                                name="address" value="{{ old('address', $data->address) }}"   >

                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                {{ __('Email address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email', $data->email) }}"   >

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">
                                {{ __('Phone Number') }}
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="text" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                name="phone" value="{{ old('phone', $data->phone) }}" placeholder="(xx)xxxxx-xxxx"    >

                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-end">
                                {{ __('Register date') }}
                            </label>

                            <div class="col-md-6">
                                <input id="register_date" type="date" 
                                class="form-control @error('register_date') is-invalid @enderror" 
                                name="register_date" value="{{ old('register_date', $data->register_date) }}"   >

                                @error('register_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>

                                <a class="btn btn-secondary" href="{{route('contacts.create')}}">
                                    {{__('New Contact')}}
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
