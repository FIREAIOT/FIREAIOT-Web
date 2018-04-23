<footer>
    <div class="container margin-top-20">
        <div class="row no-margin no-padding">
            <div class="col-sm-3">
                <h4 class="mg-md">
                    <b>Company</b>
                </h4>
                <a href="{{ route('home.index') }}" class="btn-link">About us</a>
                <br>
            </div>

            <div class="col-sm-3">
                <h4 class="mg-md">
                    <b>Services</b>
                </h4>
                <a href="#" class="btn-link">iOS Apps</a>
                <br>
            </div>

            <div class="col-sm-3">
                <h4 class="mg-md">
                    <b>Resources</b>
                </h4>
{{--                <a href="{{ route('privacy') }}" class="btn-link">Privacy</a>--}}
                {{--<br>--}}
                {{--<a href="{{ route('terms') }}" class="btn-link">Terms of use</a>--}}
                {{--<br>--}}
                <a href="#" class="btn-link">Education</a>
                <br>
                <a href="#" class="btn-link">Blog</a>
                <br>
                <a href="#" class="btn-link">Contact us</a>
                <br>
                <a href="#" class="btn-link">Bank</a>
                <br>
            </div>

            <div class="col-sm-3">
                <h4 class="mg-md">
                    <b>Follow</b>
                </h4>
                <a href="{{ env('linkedin', '#') }}" target="_blank" class="btn btn-linkedin btn-round btn-simple btn-just-icon">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a href="{{ env('github', '#') }}" target="_blank" class="btn btn-github btn-round btn-simple btn-just-icon">
                    <i class="fa fa-github"></i>
                </a>
                <a href="{{ env('facebook', '#') }}" target="_blank" class="btn btn-facebook btn-round btn-simple btn-just-icon">
                    <i class="fa fa-facebook"></i>
                </a>
                <br>
                <a href="{{ env('twitter', '#') }}" target="_blank" class="btn btn-twitter btn-round btn-simple btn-just-icon">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="{{ env('google', '#') }}" target="_blank" class="btn btn-google btn-round btn-simple btn-just-icon">
                    <i class="fa fa-google"></i>
                </a>
                <a href="{{ env('instagram', '#') }}" target="_blank" class="btn btn-instagram btn-round btn-simple btn-just-icon">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="text-center">
            Built with <div class="pulse txt-red-color" style="display: inline-block">❤︎</div>︎ By Binary Torch
            <br>
            I Love Math 2018 © All rights reserved
        </div>
        <br>
    </div>
</footer>