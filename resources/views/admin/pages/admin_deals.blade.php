<div class="col-lg-12">
  @if(count($deals) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Deals
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>user</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($deals as $deal)
                    <tr class="gradeU">
                        <td>{{ $deal->title }}</td>
                        <td>{{ $deal->user->display_name }}</td>
                        <td class="center">
                          @if($deal->is_active)
                            <a href="/admin/deals/{{ $deal->id }}/unapprove" onclick="return confirm('Are you sure?');">UnApprove</a>
                          @else
                            <a href="/admin/deals/{{ $deal->id }}/approve" onclick="return confirm('Are you sure?');">Approve</a>
                          @endif
                          |
                          <a href="/deal/{{ $deal->id }}">View</a>
                          |
                         <a href="/admin/deals/{{ $deal->id }}/delete" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
    @else
      <h3>Post lists empty.</h3>
    @endif
</div>
