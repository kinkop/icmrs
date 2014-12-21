    <h2>Author registration</h2>

    <div>{{ $response_message  }}</div>

    <article>
        <h4>Paper Submission @if ($mode == 'edit') (Edit) @endif</h4>
        <p>
            Prospective Authors are kindly invited to submit their formatted full text papers including results, tables, figures and references. All paper submissions will be blind peer reviewed and evaluated based on originality, research content, correctness, relevance to conference, contributions, and readability.

            The submissions should be formatted using Ms Word Template or LaTeX Template
        </p>
        <form method="post" action="{{ Theme::getCurrentConferenceUrl()  }}/submit-paper" id="submitPaperForm" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Title of paper *</label>
                        <input type="text" class="form-control" name="title" value="{{ $data['title']  }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Conference</label>
                        <p>{{ $conference->code  }} {{ $conference->name  }}</p>
                    </div>
                </div>
            </div>
             <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Conference Topic *</label>
                                   <div>

                                    @if ($conference_topics)
                                        @foreach ($conference_topics as  $conference_topic)
                                        <div>
                                            <input type="radio" class="conference_topic_parent" name="conference_topic_parent_id" data-id="{{ $conference_topic->id  }}" value="{{  $conference_topic->id }}" <?php echo ($data['conference_topic_parent_id'] == $conference_topic->id)? 'checked="checked"' : ''; ?> required> {{ $conference_topic->name  }}
                                            <div class="conference_topic_wrapper conference_topic_parent_id_{{  $conference_topic->id }}" <?php echo ($data['conference_topic_parent_id'] == $conference_topic->id)? '' : 'style="display: none;"'; ?>>
                                            @if ($conference_topic->items)
                                                @foreach($conference_topic->items as $item)
                                                    <div>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="conference_topic_id" value="{{ $item->id  }}" <?php echo ($data['conference_topic_id'] == $item->id ) ? 'checked="checked"' : ''; ?> required> {{ $item->name  }}
                                                    </div>
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                   </div>
                                </div>
                            </div>
                        </div>


            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Paper type *</label>
                        <p>
                            @if ($conference_types)
                                @foreach ($conference_types as $key => $val)
                                <input type="radio" name="paper_type" value="{{ $key }}" required <?php echo ($data['paper_type'] == $key) ? 'checked="checked"' : ''; ?>> {{ $val  }}&nbsp;
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Type of presentation *</label>
                        <p>
                            @if ($conference_presentation_types)
                                @foreach ($conference_presentation_types as $key => $val)
                                <input type="radio" name="presentation_type" value="{{ $key }}" required <?php echo ($data['presentation_type'] == $key) ? 'checked="checked"' : ''; ?>> {{ $val  }}&nbsp;
                                @endforeach
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Authors *</label>
                        <textarea  rows="10" class="form-control" name="authors" style="height: 80px;" required>{{ $data['authors'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Abstract *</label>
                        <textarea rows="10" class="form-control" name="abstract" style="height: 80px;" required>{{ $data['abstract'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Keywords *</label>
                        <textarea  rows="10" class="form-control" name="keywords" style="height: 80px;" required>{{ $data['keywords'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>References (Optional)</label>
                        <textarea  rows="10" class="form-control" name="refs" style="height: 80px;">{{ $data['refs'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Note (Optional)</label>
                        <textarea rows="10" class="form-control" name="note" style="height: 80px;" >{{ $data['note'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>File 1 *</label>
                        <p>
                            @if (!empty($data['file1_url']))
                                <a href="{{ $data['file1_url'] }}" target="_blank">View uploaded file</a>
                            @endif
                            <input type="file" name="file1" <?php echo ($data['required_file1'] == true)? 'required' : ''; ?>>
                            <br />
                            File is intented mainly docx for MS-Word users, pdf for LaTex users. Only pdf, doc, docx, odt, rtf, txt files are accepted.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>File 2 (Optional)</label>
                        <p>
                         @if (!empty($data['file2_url']))
                            <a href="{{ $data['file2_url'] }}" target="_blank">View uploaded file</a>
                         @endif
                            <input type="file" name="file2">
                            <br />
                            MS-Word users can also upload the pdf version of the paper.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>File Blind * for blind review </label>
                        <p>
                            @if (!empty($data['file3_url']))
                                <a href="{{ $data['file3_url'] }}" target="_blank">View uploaded file</a>
                            @endif
                            <input type="file" name="file3">
                            <br />
                            All author related text removed and no affilation version of your paper. Which will be sent to reviewers.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" value="{{ $submit_button_text  }}" class="btn btn-primary btn-lg" data-loading-text="Loading...">
                </div>
            </div>

            <input type="hidden" name="conference_id" value="">
            <input type="hidden" name="id" value="{{ $data['id']  }}">
            <input type="hidden" name="conference_register_id" value="{{ $data['conference_register_id']  }}">
        </form>
    </article>