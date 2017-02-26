
<div class="col-lg-6">
  <form role="form" action="/admin/users" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <div class="form-group">
          <label>firstName</label>
          <input class="form-control" name="first_name" value="{{ old('first_name') }}">
      </div>
      <div class="form-group">
          <label>lastName</label>
          <input class="form-control" name="last_name" value="{{ old('last_name')}}">
      </div>
      <div class="form-group">
          <label>displayName</label>
          <input class="form-control" name="display_name" value="{{ old('display_name')}}">
      </div>
      <div class="form-group">
          <label>Email</label>
          <input class="form-control" name="email" value="{{ old('email')}}">
      </div>
      <div class="form-group">
          <label>Role</label>
          <select class="form-control" name="role">
              @foreach($roles as $role)
                <option value="{{ $role->value }}" >{{ $role->name }}</option>
              @endforeach
          </select>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
