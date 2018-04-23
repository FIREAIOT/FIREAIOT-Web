<!--education-->
<div class="spacer"></div>
<div class="section">
    <div class="container">
        <h3 class="title text-center">Our Workshops</h3>
        <h3 class="grey-text-color text-center">
            Our duty towards the society is to share our experience throughout carefully <br>designed courses and workshops.
        </h3>
        <div class="row margin-top-20">
            @foreach($workshops  as $workshop)
                <div class="col-md-4">
                    <a href="{{ $workshop->path() }}">
                        @component('components.card', [
                        "image" => asset("images/workshops/{$workshop->slug}/card.jpg"),
                        "coverColor" => $workshop->card_cover_color,
                        "title" => $workshop->title,
                        "tag" => $workshop->isNew()
                        ])
                        @endcomponent
                    </a>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--end education-->