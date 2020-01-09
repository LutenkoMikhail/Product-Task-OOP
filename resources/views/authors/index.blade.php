@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('All Authors.') }} </h3>
            </div>
            @if (count($authors)!==0)
                <div class="col-md-12">
                    <div class="album py-5 bg-light">
                        <div class="container">
                            <div class="row ">
                                @each('authors.parts.author_view',$authors,'author')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    {{$authors->links()}}
                </div>
        </div>
        @else
            <h3 class="text-center">
                No author data available !
            </h3>
        @endif
    </div>
@endsection













