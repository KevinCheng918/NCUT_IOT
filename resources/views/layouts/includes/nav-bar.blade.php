<nav class="navbar">
    <div class="container-p">
        <div class="navbar-home">
            <ul>
                <li>
                    <a class="nav-home" href="{{ url('/') }}">
                        <i class="fab fa-connectdevelop"></i> IOT_Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
            </ul>
            <ul class="right">
                <li>
                    <a href="javascript:void(0)" class="nav-bbtn" onclick="triggerNav()">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-menu" id="navbar-menu">
            <ul class="">
                @auth
                    <li>
                        <a href="{{ route('Channels') }}">Channels</a>
                    </li>
                @endauth
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-btn">
                        Description  <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-link" href="#">About?</a>
                        <a class="dropdown-link" href="#">About?</a>
                        <a class="dropdown-link" href="#">About?</a>
                        <a class="dropdown-link" href="#">About?</a>
                    </div>
                </li>
            </ul>

            <ul class="right">
                @auth
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout  <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('register') }}">
                            Register  <i class="fas fa-user-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">
                            Login  <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


