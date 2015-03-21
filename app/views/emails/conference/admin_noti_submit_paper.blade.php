<p><strong>Submit by: </strong>{{ $submitter_user->title }} {{ $submitter_user->first_name }} {{ $submitter_user->last_name }}</p>
<p><strong>Paper title: </strong>{{ $conference_paper['title']  }} <a href="{{ URL::to('')  }}" target="_blank">View full paper detail</a></p>
<p><strong>Submitted date: </strong>{{ $conference_paper['created_at'] }}</p>