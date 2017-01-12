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
        </ul>
      </div>
      <div class="col-sm-9 right-side-width">
        <div class="panel panel-default">
            <div class="row">
              <div class="container">
                  <h3 class="profile-overview-wrapper">Profile Overview</h3>
                    <div class="row">
                      <div class="col-sm-12">
                      <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-9">
                              <p class="profile-overview-deatils"><strong>Joined:</strong> <span class="profile-overview"> {{ date('F j, Y', strtotime(Auth::user()->created_at))  }}</span>  </p>
                              <p class="profile-overview-deatils"><strong>Last Activity:</strong><span class="profile-overview"> {{ date('F j, Y', strtotime(Auth::user()->updated_at))  }}</span> </p>
                              <p><strong>Timespent:</strong><span class="profile-overview"> 2w 2d 18h 11m</span></p>
                            </div>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">802</strong></h3>
                            <img src="/assets/front/images/STAR.png"/ class="icon-image">Reputation Points
                          </div>
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">207</strong></h3>
                            <img src="/assets/front/images/thumb.png"/ class="icon-image">Votes Submitted
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">79</strong></h3>
                            <img src="/assets/front/images/token.png"/ class="icon-image">Deals Posted
                          </div>
                          <div class="col-sm-6 count-wrapper">
                            <h3 class="no-margin"><strong class="profile-count">335</strong></h3>
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
            <div class="col-sm-9">
              <div class="profile-page-img">
                      <img src="/assets/front/images/icon1.png" class="profile-page-imgage">
                      <p class="activity-author"><strong>swacker19</strong> started a new thread<span class="trending-text"><br>18- Poence Glasslock Oven Safe Food Storage Set %26 </span></p>
              </div>
            </div>
            <div class="col-sm-3 gap-section">
              <i>2 hours ago</i>
            </div>
            <div class="col-sm-9">
              <div class="profile-page-img">
                      <img src="/assets/front/images/icon2.png" class="profile-page-imgage">
                      <p class="activity-author"><strong>swacker19</strong> replied to a thread<span class="trending-text"><br>Key Bank $300 Checking Bonus w/$500 Direct Deposit 'Select States' </span></p>
              </div>
            </div>
            <div class="col-sm-3 gap-section">
              <i>3 hours ago</i>
            </div>
            <div class="col-sm-9">
              <div class="profile-page-img">
                      <img src="/assets/front/images/icon3.png" class="profile-page-imgage">
                      <p class="activity-author"><strong>swacker19</strong> started a new thread<span class="trending-text"><br>NEW: Bank of America Cash Rewards $200 Cash Signup Bonus</span></p>
              </div>
            </div>
            <div class="col-sm-3 gap-section">
              <i>2 hours ago</i>
            </div>
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
