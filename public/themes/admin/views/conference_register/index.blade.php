<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Conference Registers ({{ ucfirst($register_type) }})</h3>
            </header>
            <div>

            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Conference</th>
                    <th>Register</th>
                    @if ($register_type == 'author')
                        <th>Paper title</th>
                    @endif
                    <th>Registered Date</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                        @if ($conference_registers)
                            @foreach($conference_registers as $data)
                            <tr>
                                <td style="text-align: center;">{{ $data->conference_register_id  }}</td>
                                <td>{{ $data->conference_name }}</td>
                                <td>{{ $data->user_title }} {{ $data->user_first_name }} {{ $data->user_last_name }}</td>
                                @if ($register_type == 'author')
                                    <td>{{ $data->conference_paper_title }}</td>
                                @endif
                                <td>{{ $data->conference_registered_date }}</td>
                                <td><span class="label {{ $data->conference_paper_status_cls }}">{{ $data->conference_paper_status }}</span></td>
                                <td style="text-align: center;">
                                    <a href="{{ URL::to('admin/conference_register/detail/' . $data->conference_register_id) }}"><span class="label label-primary">View</span></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </section>
    </div>

</div>