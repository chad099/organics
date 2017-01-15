<!-------------------------------------------------Post grid Slider ------------------------->
<div class="center">
    <div class="post-slider">
      <div class="row">
          <div class="col-sm-6 post-pic-left" style="">
                <img class="img-responsive" src="assets/front/images/big-post-new.jpg">
          </div>
          <div class="col-sm-6 post-pic-right" style="">
              <img class="img-responsive" src="/assets/front/images/small-post-1.jpg" style="margin-bottom: 5px;">
              <img class="img-responsive" src="/assets/front/images/small-post-2.jpg">
          </div>
        </div>
    </div>
    <center><img src="/assets/front/images/dots.jpg"></center>
</div>

  <!-------------------------------------------------TRENDING AROUND THE WEB ------------------------->
<div class="center">
   <div class="row">
     <div class="col-sm-8">
       <div class=""><div>
         <div class="">
           <div class="left-page">

             <div class="trending-main-section">
               <div class="trending-img1"><img src="/assets/front/images/trending-icon.jpg"></div>
               <div class="trending-heading"><h1>TRENDING AROUND THE WEB</h1> </div>
             </div>
             @if(count($posts) > 0)
              @foreach($posts as $post)
              <div class="count-img">
                <img src="/assets/front/images/count.jpg" style="float:left;padding-right: 14px;">
                @if($post->thumbnail_image)
                  <img class="thumbnail-image" src="/assets/post/images/{{$post->thumbnail_image}}" style="float:left;padding-right: 14px">
                @else
                 <img src="/assets/front/images/squril.jpg" style="float:left;padding-right: 14px">
                @endif
                <p style="float:left">
                    <a href="/post/{{$post->id}}"><span class="trending-text">{{ $post->title}}</span></a>
                    <span><i style="font-size: 18px;"></i></span>
                      <br>submitted at {{ date('F d, Y, l',strtotime($post->created_at)) }} by <b>{{ $post->user->display_name }}</b> <img src="/assets/front/images/comments.jpg" style="padding-left: 22px;">
                      <span style="font-size: 10px;"> {{ count($post->comments) }} <i>COMMENTS</i></span>
                </p>
              </div>
              @endforeach
             @endif

          <div class="trending-button"><img src="/assets/front/images/buttons.jpg"></div>

      </div>
    </div>

    <!-------------------------------------------------FEATURED DEALS ------------------------->
    <div class="">
      <div class="left-page">
        <div class="featured-deals-section">
          <div class="trending-img1"><img src="/assets/front/images/trending-icon.jpg"></div>
          <div class="trending-heading"><h1>FEATURED DEALS</h1> </div>
        </div>
          <div class="featured-deals">
            <div class="deal">
              <img src="/assets/front/images/adorama.jpg">
              <div class="deal-text"><p class="website-name"> Adorama</p>
                <p class="deal-details">Nikon D610 24.2 MP<br>
                DIgital SLR Camera </p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$450</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>
              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img5.jpg">
              <div class="deal-text"><p class="website-name"> Dorcousa.com</p>
                <p class="deal-details">Dorco Pace Power<br>
                Men's Razor</p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$13.65</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img2.jpg">
              <div class="deal-text"><p class="website-name"> Walmart.com</p>
                <p class="deal-details">Protectr Silex Stainles<br>
                Steel Electric Kettle</p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$18.25</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img3.jpg">
              <div class="deal-text"><p class="website-name"> Walmart.com</p>
                <p class="deal-details">COD: Infinite Walfare<br>
                Jackal Assault </p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$50</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img4.jpg">
              <div class="deal-text"><p class="website-name"> Eddir Bauer</p>
                <p class="deal-details">Eddie Bauer Cirruslite<br>
                Women's Down Parka </p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$450</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>


          </div>

      </div>
    </div>
    <!-------------------------------------------------TRENDING DEALS ------------------------->
    <div class="" style="padding-top:40px;">
      <div class="left-page">
        <div class="featured-deals-section">
          <div class="trending-img1"><img src="/assets/front/images/trending-icon.jpg"></div>
          <div class="trending-heading"><h1>TRENDING DEALS</h1> </div>
        </div>
          <div class="featured-deals">
            <div class="deal">
              <img src="/assets/front/images/adorama.jpg">
              <div class="deal-text"><p class="website-name"> Adorama</p>
                <p class="deal-details">Nikon D610 24.2 MP<br>
                DIgital SLR Camera </p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$450</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img5.jpg">
              <div class="deal-text"><p class="website-name"> Dorcousa.com</p>
                <p class="deal-details">Dorco Pace Power<br>
                Men's Razor</p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$13.65</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img2.jpg">
              <div class="deal-text"><p class="website-name"> Walmart.com</p>
                <p class="deal-details">Protectr Silex Stainles<br>
                Steel Electric Kettle</p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$18.25</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img3.jpg">
              <div class="deal-text"><p class="website-name"> Walmart.com</p>
                <p class="deal-details">COD: Infinite Walfare<br>
                Jackal Assault </p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$50</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div class="deal">
              <img src="/assets/front/images/deal-img4.jpg">
              <div class="deal-text"><p class="website-name"> Eddir Bauer</p>
                <p class="deal-details">Eddie Bauer Cirruslite<br>
                Women's Down Parka </p>
                <p class="deal-price"><span style="float: left;color:#7ab82f;font-weight: bold;">$450</span> <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span></p>
                <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">22</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">12</span></p>

              </div>
            </div>
            <div style="text-align:center"><img src="/assets/front/images/more-details.jpg" style="padding-top: 42px;"></div>

          </div>
      </div>
    </div>
  </div>
  </div>
</div>

  <!-------------------------------------------------RIGHT SIDEBAR --------------------------------->
  <div class="col-sm-4">
    @include('front.includes.right_sidebar')
  </div>
  </div>
</div>
