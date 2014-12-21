<header class="panel-heading">
      <h3>{{ $title  }}</h3>
</header>

<div class="row">
                          <div class="col-lg-12">
                            {{ $response_message  }}
                              <section class="panel">
                                  <div class="panel-body">
                                      <div class="form">

                                          <form action="{{ URL::to('admin/contents/save') }}" method="post" class="form-horizontal">
                                              <div class="form-group">
                                                  <div class="col-sm-10">
                                                                                  <textarea class="form-control ckeditor" name="content" rows="6" cols="20">
                                                                                    {{ $content  }}
                                                                                  </textarea>
                                                                              </div>
                                                                          </div>
                                                                          <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>&nbsp;&nbsp;
                                                                          <a href="{{ URL::to('admin/contents') }}" class="btn btn-danger">Cancel</a>
                                                                          <input type="hidden" name="alias" value="{{ $alias  }}">
                                                                      </form>
                                                                  </div>
                                                              </div>
                                                          </section>
                                                      </div>
                                                  </div>