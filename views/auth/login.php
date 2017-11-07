<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="/api/login" role="form" class="form-signin">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email"
                                   autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password">
                        </div>
                        <!--<div class="checkbox">
                            <label>
                                <input name="remember" id="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        -->
                        <button type="submit" id="submit-login-form" class="btn btn-lg btn-success btn-block">Login
                        </button>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

