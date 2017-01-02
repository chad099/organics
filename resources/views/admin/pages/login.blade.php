<div class="row col-lg-6 login-left">
  <div class="admin-login">
    <h3 class="text-center">Login</h3>
    <form role="form" method="post" action="/login">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="control-label" for="inputError">Email</label>
            <input type="text" class="form-control" name="email" id="inputError">
        </div>
        <div class="form-group">
            <label class="control-label" for="inputError">Password</label>
            <input type="text" class="form-control" name="password" id="inputPassword">
        </div>
        <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
    </form>
  </div>
</div>
