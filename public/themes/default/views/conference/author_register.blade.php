    <h2>Author registration @if ($mode == 'edit') <span style="color: orangered;">(Edit)</span> @endif</h2>

    <div>{{ $response_message  }}</div>

    <article>
        <h4>Paper Submission</h4>
        <p>
            Prospective Authors are kindly invited to submit their formatted full text papers including results, tables, figures and references. All paper submissions will be blind peer reviewed and evaluated based on originality, research content, correctness, relevance to conference, contributions, and readability.

            The submissions should be formatted using Ms Word Template or LaTeX Template
        </p>
        <form method="post" action="{{ Theme::getCurrentConferenceUrl()  }}/submit-paper" id="submitPaperForm" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Title of paper * <span class="required_field title">(Please enter a title of paper.)</span></label>
                        <input type="text" class="form-control" name="title" value="{{ $data['title']  }}" id="title">
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
                                    <label>Conference Topic * <span class="required_field conference_topic_id">(Please choose a conference topic.)</span></label>
                                   <div>

                                    @if ($conference_topics)
                                        @foreach ($conference_topics as  $conference_topic)
                                        <div>
                                            <input type="radio" class="conference_topic_parent" name="conference_topic_parent_id" data-id="{{ $conference_topic->id  }}" value="{{  $conference_topic->id }}" <?php echo ($data['conference_topic_parent_id'] == $conference_topic->id)? 'checked="checked"' : ''; ?>> {{ $conference_topic->name  }}
                                            <div class="conference_topic_wrapper conference_topic_parent_id_{{  $conference_topic->id }}" <?php echo ($data['conference_topic_parent_id'] == $conference_topic->id)? '' : 'style="display: none;"'; ?>>
                                            @if ($conference_topic->items)
                                                @foreach($conference_topic->items as $item)
                                                    <div>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="conference_topic_id" value="{{ $item->id  }}" <?php echo ($data['conference_topic_id'] == $item->id ) ? 'checked="checked"' : ''; ?> > {{ $item->name  }}
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


            <!--
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
            -->
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Type of presentation * <span class="required_field presentation_type">(Please choose a type of presentation.)</span></label>
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
                        <label>Authors * <span class="required_field authors">(Please enter authors.)</span></label>
                        <textarea  rows="10" class="form-control" name="authors" style="height: 80px;" required>{{ $data['authors'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Abstract * <span class="required_field abstract">(Please enter abstract.)</span></label>
                        <textarea rows="10" class="form-control" name="abstract" style="height: 80px;" required>{{ $data['abstract'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Keywords * <span class="required_field keywords">(Please enter keywords.)</span></label>
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
                        <label>File 1 * <span class="required_field file1">(Please attach a file.)</span><span class="required_field file1_ext">(A file type must be pdf, doc, docx, odt, rtf or txt)</span></label>
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
            <!--
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
            </div>-->
            <div class="row">
                <div class="col-md-12">
                    {{ Theme::partial('error', array('hide' => true, 'class' => 'submitPaperError')) }}
                    <input type="button" value="{{ $submit_button_text  }}" class="btn btn-primary btn-lg change-loading-text" data-loading-text="Loading..." id="submit_paper_btn">
                </div>
            </div>

            <input type="hidden" name="conference_id" value="">
            <input type="hidden" name="id" value="{{ $data['id']  }}">
            <input type="hidden" name="conference_register_id" value="{{ $data['conference_register_id']  }}">
            <input type="hidden" name="mode" id="save_mode" value="{{ $mode  }}">

        </form>
    </article>

    <a id="invite_box_btn" href="#invite_box"></a>
    <div id="invite_box" style="display: none;">
        <h3 style="text-align: center;">Add people to this conference</h3>
        <br />
        <div id="add_people_message">
             {{ Theme::partial('error', array('hide' => true, 'class' => 'addPeopleError')) }}
             {{ Theme::partial('success', array('hide' => true, 'class' => 'addPeopleSuccess')) }}
        </div>
        <table border="0" width="90%" style="margin: 0 auto;" id="add_people_container">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>E-mail</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="number">1.</td>
                    <td>
                        <input type="text" class="form-control" name="first_name">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="last_name">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="email">
                    </td>
                    <td style="text-align: right;" class="remove-people-container">
                       <a class="btn btn-info add_another_people_btn">Add another</a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center;">
                        <br />
                        <button class="btn btn-info" type="button" id="save_add_people_btn">Save and continue</button> or <button class="btn btn-danger" type="button" id="skip_add_people_btn">Skip and continue</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>