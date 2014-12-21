 <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3>Contents</h3>
                          </header>
                          <div>
                            {{ $response_message  }}
                          </div>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Page</th>
                                  <th>&nbsp;</th>
                              </tr>
                              </thead>
                              <tbody>

                                    <tr>
                                        <td>1.</td>
                                        <td>
                                            Contact
                                        </td>
                                        <td>
                                             <a href="{{ URL::to('admin/contents/edit/contact')  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>

                              </tbody>
                          </table>
                      </section>
                  </div>

              </div>