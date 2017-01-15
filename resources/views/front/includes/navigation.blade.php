<div class="center">
  <div class="header">
    <div class="logo">
      <img src="/assets/front/images/logo.jpg">
    </div>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">HOME</a></li>
              <li><a href="#">BLOG</a></li>
              <li><a href="#">CONTACT</a></li>
              <li><a href="#"><img class="search-icon" src="/assets/front/images/search.png"></a></li>
              @if(Auth::check())
              <li class="dropdown"><img class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" src="/assets/front/images/profile-menu.png">
                <span class="caret"></span></img>
                <ul class="dropdown-menu">
                  <li><a href="/profile">My Profile</a></li><br>
                  <li><a href="#">New Posts</a></li><br>
                  <li><a href="{{ url('/posts/create')}}">Write a post</a></li><br>
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
      </nav>
  </div>
</div>
