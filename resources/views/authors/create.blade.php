@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('Create Author.') }} </h3>
            </div>
            <form action="{{route ('author.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" maxlength="50" placeholder="name" required
                               autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>
                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                               name="surname" value="{{ old('surname') }}" maxlength="50" placeholder="surname" required
                               autocomplete="surname" autofocus>
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Create Author.</button>

            </form>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
