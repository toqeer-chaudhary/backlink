@extends("frontend.layout.app")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/select2/css/select2.min.css")}}">
    <!-- customization -->
@endsection

@section("title")
    Projects
@endsection

@section("main-container")
    <div class="container">
        <div class="row m-5">
            <div class="col-md-4 col-sm-3 col-xs-5">

            </div>
            <div class="col-md-3 col-sm-5 col-xs-2">
                <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#createProjectModal">
                    <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Create Project</span>
                </button>
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
                        <th>Project Title</th>
                        <th>Project Description</th>
                        <th>URL</th>
                        <th>Category</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($projects as $project)
                        <tr id="project{{$project->id}}">
                            <td>{{$project->id}}</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->description}}</td>
                            <td><a href="{{ $project->url }}">{{ $project->url }}</a></td>
                            <td id="{{ $project->category->id }}">{{ $project->category->name }}</td>
                            <td>{{$project->created_at->diffForHumans(now())}}</td>
                            <td>
                                <button class="btn btn-info editProject" data-id="{{$project->id}}"
                                        data-toggle="modal" data-target="#editProjectModal">
                                    <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Edit</span>
                                </button>
                                <button class="btn btn-danger deleteProject"
                                        title="Delete" data-id="{{$project->id}}">
                                    <span class="align-middle">Delete</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <h1 class="text-center">No Projects Found</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Create Project Modal -->
    <div class="modal fade createProjectModal" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="createProjectModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation createProjectForm" method="POST" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="createProjectTitle" class="font-weight-bold">{{ __('Project Title') }} :</label>
                            <input id="createProjectTitle" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   name="title" value="{{ old('title') }}"
                                   placeholder="Min : 5, Max : 15" required minlength="5" maxlength="15" autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid Title.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="createProjectDescription" class="font-weight-bold">{{ __('Project Description') }} :</label>
                            <input id="createProjectDescription" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                   name="description" value="{{ old('description') }}"
                                   placeholder="Min : 20, Max : 50" required minlength="20" maxlength="50" autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid Description.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="createProjectUrl" class="font-weight-bold">{{ __('Project Url') }} :</label>
                            <input id="createProjectUrl" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                                   name="url" value="{{ old('url') }}"
                                   placeholder="https://google.com" required>
                            <div class="invalid-feedback">
                                Please provide a valid Url.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="createProjectCategory" class="font-weight-bold">{{ __('Project Category') }} :</label>
                            <select id="createProjectTitle" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                   name="category_id" value="{{ old('category_id') }}" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid Category.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
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
    <!--Update Project Modal -->
    <div class="modal fade editProjectModal" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation editProjectForm" method="POST" novalidate>
                        <input type="hidden" id="projectId">
                        @method("put")
                        @csrf
                        <div class="form-group">
                            <label for="editProjectTitle" class="font-weight-bold">{{ __('Project Title') }} :</label>
                            <input id="editProjectTitle" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   name="title" value="{{ old('title') }}"
                                   placeholder="Min : 5, Max : 15" required minlength="5" maxlength="15" autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid Title.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="editProjectDescription" class="font-weight-bold">{{ __('Project Description') }} :</label>
                            <input id="editProjectDescription" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                   name="description" value="{{ old('description') }}"
                                   placeholder="Min : 20, Max : 50" required minlength="20" maxlength="50" autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid Description.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="editProjectUrl" class="font-weight-bold">{{ __('Project Url') }} :</label>
                            <input id="editProjectUrl" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                                   name="url" value="{{ old('url') }}"
                                   placeholder="https://google.com" required>
                            <div class="invalid-feedback">
                                Please provide a valid Url.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="editProjectCategory" class="font-weight-bold">{{ __('Project Category') }} :</label>
                            <select id="editProjectCategory" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                    name="category_id" value="{{ old('category_id') }}" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid Category.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="float-right">
                                <button type="submit" class="btn btn-info">
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

