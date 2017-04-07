<!-----------------------Profile Html Starts---------------------------->

<div class="row profile-bg-wrapper">
  <div class="container">
    <div class="col-sm-12 left-side-width"><img src="/assets/front/images/user-icon.png"/> <span class="user-title">{{ Auth::user()->display_name }}</span> <img src="/assets/front/images/apprentice.png"/></div>
  </div>
</div>

<div class="profile-wrapper">
  <div class="row">
      <div class="col-sm-3 left-side-width">
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
          <li class="profile-overview-bg">
            <a class="left-tab-menu" href="#"><i class="fa fa-envelope-o"></i> Profile Overview</a>
          </li>
          <li>
            <a style="color: rgb(161, 161, 161);" href="#"><i class="fa fa-certificate"></i> Contributions</a>
          </li>
          <li>
            <a style="color: rgb(161, 161, 161);" href="/profile-setting/{{ Auth::user()->id }}/edit"><i class="fa fa-certificate"></i> Setting</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-9 right-side-width">
        <div class="panel panel-default">
            <div class="row">
              <div class="container">
                  <h3 class="profile-overview-wrapper">Profile Overview <a href="/profile-setting/{{ Auth::user()->id }}/edit"><button class="profile" type="button">EDIT PROFILE</button></a> </h3>
                    <div class="row">
                      <div class="col-sm-12">
                      <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-9">
                              <p class="profile-overview-deatils"><strong>Joined:</strong> <span class="profile-overview"> {{ date('F j, Y', strtotime(Auth::user()->created_at))  }}</span>  </p>
                              <p class="profile-overview-deatils"><strong>Last Activity:</strong><span class="profile-overview"> {{ date('F j, Y', strtotime(Auth::user()->updated_at))  }}</span> </p>
                              <p><strong>Timespent:</strong><span class="profile-overview"> {{ Auth::user()->secondsToTime(strtotime(Auth::user()->created_at), strtotime(Auth::user()->updated_at)) }}</span></p>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">0</strong></h3>
                            <img src="/assets/front/images/STAR.png"/ class="icon-image">Reputation Points
                          </div>
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">0</strong></h3>
                            <img src="/assets/front/images/THUMB.png"/ class="icon-image">Votes Submitted
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">0</strong></h3>
                            <img src="/assets/front/images/token.png"/ class="icon-image">Deals Posted
                          </div>
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">{{ count(Auth::user()->comments) }}</strong></h3>
                            <img src="/assets/front/images/bubble.png"/ class="icon-image">Comments Posted
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
              </div>
            </div>
        <hr>
        <div class="row">
          <div class="container">
            <h3>Activity</h3>
            @if(count(Auth::user()->posts) > 0)
              @foreach(Auth::user()->posts as $post)
                <div class="col-sm-9">
                  <div class="profile-page-img">
                          @if($post->id % 2 == 0 )
                            <img src="/assets/front/images/icon1.png" class="profile-page-imgage"/>
                            <p class="activity-author"><strong>{{ $post->user->display_name }}</strong> started a new thread
                              <a href="/post/{{$post->id}}"><span class="trending-text"><br>{{ $post->title }}</span></a>
                            </p>
                          @else
                            <img src="/assets/front/images/icon2.png" class="profile-page-imgage"/>
                            <p class="activity-author"><strong>{{ $post->user->display_name }}</strong> replied to a thread
                              <a href="/post/{{$post->id}}">
                                  <span class="trending-text"><br>{{ $post->title }}
                                  </span>
                              </a>
                            </p>
                          @endif

                  </div>
                </div>
                <div class="col-sm-3 gap-section">
                  <i>{{ $post->calculateTime(strtoTime($post->created_at)) }} ago</i>
                </div>
              @endforeach
            @endif
              <div class="row">
                <div class="container">
                  <div class="col-sm-12">
                    <p class="Load-more-margin"><a href="#" class="Load-more">LOAD MORE</a></p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
