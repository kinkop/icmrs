<header class="panel-heading">
      <h3>{{ $conference->code  }} - {{ $conference->name  }}</h3>
</header>

<div class="row">
                          <div class="col-lg-12">
                            {{ $response_message  }}
                              <section class="panel">
                                  <header class="panel-heading">
                                     <i class="fa fa-file-o"></i> {{ $page_name  }}
                                  </header>
                                  <div class="panel-body">
                                      <div class="form">

                                          <form action="{{ URL::to('admin/conferences/manage/' . $id . '/content/' . $type . '/save-venue')  }}" method="post" class="form-horizontal">
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <label>Short information</label>
                                                      <textarea class="form-control" name="venue_short_information" rows="2" cols="20">{{ $conferenceDetail['venue_short_information']  }}</textarea>
                                                  </div>
                                              </div>
                                               <div class="form-group">
                                                                                                <div class="col-sm-10">
                                                                                                    <label>Full information</label>
                                                                                                    <textarea class="form-control ckeditor" name="venue_information" rows="10" cols="20" >{{ $conferenceDetail['venue_information']  }}</textarea>
                                                                                                </div>
                                                                                            </div>
                                               <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Map</label><br />
                                                        Latitude: <input type="text" name="lat" value="{{ $conferenceDetail['venue_lat']  }}"> Longitude: <input type="text" name="lng" value="{{ $conferenceDetail['venue_lng']  }}">
                                                    </div>
                                               </div>
                                              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>&nbsp;&nbsp;
                                              <a href="{{ $conferenceDetailUrl  }}" class="btn btn-danger">Cancel</a>
                                          </form>
                                      </div>
                                  </div>
                              </section>
                          </div>
                      </div>