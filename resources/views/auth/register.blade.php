<x-frontend.layouts.front_master>

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="name">Name*</label>
                                    <input type="text" id="name" name="name" placeholder="Last name*">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="email">Email Address*</label>
                                    <input type="email" id="email" name="email" placeholder="Email address">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password" placeholder="Password">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="password_confirmation">Confirm Password *</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                </fieldset>
                                <a class="link-function left-position"  href="{{ route('login') }}"> {{ __('Already registered?') }}</a>
                                <input type="submit" class="btn btn-sign" value="Register" name="register">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->

</x-frontend.layouts.front_master>
