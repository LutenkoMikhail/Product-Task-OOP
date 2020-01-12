@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('Category.') }} </h3>
            </div>

            <div class="card-body">
                <h2>
                    <p class="card-text">Name : {{$category->name}}</p>
                </h2>
                <br>
                <h2>
                    <p class="card-text">Parent category : {{$category->getNameParent()}}</p>
                </h2>
                <br>
                <h2>
                    <p class="card-text">Date : {{$category->created_at}}</p>
                </h2>
                <br>

                <div class="center">
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm btn btn-success">{{ __('Back') }}</a>
                        <a href="{{ route('category.edit', $category->id) }}"
                           class="btn btn-sm btn-btn btn-warning">{{ __('Edit') }}</a>
                        <a href="{{ route('category.delete', $category->id) }}"
                           class="btn btn-sm btn btn-danger">{{ __('Delete') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection













