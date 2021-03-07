
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:999999999">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login or Register</h4>
                <form action="{{ route('client.onlogin') }}" class="aa-login-form registration" method="post">
                    @csrf
                    <label for="">Username or Email address<span>*</span></label>
                    <input name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    <input name="password" type="password" placeholder="Password">
                    <button class="aa-browse-btn" type="submit">Login</button>
                    <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me
                    </label>
                    <p class="aa-lost-password"><a href="{{ route('client.forgot') }}">Lost your password?</a></p>
                    <div class="aa-register-now">
                        Don't have an account?<a href="{{route('client.registration')}}">Register now!</a>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
