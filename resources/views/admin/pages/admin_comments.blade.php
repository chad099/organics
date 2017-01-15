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
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->user->display_name }}</td>
                            <td>{{ substr($comment->comment, 100) }}</td>
                            @if($comment->moderate)
                              <td class="center"><a href="/admin/comments/{{ $comment->id }}/approve">Approve</a></td>
                            @else
                              <td class="center"><a href="/admin/comments/{{ $comment->id }}/unapprove">Unapprove</a></td>
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
