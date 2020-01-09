@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('Authors.') }} </h3>
            </div>

            <div class="card-body">
                <h2>
                    <p class="card-text">Name : {{$author->name}}</p>
                </h2>
                <br>
                <h2>
                    <p class="card-text">Surname : {{$author->surname}}</p>
                </h2>

                <div class="center">
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm btn btn-success">{{ __('Back') }}</a>
                        <a href="{{ route('author.edit', $author->id) }}"
                           class="btn btn-sm btn-btn btn-warning">{{ __('Edit') }}</a>
                        <a href="{{ route('author.delete', $author->id) }}"
                           class="btn btn-sm btn btn-danger">{{ __('Delete') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection













