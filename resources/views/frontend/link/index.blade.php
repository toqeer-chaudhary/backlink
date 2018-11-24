@extends("frontend.layout.app")

@section("styles")
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/datatables-net/media/css/dataTables.bootstrap4.min.css")}}">
    <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/common/plugins/select2/css/select2.min.css")}}">
    <!-- customization -->
@endsection

@section("title")
    Links
@endsection


@section("main-container")
    <div class="container">
        <div class="row m-5">
            <div class="col-md-4 col-sm-3 col-xs-5">

            </div>
            <div class="col-md-3 col-sm-5 col-xs-2">
                <button class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#createLinkModal">
                    <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Create Link</span>
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
                        <th>Post Title</th>
                        <th>Link</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($links as $link)
                        <tr id="link{{$link->id}}">
                            <td>{{$link->id}}</td>
                            <td id="{{ $link->project->id }}">{{$link->project->title}}</td>
                            <td><a href="{{ $link->back_link }}">{{$link->back_link}}</a></td>
                            <td>{{$link->created_at->diffForHumans(now())}}</td>
                            <td>
                                <button class="btn btn-info editLink" data-id="{{$link->id}}"
                                        data-toggle="modal" data-target="#editLinkModal">
                                    <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Edit</span>
                                </button>
                                <button class="btn btn-danger deleteLink"
                                        title="Delete" data-id="{{$link->id}}">
                                    <span class="align-middle">Delete</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <h1 class="text-center">No Links Found</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Create Link Modal -->
    <div class="modal fade createLinkModal" id="createLinkModal" tabindex="-1" role="dialog" aria-labelledby="createLinkModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation createLinkForm" method="POST" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="createLinkProjectId" class="font-weight-bold">{{ __('Link Project') }} :</label>
                            <select id="createLinkProjectId" class="form-control{{ $errors->has('project_id') ? ' is-invalid' : '' }}"
                                    name="project_id" value="{{ old('project_id') }}" required>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid Project.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('project_id'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('project_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <a class="btn btn-info text-white" id="by-manual">
                               Enter Manually
                            </a>
                            <a class="btn btn-info text-white" id="by-file">
                                Upload A File
                            </a>
                        </div>
                        <div class="form-group d-none" id="backLinkFileUrl">
                            <label for="createLinkUrl" class="font-weight-bold">{{ __('Back Link Url') }} :</label>
                            <textarea id="createLinkUrl" type="text" class="form-control{{ $errors->has('back_link') ? ' is-invalid' : '' }}"
                                   name="back_link" value="{{ old('back_link') }}"
                                      placeholder="https://google.com"></textarea>
                            <div class="invalid-feedback">
                                Please provide a valid Url.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('back_link'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('back_link') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group d-none" id="backLinkFileDiv">
                            <label for="createLinkFile" class="font-weight-bold">{{ __('Back link File') }} :</label>
                            <input id="createLinkFile" type="file" class="form-control-file" name="backLinkFile">
                            <div class="invalid-feedback">
                                Please provide a valid File .
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
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
    <!--Update Link Modal -->
    <div class="modal fade editLinkModal" id="editLinkModal" tabindex="-1" role="dialog" aria-labelledby="editLinkModalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation editLinkForm" method="POST" novalidate>
                        <input type="hidden" id="linkId">
                        @method("put")
                        @csrf
                        <div class="form-group">
                            <label for="editLinkProjectId" class="font-weight-bold">{{ __('Link Project') }} :</label>
                            <select id="editLinkProjectId" class="form-control{{ $errors->has('project_id') ? ' is-invalid' : '' }}"
                                    name="project_id" value="{{ old('project_id') }}" required>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid Project.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('project_id'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('project_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="editBackLink" class="font-weight-bold">{{ __('Link Url') }} :</label>
                            <textarea id="editBackLink" type="text" class="form-control{{ $errors->has('back_link') ? ' is-invalid' : '' }}"
                                   name="back_link" value="{{ old('back_link') }}"
                                      placeholder="https://google.com" required></textarea>
                            <div class="invalid-feedback">
                                Please provide a valid Url.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('back_link'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('back_link') }}</strong>
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

