<p>You was added to "<a href="{{ $conference_url }}" target="_blank">{{ $conference_name }}</a>" conference as listener.</p>
<p>By: {{ $inviter  }}</p>

@if (!$is_already_registered)
    <p>You haven't have account, can sign up <a href="{{ $confirm_register_url }}" target="_blank">here</a></p>
@endif
