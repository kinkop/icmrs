{{ $response_message  }}
<h3>{{ $title  }}</h3>

{{ $content  }}

@if (!$is_registered)
<div style="margin-top: 20px; text-align: center;">
    <form method="post" action="{{ URL::to('conference/confirm-listener-register')  }}">
        <button type="submit" class="btn btn-primary">Confirm Listener Register</button>
        <input type="hidden" name="confirm" value="1">
        <input type="hidden" name="conference_id" value="{{ $conference_id  }}">
    </form>
</div>
@endif