<!-- /.row -->
<div class="row">
  <div class="col-sm-2">
     <a  href="/admin/users/create" class="btn btn-success btn-lg btn-block">Add User</a>
  </div>
    <div class="col-lg-12">

      <br/>
      @if(count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Users lists
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr class="gradeU">
                            <td>{{ $user->display_name }}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->level->name }}</td>
                            <td class="center">
                              <a href="/admin/users/{{ $user->id }}/edit">Edit</a> |
                              <a href="/admin/users/{{ $user->id }}/delete">Delete</a>
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
          <h3>User lists empty.</h3>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
