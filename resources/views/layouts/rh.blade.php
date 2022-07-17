<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div id="app">
    <header class="header">
        <div class="navbar navbar-expand-xl fixed-top">
            <div class="container">
                <a href="/" aria-label="Remington" class="logo">
                    <img src="{{ asset('images/svg/logo-h.svg') }}" width="255" alt="Logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="toggler-icon"></div>
                </button>
                <nav id="navbar" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto justify-content-end">
                        <li><a class="nav-link bold" href="#">Poznaj nasze produkty</a></li>
                        <li><a class="nav-link bold" href="#">Kontakt</a></li>
                        <li><a class="nav-link bold" href="{{ asset('/uploads/regulamin.pdf') }}">Regulamin</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-4 col-lg-5 col-xl-6 align-self-start text-center text-md-left text-uppercase">
                    <a href="{{ asset('/uploads/regulamin.pdf') }}" target="_blank" rel="noopener noreferrer">Regulamin</a>
                    <a href="{{ asset('/uploads/polityka-prywatnosci.pdf') }}" target="_blank" rel="noopener noreferrer">Polityka prywatności</a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 align-self-end text-center text-sm-right text-md-center">

                </div>
                <div class="col-12 col-md-4 col-lg-4 col-xl-3 socials align-self-end">
                    <div class="row">
                        <div class="col-4 col-sm-2 col-md-4 offset-sm-3 offset-md-0 text-center text-sm-left">
                            <a class="link" href="https://www.instagram.com/kochamdom/" target="_blank"
                               rel="noopener noreferrer" aria-label="Instagram">
                                <svg xmlns="https://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                    <g transform="translate(-1005.06 -5345)">
                                        <path
                                            d="M641.656,338.828A3.828,3.828,0,1,1,637.828,335a3.828,3.828,0,0,1,3.828,3.828Zm0,0"
                                            transform="translate(387.231 5026.172)" fill="#fff"></path>
                                        <path
                                            d="M580.852,266.13a3.8,3.8,0,0,0-2.18-2.18,6.355,6.355,0,0,0-2.132-.4c-1.211-.055-1.574-.067-4.641-.067s-3.43.012-4.641.067a6.359,6.359,0,0,0-2.132.4,3.8,3.8,0,0,0-2.18,2.18,6.356,6.356,0,0,0-.4,2.133c-.055,1.211-.067,1.574-.067,4.641s.012,3.43.067,4.641a6.354,6.354,0,0,0,.4,2.132,3.8,3.8,0,0,0,2.18,2.18,6.347,6.347,0,0,0,2.133.4c1.211.055,1.574.067,4.64.067s3.43-.012,4.641-.067a6.347,6.347,0,0,0,2.133-.4,3.8,3.8,0,0,0,2.18-2.18,6.363,6.363,0,0,0,.4-2.132c.055-1.211.067-1.574.067-4.641s-.012-3.43-.067-4.641a6.347,6.347,0,0,0-.4-2.133ZM571.9,278.8a5.9,5.9,0,1,1,5.9-5.9,5.9,5.9,0,0,1-5.9,5.9Zm6.13-10.649a1.378,1.378,0,1,1,1.378-1.378,1.378,1.378,0,0,1-1.378,1.378Zm0,0"
                                            transform="translate(453.16 5092.097)" fill="#fff"></path>
                                        <path
                                            d="M447,128a20,20,0,1,0,20,20,20,20,0,0,0-20-20Zm11.415,24.735a8.426,8.426,0,0,1-.534,2.788,5.872,5.872,0,0,1-3.359,3.359,8.432,8.432,0,0,1-2.788.534c-1.225.056-1.616.069-4.735.069s-3.51-.013-4.735-.069a8.431,8.431,0,0,1-2.787-.534,5.872,5.872,0,0,1-3.359-3.359,8.422,8.422,0,0,1-.534-2.787c-.056-1.225-.07-1.616-.07-4.735s.013-3.51.069-4.735a8.426,8.426,0,0,1,.533-2.788,5.877,5.877,0,0,1,3.359-3.359,8.433,8.433,0,0,1,2.788-.534c1.225-.056,1.616-.069,4.735-.069s3.51.013,4.735.07a8.435,8.435,0,0,1,2.788.533,5.874,5.874,0,0,1,3.359,3.359,8.425,8.425,0,0,1,.534,2.788c.056,1.225.069,1.616.069,4.735s-.013,3.51-.069,4.735Zm0,0"
                                            transform="translate(578.06 5217)" fill="#fff"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="col-4 col-sm-2 col-md-4 text-center">
                            <a class="link" href="https://www.youtube.com/user/russellhobbspolska" target="_blank"
                               rel="noopener noreferrer" aria-label="YouTube">
                                <svg xmlns="https://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                    <g transform="translate(-1086 -5345)">
                                        <path d="M-328.887,271.847l8.61-4.959-8.61-4.959Zm0,0"
                                              transform="translate(1431.296 5098.112)" fill="#fff"></path>
                                        <path
                                            d="M-533,53.89a20,20,0,0,0-20,20,20,20,0,0,0,20,20,20,20,0,0,0,20-20,20,20,0,0,0-20-20Zm12.5,20.02a33.009,33.009,0,0,1-.515,6.012,3.131,3.131,0,0,1-2.2,2.2c-1.956.515-9.779.515-9.779.515s-7.8,0-9.779-.535a3.132,3.132,0,0,1-2.2-2.2,32.868,32.868,0,0,1-.515-6.012,32.991,32.991,0,0,1,.515-6.012,3.2,3.2,0,0,1,2.2-2.224c1.956-.515,9.779-.515,9.779-.515s7.823,0,9.779.535a3.132,3.132,0,0,1,2.2,2.2,31.325,31.325,0,0,1,.515,6.032Zm0,0"
                                            transform="translate(1639 5291.11)" fill="#fff"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="col-4 col-sm-2 col-md-4 text-center text-sm-right">
                            <a class="link" href="https://www.facebook.com/RussellHobbsPolska" target="_blank"
                               rel="noopener noreferrer" aria-label="Facebook">
                                <svg xmlns="https://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                    <g transform="translate(-1166.661 -5345)">
                                        <path d="M332.519,674.558q-.331.054-.664.1.333-.045.664-.1Zm0,0"
                                              transform="translate(857.436 4710.098)" fill="#fff"></path>
                                        <path d="M340.656,673.683l-.316.055.316-.055Zm0,0"
                                              transform="translate(849.662 4710.882)" fill="#fff"></path>
                                        <path d="M319.387,676.23q-.387.044-.778.077.391-.033.778-.077Zm0,0"
                                              transform="translate(869.636 4708.598)" fill="#fff"></path>
                                        <path
                                            d="M327.818,675.628c-.124.017-.249.032-.373.047.124-.015.249-.03.373-.047Zm0,0"
                                            transform="translate(861.543 4709.138)" fill="#fff"></path>
                                        <path d="M347.943,672.3l-.279.059.279-.059Zm0,0"
                                              transform="translate(842.914 4712.122)" fill="#fff"></path>
                                        <path d="M365.709,668l-.225.063.225-.063Zm0,0"
                                              transform="translate(826.492 4715.975)" fill="#fff"></path>
                                        <path d="M360.3,669.433l-.246.064.246-.064Zm0,0"
                                              transform="translate(831.491 4714.692)" fill="#fff"></path>
                                        <path d="M353.327,671.144l-.261.058.261-.058Zm0,0"
                                              transform="translate(837.936 4713.158)" fill="#fff"></path>
                                        <path d="M314.9,676.98q-.209.017-.418.031.21-.014.418-.031Zm0,0"
                                              transform="translate(873.492 4707.926)" fill="#fff"></path>
                                        <path d="M306.721,677.32q-.413.027-.83.041.416-.014.83-.041Zm0,0"
                                              transform="translate(881.358 4707.621)" fill="#fff"></path>
                                        <path d="M301.943,677.726q-.219.007-.439.011.22,0,.439-.011Zm0,0"
                                              transform="translate(885.454 4707.257)" fill="#fff"></path>
                                        <path
                                            d="M81,185.89a20,20,0,1,0-20,20c.117,0,.234,0,.352,0V190.316h-4.3v-5.008h4.3v-3.685c0-4.274,2.609-6.6,6.421-6.6a35.355,35.355,0,0,1,3.852.2v4.466H69c-2.074,0-2.476.986-2.476,2.432v3.189H71.48l-.646,5.008H66.521v14.8A20.011,20.011,0,0,0,81,185.89Zm0,0"
                                            transform="translate(1125.661 5179.11)" fill="#fff"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>

</html>
