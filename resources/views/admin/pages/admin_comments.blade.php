<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
      @if(count($comments) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Comment lists
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>User</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($comments as $comment)
                        <tr class="gradeU">
                            <td><a href="/admin/posts/{{ $comment->post->id }}/view"> {{ $comment->post->title }}</a></td>
                            <td>{{ ($comment->user)? $comment->user->display_name: 'Unknown' }}</td>
                            <td><a href="/admin/comments/{{ $comment->id }}">{{ substr($comment->comment, 0,100) }}</a></td>
                            @if($comment->moderate)
                              <td class="center">
                                <a href="/admin/comments/{{ $comment->id }}/approve" onclick="return confirm('Are you sure?');">Approve</a> |
                                <a href="/admin/comments/{{ $comment->id }}/delete" onclick="return confirm('Are you sure?');">Delete</a>
                              </td>
                            @else
                              <td class="center">
                                <a href="/admin/comments/{{ $comment->id }}/unapprove" onclick="return confirm('Are you sure?');">Unapprove</a> |
                                <a href="/admin/comments/{{ $comment->id }}/delete" onclick="return confirm('Are you sure?');">Delete</a>
                              </td>
                            @endif
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        @else
          <h3>Comment lists empty.</h3>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
