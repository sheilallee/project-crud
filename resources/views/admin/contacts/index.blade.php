@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('contacts.list') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="busca" class="col-md-4 col-form-label text-md-end">{{ __('Search') }}</label>
                            <div class="col-md-6">
                                <input id="busca" type="text" class="form-control" 
                                    name="busca" value="{{ old('busca') }}" 
                                    autofocus>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                                <a class="btn btn-secondary" href="{{route('contacts.create')}}">
                                    {{__('New Contact')}}
                                </a>
                            </div>
                        </div>
                    </form>
                    <br>
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>{{__("Edit")}}</th>
                                <th>{{__("Name")}}</th>
                                <th>{{__("Birth date")}}</th>
                                <th>{{__("Email address")}}</th>
                                <th>{{__("Phone Number")}}</th>
                                <th>{{__("Delete")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>
                                        <a href="{{route("contacts.edit",$item)}}" class="btn btn-primary">
                                            {{ __('Edit') }}
                                        </a>
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->birth_date}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>                   
                                    <td>
                                        <form action="{{route('contacts.destroy',$item)}}" method="post">
                                            @csrf
                                            @method("DELETE")

                                            <button type="button" onclick="confirmDeleteModal(this)" 
                                                class="btn btn-danger">
                                                {{__('Delete')}}
                                            </button>

                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>  
                    {{ $list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
