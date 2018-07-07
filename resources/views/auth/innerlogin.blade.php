  <style type="text/css">
    .backimage {
       background-image: url("{{ asset('loginV1/images/bg-01.jpg') }}") 
      
    }
  </style>
  <div class="limiter">
    <div class="container-login100 backimage">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
          <form class="login100-form validate-form" role="form" method="POST" action="{{ url('/login') }}">
                      {{ csrf_field() }}
                      <span class="login100-form-title p-b-49">
                       <small class="focus-input10">Login</small> <strong style="color:red">Health .</strong><small class="focus-input10">so</small>
                      </span>

                      <div class="wrap-input100 validate-input m-b-23 {{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "email is reauired">
                      @if ($errors->has('email'))
                                                <span class="help-block danger-alert" style="color: red">
                                                   {{ $errors->first('email') }}
                                                </span>
                                            @endif
                        <input class="input100" type="email" name="email" placeholder="Type your email">
                        <span class="focus-input100 large" data-symbol="&#xf206;"></span>
                         
                      </div>
                        
                      <div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Password is required">
                       
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                         
                      </div>
                       @if ($errors->has('password'))
                                                <span class="help-block">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                      <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                          Forgot password?
                        </a>
                      </div>
                      
                      <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                          <div class="login100-form-bgbtn"></div>
                          <button class="login100-form-btn" type="submit">
                            Login
                          </button>
                        </div>
                      </div>

                      <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                          Or Sign Up Using
                        </span>
                      </div>

                      <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                          <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                          <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                          <i class="fa fa-google"></i>
                        </a>
                      </div>

                      <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                          Or Sign Up Using
                        </span>

                        <a href="#" class="txt2">
                          Sign Up
                        </a>
                      </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>


























