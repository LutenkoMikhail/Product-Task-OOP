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
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <div class="btn-group">
                <a href="{{ route('category.show', $category->id) }}"
                   class="btn btn-sm btn btn-success">{{ __('View') }}</a>
                <a href="{{ route('category.edit', $category->id) }}"
                   class="btn btn-sm btn-btn btn-warning">{{ __('Edit') }}</a>
                <a href="{{ route('category.delete', $category->id) }}"
                   class="btn btn-sm btn btn-danger">{{ __('Delete') }}</a>
            </div>
        </div>
    </div>
</div>
