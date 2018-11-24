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
                        <select id="editProjectTitle" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}"
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
                                {{ __('edit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
