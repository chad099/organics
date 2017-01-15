<div class="right">
  <p><img src="/assets/front/images/language.jpg"> </p>
    <form action="/login" method="post">
        @include('errors.validation')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="email" placeholder="USERNAME" class="name">
        <br>
        <input type="password" name="password" placeholder="PASSWORD" class="pwd">  <br><br>
        <label><input id="rememberme" name="rememberme" value="remember" type="checkbox" class="remember"/> &nbsp;REMEMBER ME</label>
        <br><br>
        <input type="submit" value="LOGIN" class="form-button">
    </form>

      <p><img src="/assets/front/images/ad.jpg"/ style="margin-top:64px;"></p>
      <p class="join-button"><a href="/register">WANT TO JOIN? SIGN UP</a> </p>
      <p><img src="/assets/front/images/ad.jpg"/ style="margin-top:64px;"></p>
      <p><img src="/assets/front/images/article.jpg"/ style="margin-top:64px;"></p>
      <p><img src="/assets/front/images/coupan.jpg"/ style="margin-top:64px;"></p>
      <p style="font-size: 10px;text-align: center;">Terms of Service&nbsp;&nbsp;&nbsp;Site Map&nbsp;&nbsp;&nbsp;    Contact &nbsp;&nbsp;&nbsp;   Privacy Policy</p>
      <p style="text-align: center;font-size: 13px;margin-top: 7px;color: rgb(152, 152, 152);">&#9400; COPYRIGHT ORGANICS.ORG</p>
</div>
