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
                                     <div style="text-align: right; padding: 10px;">
                                            <a href="{{ URL::to('admin/conferences/manage/' . $id . '/content/conference_slides/add')  }}" class="btn btn-success">+ New image</a>
                                     </div>
                                     <table class="table">
                                                                                                       <thead>
                                                                                                       <tr>
                                                                                                           <th>#</th>
                                                                                                           <th>Image</th>
                                                                                                           <th>Link</th>
                                                                                                           <th>&nbsp;</th>
                                                                                                       </tr>
                                                                                                       </thead>
                                                                                                       <tbody>

                                                                                                       @if ($slides)

                                                                                                        @foreach ($slides as $slide)

                                                                                                              <tr>
                                                                                                                    <td>{{ $slide->id  }}</td>
                                                                                                                    <td>
                                                                                                                        @if (!empty($slide->imageFullUrl))
                                                                                                                        <a href="{{ $slide->imageFullUrl  }}" target="_blank">
                                                                                                                            <img src="{{ $slide->imageFullUrl  }}" width="100" />
                                                                                                                        </a>
                                                                                                                        @else
                                                                                                                            -
                                                                                                                        @endif
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        @if (!empty($slide->link))
                                                                                                                        <a href="{{ $slide->link  }}" target="_blank">{{ $slide->link  }}</a>
                                                                                                                        @else
                                                                                                                            -
                                                                                                                        @endif
                                                                                                                    </td>
                                                                                                                    <td>

                                                                                                                        <a href="{{ $slide->editUrl  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;
                                                                                                                        <a href="javascript: if (confirm('Delete?')) { location = '{{ $slide->deleteUrl  }}' } " class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                                                                                                    </td>
                                                                                                              </tr>

                                                                                                        @endforeach

                                                                                                       @endif
                                                                                                       </tbody>
                                                                                                   </table>
                              </section>
                          </div>
                      </div>