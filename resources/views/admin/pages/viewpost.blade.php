 <div class="col-lg-8">
  <div class="row head">
    <h1>{{ $post->title }}<h1>
   </div>
   <div class="row">
     @if($post->thumbnail_image)
       <img class="admin-thumbnail-image" src="/assets/post/images/{{$post->thumbnail_image}}" style="float:left;padding-right: 14px">
     @else
      <img class="admin-thumbnail-image" src="/assets/front/images/squril.jpg" style="float:left;padding-right: 14px">
     @endif
   </div>
   <br>
   <div class="  row content">
     {!! $post->post!!}
   </div>
     <br>
     <div class="row">
       Posted by : {{ $post->user->display_name }}  on {{ date('F j, Y', strtotime($post->created_at)) }}
     </div>
     <br>
     <div class="row">
       <a href="#" data-toggle="collapse" data-target="#comments">Comments <span class="badge">{{ count( $post->comments) }}</span></a>  <a href="#">Views <span class="badge">{{  $post->views  }}</span></a>  <a href="#">Likes <span class="badge">{{ count( $post->likes) }}</span></a>
     </div>
     <br>
     <div class="row">
       <div id="comments" class="collapse">

          <ul class="list-group">
            @if(count($post->comments) >0)
              @foreach( $post->comments as $comment)
                <li class="list-group-item">Posted by, {{ ($comment->user)? $comment->user->display_name :'Unknown' }}  on {{ date('F j, Y', strtotime($comment->created_at)) }} : {{  $comment->comment  }}

                  @if(count($comment->replys) > 0)
                  <ul class="list-group">
                    @foreach( $comment->replys as $reply)
                      <li class="list-group-item">Posted by, {{ ($reply->user)? $reply->user->display_name :'Unknown' }}  on {{ date('F j, Y', strtotime($reply->created_at)) }} : {{  $reply->comment  }}

                      </li>
                    @endforeach
                  </ul>
                  @else
                   <p>No replys exists!.</p>
                 @endif

                </li>
              @endforeach
            @else
             <p>No comments found!.</p>
           @endif
           </ul>

       </div>
     </div>
</div>
