@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('Product.') }} </h3>
            </div>
            <br>
            <div class="row justify-content-center">
            @if( Storage::has ($product->thumbnail))
                <img src="{{ Storage::url($product->thumbnail) }}" height="155" width="225" class="card-img-top"
                     style="max-width: 45%; margin: 0 auto; display: block;">
            @endif
            </div>
            <hr>
            <div class="card-body">
                <h2>
                    <p class="card-text">Title : {{$product->title}}</p>
                <br>
                    <p class="card-text">Description: {{$product->description}}</p>
                <br>
                    <p class="card-text">Short description: {{$product->short_description}}</p>
                <hr>
                    <p class="card-text">SKU: {{$product->sku}}</p>
                <br>
                    <p class="card-text">Price: {{$product->price}}</p>
                <br>
                    <p class="card-text">Date: {{$product->created_at}}</p>
                <hr>

                    <p class="card-text">Author: {{$product->getNameAuthor()}}</p>
                </h2>
                <hr>
                <h2>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Category :</small>
                    </div>
                </h2>
                @if(!empty($product->getAllProductCategories()))
                    @each('categories.parts.category_view', $product->getAllProductCategories(), 'category')
                @endif
                <hr>
                <h2>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Gallery:</small>
                    </div>
                </h2>
                <hr>
                <div class="center">
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm btn btn-success">{{ __('Back') }}</a>
                        <a href="{{ route('product.edit', $product->id) }}"
                           class="btn btn-sm btn-btn btn-warning">{{ __('Edit') }}</a>
                        <a href="{{ route('product.delete', $product->id) }}"
                           class="btn btn-sm btn btn-danger">{{ __('Delete') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection













