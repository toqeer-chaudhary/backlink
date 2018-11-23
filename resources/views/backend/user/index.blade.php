@extends("backend.layout.app")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
        <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/select2/css/select2.min.css")}}">
    <!-- customization -->
 @endsection

@section("title")
    User
@endsection

@section("main-container")
    <div class="container">
        <div class="row m-5">
            <div class="col-md-4 col-sm-3 col-xs-5">

            </div>
            <div class="col-md-3 col-sm-5 col-xs-2">
                <h3>All Users List</h3>
            </div>
            <div class="col-sm-3 col-xs-5">

            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="ks-datatable" class="table table-sm table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Image</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Status</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr id="user{{$user->id}}">
                            <td>{{$user->id}}</td>
                            <td><img class="" src="{{ asset("assets/backend/images/user/$user->image") }}"
                                     alt="{{ $user->name }}" width="auto" height="30px">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->created_at->diffForHumans(now())}}</td>
                            <td>
                                <button class="btn btn-danger toggleUser"
                                        title="Delete" data-id="{{$user->id}}">
                                     <span class="align-middle">Toggle</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <h1 class="text-center">No Users Found</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   @endsection

@section("script")
    <script src="{{asset("assets/common/js/sweetalert.min.js")}}"></script>
    <script src="{{asset("assets/common/plugins/datatables-net/media/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/common/plugins/datatables-net/media/js/dataTables.bootstrap4.min.js")}}"></script>
    {{--<script src="{{asset("assets/common/js/custom/select2.min.js")}}"></script>--}}
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $('#ks-datatable').DataTable({
                    "initComplete": function () {
                        // $('.dataTables_wrapper select').select2({
                        //     minimumResultsForSearch: Infinity
                        // });
                    }
                });
            });
        })(jQuery);
    </script>
@endsection

