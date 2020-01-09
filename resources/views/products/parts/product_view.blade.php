<div class="card mb-4 shadow-sm">

    @if( Storage::has ($product->thumbnail))
        <img src="{{ Storage::url($product->thumbnail) }}" height="155" width="225" class="card-img-top"
             style="max-width: 45%; margin: 0 auto; display: block;">
    @endif
    <div class="card-body">
        <h2>
            <p class="card-text">{{$product->title}}</p>
        </h2>
        <br>
        <p class="card-text">{{$product->short_description}}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn btn-success">View</button>
                <button type="button" class="btn btn-sm btn-btn btn-warning">Edit</button>
                <button type="button" class="btn btn-sm btn btn-danger">Delete</button>
            </div>
            <small class="text-muted">Price : {{$product->price}} </small>
        </div>
        <h5>
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Author : {{$product->getNameAuthor()}} </small>
            </div>
        </h5>
        <h5>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">Date : {{$product->created_at}} </small>
        </div>
        </h5>
            <h5>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">Category :</small>
        </div>
            </h5>
        @if(!empty($product->getAllProductCategories()))
            @each('categories.parts.category_view', $product->getAllProductCategories(), 'category')
        @endif
    </div>
</div>
