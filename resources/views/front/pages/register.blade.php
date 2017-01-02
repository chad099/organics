<div class="user-register">
  @include('errors.validation')
  <form action="{{ url('/register') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="text" name="name" value="NAME" class="input">
      <br>
      <input type="text" name="email" value="EMAIL" class="input">  <br><br>
      <input type="password" name="password" value="PASSWORD" class="input">  <br><br>
      <input type="password" name="password_confirmation" value="PASSWORD" class="input">  <br><br>
      <label><input id="rememberme" name="rememberme" value="remember" type="checkbox" class="remember"/> &nbsp;REMEMBER ME</label>
      <br><br>
      <input type="submit" value="LOGIN" class="form-button">
  </form>
</div>
