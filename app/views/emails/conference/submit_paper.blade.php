<p>Thank you for your paper submission.</p>
<p>&nbsp;</p>
<h2>{{ $code  }} {{ $name  }}</h2>
<p><a href="{{ $frontEndViewUrl  }}">Click here to go to this conference</a></p>
<img src="{{ $imageFullUrl  }}" width="450" />
<p><strong>Date</strong> : {{ $conference_date  }}</p>
<p><strong>Location</strong> : {{ $location  }}</p>
<p><strong>Venue</strong> : {{ $venue_short_information  }}</p>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<h2>Paper Details</h2>
<p><strong>Paper Code</strong>: {{ $paper_code  }}</p>
<p><strong>Paper Title </strong>: {{ $paper_title  }}</p>
<p><strong>Conference Link</strong>: <a href="{{ $frontEndViewUrl }}">{{ $url_slug  }}</a></p>
<p><strong>Invitation Letter</strong>: -</p>
<p><strong>Files</strong>:
    @if (!empty($file1FullUrl))
        <a href="{{ $file1FullUrl  }}">File 1</a>&nbsp;&nbsp;&nbsp;&nbsp;
    @endif
    @if (!empty($file2FullUrl))
        <a href="{{ $file2FullUrl  }}">File 2</a>&nbsp;&nbsp;&nbsp;&nbsp;
    @endif
    @if (!empty($file3FullUrl))
        <a href="{{ $file3FullUrl  }}">File 3</a>&nbsp;&nbsp;&nbsp;&nbsp;
    @endif
</p>
<p><strong>Paper Type</strong>: {{ $paper_type_text }}</p>
<p><strong>Paper Presentation</strong>: {{ $presentation_type_text }}</p>
<p><strong>Paper Publication</strong>: -</p>
<p><strong>Review Process</strong>: -</p>
<p><strong>Paper Acceptance</strong>: -</p>
<p><strong>Blind Pape</strong>: -</p>
<p><a href="{{  $frontEndViewUrl }}/submit_paper">Edit paper</a></p>