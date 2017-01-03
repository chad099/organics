<div class="center">
  <div class="header">
    <div class="logo">
      <img src="/assets/front/images/logo.jpg">
    </div>
      <div class="nav-wrapper">
        <div class="nav">
          <ul>
            <li><a href="/">HOME</a></li>
            <li><a href="#">BLOG</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#"><img src="/assets/front/images/search.png" style="width: 15px;"></a></li>
            @if(Auth::check())
              <li><a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  LOGOUT
                  </a>
            </li>
            @endif
          </ul>
        </div>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
  </div>
</div>
