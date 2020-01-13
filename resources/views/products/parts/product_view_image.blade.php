<div class="row justify-content-center">
    @if( Storage::has ($image->image_path))
        <img src="{{ Storage::url($image->image_path) }}" height="155" width="225" class="card-img-top"
             style="max-width: 45%; margin: 0 auto; display: block;">
    @endif
</div>

