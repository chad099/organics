
<div class="row profile-bg-wrapper">
  <div class="container">
    <div class="col-sm-12 left-side-width"><img src="/assets/front/images/user-icon.png"/> <span class="user-title">{{ Auth::user()->display_name }}</span> <img src="/assets/front/images/apprentice.png"/></div>
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
              <div class="col-sm-3">
                <div class="profile-page-img">
                  <p class="activity-author"><strong>Change Password</strong> </p>
                </div>
              </div>
              <div class="col-sm-6">
                  <form action="/profile-setting/changepassword" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                      <input type="password" class="form-control"  id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                      @if ($errors->has('confirm_password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('confirm_password') }}</strong>
                          </span>
                      @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
              </div>
            </div>
          </div>


<!--
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
        </div> -->
      </div>
    </div>
  </div>

</div>
