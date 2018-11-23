@extends("backend.layout.app")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/select2/css/select2.min.css")}}">
    <!-- customization -->
@endsection

@section("title")
    Category
@endsection

@section("main-container")
    <div class="container">
        <div class="row m-5">
            <div class="col-md-4 col-sm-3 col-xs-5">

            </div>
            <div class="col-md-3 col-sm-5 col-xs-2">
                <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#createCategoryModal">
                    <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Create Category</span>
                </button>
            </div>
            <div class="col-sm-3 col-xs-5">

            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="ks-datatable" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr id="category{{$category->id}}">
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at->diffForHumans(now())}}</td>
                            <td>
                                <button class="btn btn-info mb-1 editCategory" type="button" title="Edit" data-id="{{$category->id}}"
                                        data-toggle="modal" data-target="#editCategoryModal">
                                    <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Edit</span>
                                </button>
                                &nbsp;
                                <button class="btn btn-danger deleteCategory"
                                        title="Delete" data-id="{{$category->id}}">
                                    <i class="align-middle" data-feather="delete"></i> <span class="align-middle">Delete</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <h1 class="text-center">No Categories Found</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Create Category Modal -->
    <div class="modal fade createCategoryModal" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation createCategoryForm" method="POST" action="{{ route('admin.category.store') }}" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="createCategoryName" class="font-weight-bold">{{ __('Category Name') }} :</label>
                            <input id="createCategoryName" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" value="{{ old('name') }}"
                                   placeholder="Min : 3, Max : 10" required minlength="3" maxlength="10" autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="float-right">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryName" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation editCategoryForm" method="POST" action="{{ route('admin.category.update',0) }}" novalidate>
                        @method("put")
                        @csrf
                        <input type="hidden" name="categoryId" id="categoryId">
                        <div class="form-group">
                            <label for="updateCategoryName" class="font-weight-bold">{{ __('category Name') }} :</label>
                            <input id="updateCategoryName" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" value="{{ old('name') }}"
                                   placeholder="Min : 3, Max : 10" required minlength="3" maxlength="10" autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="float-right">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("script")
    <script src="{{asset("assets/common/js/sweetalert.min.js")}}"></script>
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

@endsection
