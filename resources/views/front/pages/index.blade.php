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
                <img class="count-up" src="/assets/front/images/count-up.png"><br><p class="text">{{ count($post->likes) }}</p><br><img class="count-down" src="/assets/front/images/count-down.png">
                @if($post->thumbnail_image)
                  <img class="thumbnail-image" src="/assets/post/images/{{$post->thumbnail_image}}" style="float:left;padding-right: 14px">
                @else
                 <img src="/assets/front/images/squril.jpg" style="float:left;padding-right: 14px">
                @endif
                <p style="float:left">
                    <a href="/post/{{$post->id}}"><span class="trending-text">{{ $post->title }}</span></a>
                    <span><i style="font-size: 18px;"></i></span>
                      <br>submitted at {{ date('F d, Y, l',strtotime($post->created_at)) }} by <b>{{ $post->user->display_name }}</b> <img src="/assets/front/images/comments.jpg" style="padding-left: 22px;">
                      <span style="font-size: 10px;"> {{ count($post->comments) }} <i>COMMENTS</i></span>
                </p>
              </div>
              @endforeach
             @endif
             <div class="trending-button">
                <a href="{{ $posts->previousPageUrl() }}" class="previous">Previous</a>
                <a href="{{ $posts->nextPageUrl() }}" class="next"><span>{{ $posts->currentPage() }}</span>Next</a>
            </div>

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
            @if(count($deals) > 0)
              @foreach($deals as $deal)
                <div class="deal">
                  <a href="/deal/{{ $deal->id }}">
                    <img class="img-h-146" src="/assets/front/productImages/{{ $deal->product_image }}">
                  </a>
                  <div class="deal-text">
                    <p class="website-name">{{ $deal->store_name }}</p>
                    <p class="deal-details">{{ $deal->title }}</p>
                    <p class="deal-price">
                      <span style="float: left;color:#7ab82f;font-weight: bold;">${{ $deal->price }}</span>
                      @if($deal->price_type == 'free_shipping')
                        <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span>
                      @else
                        <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> IN STORE </i></span>
                      @endif
                    </p>
                    <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg"> {{ count($deal->upVoteCounts) }}</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">{{ count($deal->comments)}}</span></p>
                  </div>
                </div>
              @endforeach
            @else
            <h3>NO FEATURED DEALS</h3>
            @endif
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
            @if(count($deals) > 0)
              @foreach($deals as $deal)
                <div class="deal">
                  <a href="/deal/{{ $deal->id }}">
                    <img class="img-h-146" src="/assets/front/productImages/{{ $deal->product_image }}">
                  </a>
                  <div class="deal-text">
                    <p class="website-name">{{ $deal->store_name }}</p>
                    <p class="deal-details">{{ $deal->title }}</p>
                    <p class="deal-price">
                      <span style="float: left;color:#7ab82f;font-weight: bold;">${{ $deal->price }}</span>
                      @if($deal->price_type == 'free_shipping')
                        <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> SHIPPING </i></span>
                      @else
                        <span style="float: right;"><i style="color: #BCBCBC;"> FREE <br> IN STORE </i></span>
                      @endif
                    </p>
                    <p class="deal-like"><span class="thumb"><img src="/assets/front/images/thumb.jpg">{{ count($deal->upVoteCounts) }}</span> <span class="chat-cloud"><img src="/assets/front/images/cloud.jpg">{{ count($deal->comments) }}</span></p>
                  </div>
                </div>
              @endforeach
            @else
              <h3>NO TRENDING DEALS EXISTS</h3>
            @endif
            @if(count($deals) > 5)
            <div style="text-align:center">
              <img src="/assets/front/images/more-details.jpg" style="padding-top: 42px;">
            </div>
            @endif
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
