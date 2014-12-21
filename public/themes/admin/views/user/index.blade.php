 <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3>Users</h3>
                          </header>

                          <p style="text-align: right; padding: 10px;">
                                <a href="{{ URL::to('admin/user/add')  }}" class="btn btn-success">+ New User</a>
                          </p>
                          <p>
                            {{ $response_message  }}
                          </p>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Username</th>
                                  <th>Full Name</th>
                                  <th>Status</th>
                                  <th>Registered Date</th>
                                  <th>Last Updated</th>
                                  <th>&nbsp;</th>
                              </tr>
                              </thead>
                              <tbody>

                                @if ($users)
                                    @foreach ($users as $user)

                                    <tr>
                                        <td>{{ $user->id  }}</td>
                                        <td>{{ $user->username  }}</td>
                                        <td>{{ $user->title  }} {{ $user->first_name  }} {{ $user->last_name  }}</td>
                                        <td>{{ $user->statusText  }}</td>
                                        <td>{{ $user->created_at  }}</td>
                                        <td>{{ $user->updated_at  }}</td>
                                        <td>
                                              <a href="{{ $user->editUrl  }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;
                                              <a href="javascript: if (confirm('Delete?')) { location = '{{ $user->deleteUrl  }}' } " class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>

                                        </td>
                                    </tr>

                                    @endforeach
                                @endif


                              </tbody>
                          </table>
                      </section>
                  </div>

              </div>