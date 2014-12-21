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

                                          <form action="{{ URL::to('admin/conferences/manage/' . $id . '/content/' . $type . '/save')  }}" method="post" class="form-horizontal">
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                      <textarea class="form-control ckeditor" name="content" rows="6" cols="20">
                                                        {{ $content  }}
                                                      </textarea>
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