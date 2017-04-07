<div class="row profile-bg-wrapper">
  <div class="container">
    <div class="col-sm-12 left-side-width"><img src="/assets/front/images/user-icon.png"/> <span class="user-title">{{ Auth::user()->display_name }}</span> <img src="/assets/front/images/apprentice.png"/></div>
  </div>
</div>

<div class="profile-wrapper">
  <div class="row">
      <div class="col-sm-3 left-side-width">
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
          <li class="">
            <a class="left-tab-menu" href="#"><i class="fa fa-envelope-o"></i> Profile Overview</a>
          </li>
          <li>
            <a class="left-tab-menu" href="#"><i class="fa fa-certificate"></i> Contributions</a>
          </li>
          <li class="profile-overview-bg">
            <a class="left-tab-menu" href="#"><i class="fa fa-certificate"></i> Setting</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-9 right-side-width">
        <div class="panel panel-default">
            <div class="row">
              <div class="container">
                  <h3 class="profile-overview-wrapper">Settings</h3>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="col-sm-9">
                          <p class="image-content-pro" id="open_image_upload_btn">
                            @if($user->profile_image)
                              <img class="image" src="/assets/front/profileImages/{{ $user->profile_image }}"><br>Update New Photo
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
                  <input class="personal-details" type="text" name="firstname" placeholder="Name" value="{{ $user->display_name }}">
                  <p class="image-content-pro1">Request username changes</p><br>
                  <strong class="lable">E-Mail</strong><br>
                  <input class="personal-details" type="text" name="firstname" placeholder="Example@gmail.com" value="{{ $user->email }}">
                  <p class="image-content-pro1">Change e-mail address</p>
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
               <button class="password" type="button">Reset Password</button>
            </div><br>
              <hr>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
