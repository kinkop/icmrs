 <p>{{ $response_message  }}</p>
 <form class="form-signin" action="{{ URL::to('admin/login') }}" method="post">
        <h2 class="form-signin-heading">SSRU CONFERENCE ADMINISTRATION</h2>

        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" autofocus name="username">
            <input type="password" class="form-control" placeholder="Password" name="password">

            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

        </div>



      </form>