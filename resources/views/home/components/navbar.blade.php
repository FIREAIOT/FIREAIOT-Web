<nav class="navbar navbar-expand-lg navbar-light bg-white no-margin" style="border-radius: 0px; box-shadow: none !important; position: absolute; width: 100%; z-index:1000;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route("home.index") }}"> <img height="30px" src="{{ asset("images/logo.png") }}" alt="FIREAIOT logo"> FIREAIOT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="form-inline ml-auto">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                            <a class="nav-link" href="{{ route("larecipe.index") }}"><i class="fa fa-life-ring"></i> Documentation <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route("dashboard.index") }}"><i class="fa fa-th"></i> Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>