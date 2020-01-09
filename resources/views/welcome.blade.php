@extends('layouts.app')

@section('content')
    <main role="main">

        <section class="jumbotron text-center">
            @if (count($products)!==0)
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                @each('products.parts.product_view',$products,'product')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    {{$products->links()}}
                </div>

            @else
                <h3 class="text-center">
                    Product catalog is empty !
                </h3>
            @endif
        </section>
    </main>
@endsection

