<div class="form-group">
    <label for="editLinkProject" class="font-weight-bold">{{ __('Link Project') }} :</label>
    <select id="editProjectId" class="form-control{{ $errors->has('project_id') ? ' is-invalid' : '' }}"
            name="project_id" value="{{ old('project_id') }}" required>
        @foreach($categories as $project)
            <option value="{{ $project->id }}">{{ $project->name }}</option>
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
    <label for="editLinkUrl" class="font-weight-bold">{{ __('Link Url') }} :</label>
    <input id="editLinkUrl" type="text" class="form-control{{ $errors->has('back_link') ? ' is-invalid' : '' }}"
           name="back_link" value="{{ old('back_link') }}"
           placeholder="https://google.com" required>
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