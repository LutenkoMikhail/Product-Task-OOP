@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2>
                        <div class="text-center">{{ __('Edit Category') }}
                    </h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route ('category.update',$category->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <p>
                            <label for="selectcategory"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <select id="selectcategory" name="selectcategory" size="5">
                                @foreach($categories as $categoryItem)
                                    <option value={{$categoryItem->id}} >{{$categoryItem->name}}</option>
{{--                                --}}
{{--                                    @if ($category->parent_id!==null)--}}
{{--                                        <option--}}
{{--                                            selected={{$category->getParentId()}} >{{$category->getParentName()}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value={{$categoryItem->id}} >{{$categoryItem->name}}</option>--}}
{{--                                    @endif--}}
                                @endforeach
                            </select>
                        </p>
                        @error('selectcategory')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save.....') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
