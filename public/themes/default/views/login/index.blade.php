<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4" >
        <form method="post" action="{{ URL::to('login/ajax/authen') }}" id="pageLoginForm">
         {{ Theme::partial('error', array('hide' => true, 'class' => 'mainLoginFormError')) }}
         {{ Theme::partial('success', array('hide' => true, 'class' => 'mainLoginFormSuccess')) }}
            <div class="form-group">
                <input type="text" value="" maxlength="100" class="form-control" name="username" placeholder="E-mail" required>
            </div>
              <div class="form-group">
                        <input type="password" value="" maxlength="100" class="form-control" name="password" placeholder="Password" required>
                    </div>
               <div class="form-group">
                                   <input type="checkbox" name="remember" value="1" /> Remember
                               </div>
             <div>
                 <img src="{{ Theme::asset()->url('img/ajax-loader-dark.gif') }}" class="ajax-loader" /><input type="submit" class="btn btn-primary change-loading-text" value="Sign in">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ URL::to('register')  }}">Register</a>
             </div>
         </form>
    </div>
     <div class="col-md-4">

        </div>
</div>