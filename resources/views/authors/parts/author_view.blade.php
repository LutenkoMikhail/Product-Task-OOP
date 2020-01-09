<div class="card-body">
    <h2>
        <p class="card-text">Name : {{$author->name}}</p>
    </h2>
    <br>
    <h2>
        <p class="card-text">Surname : {{$author->surname}}</p>
    </h2>
    <br>
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <div class="btn-group">
                <a href="{{ route('author.show', $author->id) }}"
                   class="btn btn-sm btn btn-success">{{ __('View') }}</a>
                <a href="{{ route('author.edit', $author->id) }}"
                   class="btn btn-sm btn-btn btn-warning">{{ __('Edit') }}</a>
                <a href="{{ route('author.delete', $author->id) }}"
                   class="btn btn-sm btn btn-danger">{{ __('Delete') }}</a>
            </div>
        </div>
    </div>
</div>
