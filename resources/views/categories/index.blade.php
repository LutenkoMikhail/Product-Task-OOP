@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('All Categories.') }} </h3>
            </div>
            @if (count($caterogies)!==0)
                <div class="col-md-12">
                    <div class="album py-5 bg-light">
                        <div class="container">
                            <div class="row ">
                                @each('categories.index',$caterogies,'caterogy')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    {{$caterogies->links()}}
                </div>
        </div>
        @else
            <h3 class="text-center">
                No category data available !
            </h3>
        @endif
    </div>
@endsection













