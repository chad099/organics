
<div class="row profile-bg-wrapper">
  <div class="container">
    <div class="col-sm-12 left-side-width">
      @if($user->profile_image)
        <img class="circle-img50" src="/assets/front/profileImages/{{ $user->profile_image }}"/>
      @else
        <img src="/assets/front/images/user-icon.png"/>
      @endif
      <span class="user-title">{{ Auth::user()->display_name }}</span>
      {!! Auth::user()->badge() !!}
    </div>
  </div>
</div>

<div class="profile-wrapper">
  <div id="loader" style="display:none;"></div>
  <div class="row">
      <div class="col-sm-3 left-side-width">
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
          <li class="">
            <a class="left-tab-menu" href="/profile"><i class="fa fa-envelope-o"></i> Profile Overview</a>
          </li>
          <li>
            <a class="left-tab-menu" href="#"><i class="fa fa-certificate"></i> Contributions</a>
          </li>
          <li class="profile-overview-bg">
            <a class="left-tab-menu" href="/profile-setting/{{ $user->id }}/edit"><i class="fa fa-certificate"></i> Setting</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-9 right-side-width">
        <div class="panel panel-default">
            <div class="row">
              <div class="container">
                  <h3 class="profile-overview-wrapper">Settings</h3>
                    <div class="row errors">
                      <div class="col-sm-12">
                        <div class="col-sm-9">
                          <p class="image-content-pro" id="open_image_upload_btn">
                            @if($user->profile_image)
                              <img class="image circle-img100" src="/assets/front/profileImages/{{ $user->profile_image }}"><br>Update New Photo
                            @else
                              <img class="image" src="/assets/front/images/user-icon.png"><br>Update New Photo
                            @endif
                          </p>
                        </div>
                        <form id="profile_image_form" style="display:none;" enctype="multipart/form-data">
                          <input type="file" name="profile_image" />
                          <input type="text" name="_token" value="{{ csrf_token() }}" />
                        </form>
                      </div>
                    </div>
              </div>
            </div>

        <div class="row">
          <div class="container">
            <div class="col-sm-6">
              <div class="profile-page-img">
                <p class="activity-author"><strong>Personal Information</strong> </p>
              </div>
            </div>
            <div class="col-sm-6">
              <strong class="lable">Username</strong><br>
                <form action="/profile-setting" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="{{ $errors->has('display_name') ? ' has-error' : '' }}">
                  <input class="personal-details" type="text" name="display_name" placeholder="Name" value="{{ $user->display_name }}">
                  @if ($errors->has('display_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('display_name') }}</strong>
                      </span>
                  @endif
                  <p class="image-content-pro1">Request username changes</p><br>
                </div>
                  <strong class="lable">E-Mail</strong><br>
                  <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input class="personal-details" type="text" name="email" placeholder="Example@gmail.com" value="{{ $user->email }}">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                  <p class="image-content-pro1">Change e-mail address</p>
                </div>
                  <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="container">
                            <hr>
            <div class="col-sm-6">
              <div class="profile-page-img">
                <p class="activity-author"><strong>Password</strong> </p>
              </div>
            </div>

            <div class="pass col-sm-6">
              <button class="password" type="button" id="reset_link_btn" >Reset Password</button>
            </div><br>
              <hr>
          </div>
        </div>
      </div>
    </div>
  </div>


  <form id="reset_link_send_form" style="display:none;" method="POST" action="{{ url('/password/email') }}">
      {{ csrf_field() }}
      <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
  </form>
</div>
