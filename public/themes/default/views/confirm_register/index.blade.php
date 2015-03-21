<form method="post" action="{{ URL::to('confirm_register') }}" id="submitPaperForm">
    {{ $response_message }}
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <label>Your email:</label>
                <input type="email" class="form-control" name="email" value="{{ $email }}" id="email" readonly required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" value="" id="password" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <label>Confirm Password:</label>
                <input type="password" class="form-control" name="confirm_password" value="" id="confirm_password" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Theme::partial('error', array('hide' => true, 'class' => 'submitPaperError')) }}
            <input type="submit" value="Submit" class="btn btn-primary btn-lg change-loading-text" data-loading-text="Loading..." id="submit_paper_btn">
        </div>
    </div>
    <input type="hidden" name="token" value="{{ $token }}">
</form>