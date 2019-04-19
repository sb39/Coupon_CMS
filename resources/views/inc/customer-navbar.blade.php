<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="row col-md-12">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <?xml version="1.0" ?><svg width="24" height="24" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="filled line" id="filled_line"><path d="M28.4629,8.8848,23.1152,3.5376a5.248,5.248,0,0,0-7.4228,0L2.293,16.9365a1,1,0,0,0,0,1.4141l3.1543,3.1548a1.0292,1.0292,0,0,0,1.414,0,2.6312,2.6312,0,0,1,3.6338,0,2.5727,2.5727,0,0,1,0,3.6328,1,1,0,0,0,0,1.414l3.1543,3.1548a1,1,0,0,0,1.4141,0L28.4629,16.3081A5.2563,5.2563,0,0,0,28.4629,8.8848Z" style="fill:#61b636"/><path d="M20.86,16.0376l-1.7481-1.2363L19.14,12.66a1,1,0,0,0-1.5976-.814L15.8252,13.127l-2.0273-.688a1,1,0,0,0-1.2686,1.268l.6875,2.0279-1.28,1.7163a1.0005,1.0005,0,0,0,.8018,1.5981h.0127l2.1416-.0273L16.1279,20.77a1,1,0,0,0,1.7715-.28l.6358-2.0445,2.0449-.6357a1,1,0,0,0,.28-1.7715Z" style="fill:#eeeced"/><rect height="18.0595" style="fill:#eeeced" transform="translate(-1.3346 18.1978) rotate(-44.9988)" width="1.994" x="20.303" y="1.6802"/><path d="M28.4629,8.8848,23.1152,3.5376a5.248,5.248,0,0,0-7.4228,0l-.78.78-.0014.001L14.91,4.32,2.293,16.9365a1,1,0,0,0,0,1.4141l3.1543,3.1548a1.0292,1.0292,0,0,0,1.414,0,2.6312,2.6312,0,0,1,3.6338,0,2.5727,2.5727,0,0,1,0,3.6328,1,1,0,0,0,0,1.414l3.1543,3.1548a1,1,0,0,0,1.4141,0L28.4629,16.3081A5.2563,5.2563,0,0,0,28.4629,8.8848ZM14.3564,27.5859l-1.8183-1.8188a4.5709,4.5709,0,0,0-6.3067-6.3062L4.4141,17.6436,15.6184,6.44l9.9424,9.9424ZM27.0488,14.894l-.0739.074L17.0325,5.0256l.0739-.0739a3.3257,3.3257,0,0,1,4.5948,0l5.3476,5.3471A3.2535,3.2535,0,0,1,27.0488,14.894Z"/><path d="M20.86,16.0376l-1.7481-1.2363L19.14,12.66a1,1,0,0,0-1.5976-.814L15.8252,13.127l-2.0273-.688a1,1,0,0,0-1.2686,1.268l.6875,2.0279-1.28,1.7163a1.0005,1.0005,0,0,0,.8018,1.5981h.0127l2.1416-.0273L16.1279,20.77a1,1,0,0,0,1.7715-.28l.6358-2.0445,2.0449-.6357a1,1,0,0,0,.28-1.7715Zm-3.4209.6533a1,1,0,0,0-.6582.6582l-.1905.6113-.3691-.5224a.9993.9993,0,0,0-.8164-.4229h-.0127l-.6416.0083.3838-.5136A1.003,1.003,0,0,0,15.28,15.59l-.2061-.6064.6065.2056a.997.997,0,0,0,.9189-.1456l.5137-.3833-.0078.6407a1.0013,1.0013,0,0,0,.4228.8291l.5235.37Z"/></g></svg>
                    {{ config('app.name', 'newapp') }}
                </a>
            </ul>

            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customer.register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Customer Dashboard</a>
                            <a class="dropdown-item" href="#">At a Glance</a>  
                          <a class="dropdown-item" href="#">Create Post</a>
                          

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            </div>
        </div>
    </div>
</nav>