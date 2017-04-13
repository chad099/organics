<div class="left-page">

  @if(Auth::check() && Auth::user()->role == 0 && $deal->is_active == 0)
  <div class="row" style="margin:10px;">
    <a href="/admin/deals/{{ $deal->id }}/approve" class="see-deal">Approve Deal</a>
  </div>
  @endif
  <div class="trending-main-section">
    <div class="trending-heading"><h3 class="heading">{{ $deal->title }} <img src="/assets/front/images/best-buy.jpg"/></h3><span class="sub-heading">Written by <b>{{ $deal->user->display_name }}</b></br><i>{{ date('F j, Y', strtotime($deal->created_at )) }}</i></span></div>
  </div>

    <div class="row">
      <div class="col-sm-8">
        <div class="count-img">
           {!! $deal->message !!}
        </div>
      </div>
      <div class="col-sm-4 responsive-class">
        @if($deal->product_image)
          <img class="xbox-image" src="/assets/front/productImages/{{ $deal->product_image }}"/>
        @else
          <img class="xbox-image" src="/assets/front/images/recore.jpg"/>
        @endif
        <img class="next-image" src="/assets/front/images/next-image.png"/>
      </div>
    </div>

    </br>
    </br>
    </br>
    <div class="row responsive-class">
      <div class="col-sm-4 empty-height">
        <a href="{{ $deal->link }}" class="see-deal">SEE DEAL</a>
      </div>
      <div class="col-sm-4 empty-height">
        <span class="small-text">If you purchase something through a post on our site, Organics may get a small share of the sale.</span>
      </div>
      <div class="col-sm-4 empty-height social-buttons">

        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}">
          <img src="/assets/front/images/facbook.jpg"/>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}">
          <img src="/assets/front/images/twiter.jpg"/>
        </a>
        <a href="https://plus.google.com/share?url={{ urlencode(Request::url()) }}">
          <img src="/assets/front/images/google.jpg"/>
        </a>
        <a href="mailto:{{ env('APP_EMAIL') }}"><img src="/assets/front/images/mail.jpg"/></a>
      </div>
    </div>
    </br>
    <hr>
    </br>
    </br>
    <div id="loader" style="display:none;"></div>
    <div class="row responsive-class">

      <div class="col-sm-3 empty-height">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="vote_url" value="/deal/vote" />
        @if(Auth::check())
        <a href="javascript:void(0);" class="vote-btn" data-id = "{{ $deal->id }}" data-vote="like">
          <img class="like-image" src="/assets/front/images/like.png"/>
        </a>
        <a href="javascript:void(0);" class="vote-btn" data-id = "{{ $deal->id }}" data-vote="dislike">
          <img class="dislike-image" src="/assets/front/images/dislike-icon.jpg"/><p class="dislike">SO DISLIKE</p>
        </a>
        @else
        <a href="javascript:void(0);" class="login-required">
          <img class="like-image" src="/assets/front/images/like.png"/>
        </a>
        <a href="javascript:void(0);" class="login-required">
          <img class="dislike-image" src="/assets/front/images/dislike-icon.jpg"/><p class="dislike">SO DISLIKE</p>
        </a>
        @endif
        <!-- <div class="li-btn">
        <span class="likecou">likes(<span id="likeShow">{{ count($deal->likes) }}</span>)</span>
        <span class="likecou">dislikes(<span id="likeShow">{{ count($deal->dislikes) }}</span>)</span>
      </div> -->
        <!-- <img class="like-image" src="/assets/front/images/like.png"/>
        <img class="dislike-image" src="/assets/front/images/dislike.png"/> -->
      </div>
      <div class="col-sm-3 empty-height">
        <img src="/assets/front/images/eye.png"/><span class="small-text2">{{ $deal->views }} Views</span> </br>
        <img src="/assets/front/images/comments.jpg"/><span class="small-text2">{{ count($deal->comments) }} Comments</span>
      </div>

      <div class="col-sm-3 empty-height">
        <img src="/assets/front/images/expired-deal.png"/>
      </div>
      <div class="col-sm-3 empty-height">
        <img src="/assets/front/images/see-deal-2.png"/>
      </div>
    </div>
    </br>
    <hr>
    <span class="heading3">About the OP	</span></br></br></br></br>
    <div class="row responsive-class">
      <div class="col-sm-3 empty-height">
        @if($deal->user->profile_image)
          <img class="circle-img50" src="/assets/front/profileImages/{{ $deal->user->profile_image }}"/>
        @else
          <img src="/assets/front/images/user-icon.png"/>
        @endif

        <span class="heading4">{{ $deal->user->display_name }}</span></br>
        <span class="small-text2">{{ date('F j, Y', strtotime($deal->user->created_at)) }}</span>
      </div>
      <div class="col-sm-3 empty-height">
      {!! $deal->user->badge() !!}
      </div>
      <div class="col-sm-3 empty-height">
        <img src="/assets/front/images/STAR.png" class="icon-image"><b>0</b> Reputation Points</br>
        <img src="/assets/front/images/token.png" class="icon-image"><b>{{ count($deal->user->deals) }}</b>  Deals Posted
      </div>
      <div class="col-sm-3 empty-height">
        <img src="/assets/front/images/THUMB.png" class="icon-image"><b>0 </b> Votes Submitted</br>
        <img src="/assets/front/images/bubble.png" class="icon-image"><b>{{ $deal->user->userAllComments() }}</b> Comments Posted
      </div>
    </div>
    </br></br></br></br>
    <hr>
    <span class="heading3">{{ count($deal->comments) }} comments</span></br></br></br></br>
    @if(count($deal->comments) > 0)
      @foreach($deal->comments as $comment)
      <div class="row">
        <div class="col-sm-9">
          <p class="user-icon">
            @if($comment->user->profile_image)
              <img class="circle-img50" src="/assets/front/profileImages/{{ $comment->user->profile_image }}"/>
            @else
              <img src="/assets/front/images/user-icon.png"/>
            @endif
          </p>
          <p class="space-left"><span class="comments-user-title">{{ $comment->user->display_name }}</span><br>
          <span class="date">{{ date('F d, Y, l', strtotime($comment->created_at)) }} at {{ date('h:i:s', strtotime($comment->created_at)) }}</span><br><br>
          <span style="">{{ $comment->comment }}.</span></p>
        </div>
        <div class="col-sm-3 reply-comment-position">
          <img src="/assets/front/images/reply.png"><span class="reply-comment"><a href="javascript:void(0);">Reply to Comment</a></span>
        </div>
        <div class="row replyform">
          @if(Auth::check())
          <form class="comment-form" action="{{ url('/commentreply') }}" method="post">
            @include('errors.validation')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="post_id" value="{{ $deal->id }}">
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <textarea class="form-control" name="comment" placeholder="Comment.."></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <button href="javascript:void(0);" class="see-deal">Submit</button>
              </div>
            </div>
        </form>
        @endif
        </div>
      </div>
      <hr>
      @endforeach
    @endif
    <div class="row button-section">
      <div class="col-sm-6">
        <!-- <img src="/assets/front/images/buttons.jpg"> -->
      </div>
      <div class="col-sm-6" style="text-align: right;">
        @if(Auth::check())
          <a href="#" class="see-deal">Reply</a>
        @endif
      </div>

    </div>
    <br/><br/>
    @if(Auth::check())
    <form class="comment-form" action="{{ url('/deal/addcomment') }}" method="post">
      @include('errors.validation')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <input type="hidden" name="deal_id" value="{{ $deal->id }}">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="Comment.."></textarea>
          </div>
        </div>
        <div class="col-sm-6">
          <button href="javascript:void(0);"  id="commentButton" class="see-deal">Submit</button>
        </div>
      </div>
  </form>
  @endif
</div>
