<br />
<div class="col-lg-6">
  <form role="form" action="/admin/users" method="post">
    <input type="hidden" name="id" value="{{ $user->id }}"/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <div class="form-group">
          <label>firstName</label>
          <input class="form-control" name="first_name" value="{{ $user->first_name }}">
      </div>
      <div class="form-group">
          <label>lastName</label>
          <input class="form-control" name="last_name" value="{{ $user->last_name}}">
      </div>
      <div class="form-group">
          <label>displayName</label>
          <input class="form-control" name="display_name" value="{{ $user->display_name}}">
      </div>
      <div class="form-group">
          <label>Email</label>
          <input class="form-control" readonly="" value="{{ $user->email}}">
      </div>
      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role">
              @foreach($roles as $role)
                <option value="{{ $role->value }}" @if($user->role == $role->value) selected @endif>{{ $role->name }}</option>
              @endforeach
          </select>
      </div>

      <div class="checkbox">
         <label><input type="checkbox" name="is_blocked" @if($user->is_blocked) checked @endif >Blocked</label>
      </div>

      <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
