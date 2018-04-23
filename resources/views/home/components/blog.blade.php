<!--start resources-->
<div class="section">
    <div class="spacer"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="title">
                    Our Blog
                </h3>
                <h3 class="grey-text-color">
                    Bring your coffee ☕️ and start reading..
                </h3>
                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-simple btn-compact-zero">More Articles →</a>
            </div>

            @foreach($posts  as $post)
                <div class="col-md-4">
                    <a href="{{ $post->path() }}">
                        @component('components.card', [
                        "image" => $post->image(),
                        "coverColor" => "none",
                        "title" => $post->title,
                        ])
                        @endcomponent
                    </a>
                </div>
            @endforeach
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--end resources-->