<div class="row">
    <div class="col-lg-12">
       <section class="panel">
                                      <header class="panel-heading">
                                         <i class="fa fa-file-o"></i> {{ $action_title  }}
                                      </header>
                                      <div class="panel-body">
                                          <div class="form">

                                              <form action="{{ URL::to('admin/user/save')  }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Username (E-mail)</label>
                                                        <input type="text" name="username" class="form-control" value="{{ $user_data['username']  }}">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                     <div class="col-sm-10">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                     </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                       <label>User Group</label>
                                                       <select class="form-control" name="user_group_id">
                                                            <option value="">- Select User Group -</option>
                                                            @if ($user_groups)
                                                                @foreach($user_groups as $key => $val)

                                                                <option value="{{ $key  }}" <?php echo ($user_data['user_group_id'] == $key) ? 'selected="selected"' : ''; ?>>{{ $val }}</option>

                                                                @endforeach
                                                            @endif
                                                       </select>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                      <label>Status</label>
                                                      <p>
                                                        <input type="radio" name="status" value="1" <?php echo ($user_data['status'] == 1) ? 'checked="checked"' : ''; ?>> Enabled
                                                        <input type="radio" name="status" value="0" <?php echo ($user_data['status'] == 0) ? 'checked="checked"' : ''; ?>> Disabled
                                                      </p>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Title</label>
                                                        <select name="title" class="form-control">
                                                            <option value="">- Select Title -</option>
                                                            @if ($user_titles)
                                                                @foreach($user_titles as $key => $val)
                                                                <option value="{{ $key }}" <?php echo ($user_data['title'] == $key) ? 'selected="selected"' : ''; ?>>{{ $val }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="first_name" value="{{ $user_data['first_name']  }}">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" value="{{ $user_data['last_name']  }}">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Department</label>
                                                        <input type="text" class="form-control" name="department" value="{{ $user_data['department']  }}">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Institution</label>
                                                        <input type="text" class="form-control" name="institution" value="{{ $user_data['institution']  }}">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>City</label>
                                                        <input type="text" class="form-control" name="city" value="{{ $user_data['city']  }}">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <label>Country</label>
                                                        <select name="country_id" class="form-control">
                                                            <option value="">- Select Country -</option>
                                                            @if ($all_countries)
                                                                @foreach($all_countries as $country)
                                                                    <option value="{{ $country->id }}" <?php echo ($user_data['country_id'] == $country->id) ? 'selected="selected"' : ''; ?>>{{ $country->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                  </div>
                                                  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>&nbsp;&nbsp;
                                                  <a href="{{ $userUrl  }}" class="btn btn-danger">Cancel</a>
                                                  <input type="hidden" name="user_id" value="{{ $userId }}">
                                              </form>
                                          </div>
                                      </div>
                                  </section>
    </div>
</div>