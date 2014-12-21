 <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3>Conferences</h3>
                          </header>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Conference Code</th>
                                  <th>Conference Name</th>
                                  <th>&nbsp;</th>
                              </tr>
                              </thead>
                              <tbody>
                                @if ($conferences)
                                    <?php $i = 1; ?>
                                    @foreach ($conferences as $conference)
                                                                    <tr>
                                                                          <td>{{ $conference->id  }}</td>
                                                                          <td>{{ $conference->code  }}</td>
                                                                          <td>{{ $conference->name  }}</td>
                                                                          <td><a href="{{ $conference->viewUrl  }}" type="button" class="btn btn-primary">Manage conference</a></td>
                                                                      </tr>
                                    <?php ++$i ?>
                                    @endforeach
                                @endif

                              </tbody>
                          </table>
                      </section>
                  </div>

              </div>