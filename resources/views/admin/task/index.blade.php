@extends('admin.admin_master')
@section('admin')
    <section class="content">
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Task List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">



                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 140.562px;">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 180.312px;">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 300.406px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 100.406px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 179.406px;">User</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 179.406px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tasks as $item)
                                                    @php
                                                        $myDate = '';
                                                        $futureDate = $item->date;
                                                        $todaydate = date('Y-m-d');
                                                        if ($todaydate < $futureDate) {
                                                            $myDate = 'Have Time';
                                                        } else {
                                                            $myDate = 'Over';
                                                        }

                                                    @endphp
                                                    <tr class="{{ $todaydate < $futureDate ? 'btn-success' : 'bg-warning' }}">
                                                        <td class="">{{ $item->title }}</td>
                                                        <td class="">


                                                            {{ $item->date }} || {{ $myDate }}

                                                        </td>
                                                        <td>{{ $item->description }}</td>
                                                        <td>
                                                            @if ($item->status == 0)
                                                                <div class="px-25 py-10 w-100"><span
                                                                        class="badge badge-danger">Incomplete</span></div>
                                                            @else
                                                                <div class="px-25 py-10 w-100"><span
                                                                        class="badge badge-primary">Complete</span></div>
                                                            @endif
                                                        </td>
                                                        @php
                                                            $user = App\Models\User::where(
                                                                'id',
                                                                $item->user_id,
                                                            )->first();
                                                        @endphp
                                                        <td>{{ $user->name }}</td>
                                                        <td>
                                                            <a title="Edit" href="{{ route('task.edit', $item->id) }}"
                                                                class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                                            @if ($item->status == 1)
                                                            @else
                                                                <a title="Mark As Complete"
                                                                    href="{{ route('task.mark', $item->id) }}"
                                                                    class="btn btn-primary"><i class="fa fa-check"></i></a>
                                                            @endif



                                                            <a target="_blank" title="Delete" href=""
                                                                class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach



                                            </tbody>
                                            <tfoot>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 140.562px;">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100.312px;">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 300.406px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 100.406px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 179.406px;">User</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 179.406px;">Action</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
