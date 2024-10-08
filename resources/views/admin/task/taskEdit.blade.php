@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




            <!-- Content Header (Page header) -->


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add task</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">

                                <form method="post" action="{{route('task.update')}}"
                                  >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name='task_id' value="{{$task->id}}">



                                            <div class="row"> <!-- 1st Row -->

                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Title<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="title" value={{$task->title}} class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->









                                            </div> <!-- End 1stRow -->









                                            <div class="row"> <!-- 3rd Row -->


                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>User List <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="user" id="religion" required=""
                                                                class="form-control">
                                                                {{-- <option value="" selected="" disabled="">Select
                                                                    User</option> --}}
                                                                    @foreach ($users as $user )
                                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                                    @if ($task->user_id == $user->id)
                                                                    <option selected value="{{$task->user_id}}">{{$user->name}}</option>

                                                                    @endif

                                                                    @endforeach



                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Task Complete<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="status" id="religion" required=""
                                                                class="form-control">
                                                                <option selected value="{{$task->status}}">{{$task->status == 1 ? 'Complete' : 'Incomplete'}}</option>
                                                                @if ($task->status == 1)
                                                                <option value="0">Incomplete</option>
                                                                @else
                                                                <option  value="1">Complete</option>
                                                                @endif




                                                                {{-- <option value="" selected="" disabled="">Select
                                                                    User</option> --}}
                                                                    {{-- @foreach ($task as $item )
                                                                    <option selected value="{{$item->status}}">
                                                                        @if ($item->status == 1)

                                                                        @else

                                                                        @endif
                                                                    </option> --}}
                                                                    {{-- @endforeach --}}



                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->




                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                        <h5>Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="date"  value="{{$task->date}}" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                </div> <!-- End Col md 4 -->


                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Textarea <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea  name="description"  id="textarea" class="form-control" required placeholder="Textarea text">{{$task->description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div> <!-- End 3rd Row -->









                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                    value="Submit">
                                            </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>







    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
