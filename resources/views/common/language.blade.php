<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav ml-md-0 navbar-right">
    <!-- Authentication Links -->
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @switch(Session::get('locale'))
            @case('hu')
            <img src="{{asset('img/language/hu.png')}}" width="20px" height="14px">
            @break
            @case('de')
            <img src="{{asset('img/language/de.png')}}" width="20px" height="14px">
            @break
            @case('en')
            <img src="{{asset('img/language/en.png')}}" width="20px" height="14px">
            @break
            @default
            <img src="{{asset('img/language/en.png')}}" width="20px" height="14px">
            @endswitch
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/lang/en"><img src="{{asset('img/language/en.png')}}" width="20px" height="14px"></a>
            <a class="dropdown-item" href="/lang/de"><img src="{{asset('img/language/de.png')}}" width="20px" height="14px"></a>
            <a class="dropdown-item" href="/lang/hu"><img src="{{asset('img/language/hu.png')}}" width="20px" height="14px"></a>
        </div>
    </li>
</ul>