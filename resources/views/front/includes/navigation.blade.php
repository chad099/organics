<div class="center">
  <div class="header">
    <div class="logo">
      <a href="/"><img src="/assets/front/images/logo.jpg"></a>
    </div>
      <div class="nav-wrapper">
        <div class="nav">
          <ul>
            <li><a href="/">HOME</a></li>
            <li><a href="#">BLOG</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#"><img src="/assets/front/images/search.png" style="width: 15px;"></a></li>
            @if(Auth::check())
            <li class="dropdown"><img class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" src="/assets/front/images/profile-menu.png">
              <span class="caret"></span></img>
              <ul class="dropdown-menu">
                <li><a href="/profile">My Profile</a></li><br>
                <li><a href="#">New Posts</a></li><br>
                  <li>
                      <a href="{{ url('/logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                      </a>
                    </li>
              </ul>
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
