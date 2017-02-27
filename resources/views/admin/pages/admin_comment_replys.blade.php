<div class="col-lg-8">
 <div class="row head">
   <h3>{{ $comment->comment }}<h3>
  </div>
   <br>
   <div>
     <ul class="list-group">
       @if(count($comment->replys) > 0)
          @foreach($comment->replys as $reply)
           <li class="list-group-item">{{ $reply->comment }} <span class="replys_action">
             @if($reply->moderate) <a href="/admin/reply/{{ $reply->id }}/approve" onclick="return confirm('Are you sure?');">Approve</a>@else <a href="/admin/reply/{{ $reply->id }}/unapprove" onclick="return confirm('Are you sure?');">Unapprove</a> @endif |
             <a href="/admin/reply/{{ $reply->id }}/delete" onclick="return confirm('Are you sure?');">Delete</a></span>
         </li>
          @endforeach
        @else
        <p>No replys for this comment.</p>  
      @endif
      </ul>

   </div>
</div>
