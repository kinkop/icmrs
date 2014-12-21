<header class="panel-heading">
      <h3>{{ $conference->code  }} - {{ $conference->name  }}</h3>
</header>

<div class="row">
    <div class="col-lg-12">
       <section class="panel">
                                      <header class="panel-heading">
                                         <i class="fa fa-file-o"></i> {{ $action_title  }}
                                      </header>
                                      <div class="panel-body">
                                          <div class="form">

                                              <form action="{{ URL::to('admin/conferences/manage/save-slide')  }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label for="exampleInputEmail1">Slide Link (Optional)</label>
                                                        <input type="text" class="form-control" id="link" name="link" placeholder="URL" value="{{ $link  }}">
                                                     </div>
                                                  </div>
                                                   <div class="form-group">
                                                                                                      <div class="col-sm-10">
                                                                                                          <label for="exampleInputEmail1">Image</label>
                                                                                                          @if (!empty($imageFullUrl))
                                                                                                            <p>
                                                                                                                <a href="{{ $imageFullUrl  }}" target="_blank">
                                                                                                                    <img src="{{$imageFullUrl  }}" width="150" style="border: 1px dashed #ccc;">
                                                                                                                </a>
                                                                                                            </p>
                                                                                                          @endif
                                                                                                          <input type="file" class="form-control" id="image" name="image">
                                                                                                       </div>
                                                                                                    </div>
                                                  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>&nbsp;&nbsp;
                                                  <a href="{{ $conferenceDetailUrl  }}" class="btn btn-danger">Cancel</a>
                                                  <input type="hidden" name="conference_id" value="{{ $id  }}">
                                                  <input type="hidden" name="conference_slide_id" value="{{ $conference_slide_id  }}">
                                              </form>
                                          </div>
                                      </div>
                                  </section>
    </div>
</div>