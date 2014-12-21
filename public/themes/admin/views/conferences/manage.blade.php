<header class="panel-heading" style="margin-top: 0; padding-top: 0;">
      <h3>{{ $conference->code  }} - {{ $conference->name  }}</h3>
</header>
<div class="row">
    <div class="col-lg-12">

    <section class="panel">
    {{ $response_message  }}
                              <div class="panel-body">
                                  <form role="form" method="post" action="{{ URL::to('admin/conferences/save')  }}" enctype="multipart/form-data">
                                  <div class="form-group">
                                                                            <label for="exampleInputEmail1">Conference Page URL</label>
                                                                            <input type="text" class="form-control"  placeholder="Conference Code" name="url_slug" value="{{ $conference->url_slug  }}">
                                                                        </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Conference Code</label>
                                          <input type="text" class="form-control"  placeholder="Conference Code" name="code" value="{{ $conference->code  }}">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputPassword1">Conference Name</label>
                                          <input type="text" class="form-control"  placeholder="Conference Name" name="name" value="{{ $conference->name  }}">
                                      </div>
                                      <div class="form-group">
                                                                                <label for="exampleInputPassword1">Conference Date</label>
                                                                                <input type="text" class="form-control"  placeholder="Conference Date" name="conference_date" value="{{ $conference->conference_date  }}">
                                                                            </div>
                                        <div class="form-group">
                                                                                                                      <label for="exampleInputPassword1">Conference Location</label>
                                                                                                                      <input type="text" class="form-control"  placeholder="Conference Location" name="location" value="{{ $conference->location  }}">
                                                                                                                  </div>
                                      <div class="form-group">
                                                                                <label for="exampleInputPassword1">Conference Image</label>
                                                                                @if (!empty($conference->imageFullUrl))
                                                                                <p>
                                                                                    <a href="{{ $conference->imageFullUrl }}" target="_blank">
                                                                                        <img src="{{ $conference->imageFullUrl }}" width="200" />
                                                                                    </a>
                                                                                </p>
                                                                                @endif
                                                                                <input type="file" name="conference_image" class="form-control">
                                                                            </div>
                                       <div class="form-group">
                                                                                <label for="exampleInputPassword1">Conference Information</label>
                                                                                <textarea class="form-control ckeditor" name="information">{{ $conferenceDetail['information']  }}</textarea>
                                                                            </div>
                                      <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                                      <input type="hidden" name="conference_id" value="{{ $conference->id  }}">
                                  </form>

                              </div>
                          </section>
    </div>
</div>

<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Conference Pages
                          </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Page Name</th>
                                  <th>&nbsp;</th>
                              </tr>
                              </thead>
                              <tbody>


                                  <tr>
                                                                                                                                                                                             <td>1</td>
                                                                                                                                                                                             <td>Conference Slides</td>
                                                                                                                                                                                             <td><a href="{{ $conference_url . '/content/conference_slides'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                                                                                                                                             </tr>

                              <tr>
                                  <td>2</td>
                                  <td>Objectives</td>
                                  <td><a href="{{ $conference_url . '/content/objectives'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                              </tr>

                               <tr>
                                                                <td>3</td>
                                                                <td>Important Dates</td>
                                                                <td><a href="{{ $conference_url . '/content/important_dates'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                </tr>


                               <tr>
                                                                <td>4</td>
                                                                <td>Call For Papers</td>
                                                                <td><a href="{{ $conference_url . '/content/call_for_papers'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                </tr>

                               <tr>
                                                                                               <td>5</td>
                                                                                               <td>Organization</td>
                                                                                               <td><a href="{{ $conference_url . '/content/organization'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                                               </tr>

                               <tr>
                                                                                                                               <td>6</td>
                                                                                                                               <td>Committee</td>
                                                                                                                               <td><a href="{{ $conference_url . '/content/committees'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                                                                               </tr>
                                  <tr>
                                                                                                                                                              <td>7</td>
                                                                                                                                                              <td>Key Notes</td>
                                                                                                                                                              <td><a href="{{ $conference_url . '/content/key_notes'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                                                                                                              </tr>
                               <tr>
                                                                                                                                                              <td>8</td>
                                                                                                                                                              <td>Venue</td>
                                                                                                                                                              <td><a href="{{ $conference_url . '/content/venue_information'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                                                                                                              </tr>
                                <tr>
                                                                                                                                                                                             <td>9</td>
                                                                                                                                                                                             <td>Registration Fees</td>
                                                                                                                                                                                             <td><a href="{{ $conference_url . '/content/fees'  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></td>
                                                                                                                                                             </tr>

                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>