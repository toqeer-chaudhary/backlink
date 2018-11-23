@extends("frontend.layout.app")

@section("style")

@endsection

@section("title")
        Post
@endsection

@section("main-container")
    <div class="d-flex justify-content-center">
        <div class="card mt-30 col-md-10">
            <div class="card-header">
                <h5 class="card-title">Crate Post</h5>
            </div>
            <div class="card-body">
                <form class="createPostForm" method="post" id="createPostForm"
                      action="{{ route("post.store") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="min : 10 , max : 60"
                                   minlength="10" maxlength="60" name="title" id="createPostTitle"
                                   required autofocus>
                            <div class="invalid-feedback">
                                Please provide a valid Title.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-control select2" data-toggle="select2" name="category_id"
                                    id="createPostCategoryId" required>
                                <optgroup label="Categories">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid Title.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div>
                                <label class="form-label">Tags</label>
                                <div>
                                    @foreach($tags as $tag)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="{{ $tag->id }}" name="tags[]"> {{ $tag->name }}
                                        </label>
                                    @endforeach
                                    <div class="invalid-feedback">
                                        Please Select at leas one Tag.
                                    </div>
                                    <div class="valid-feedback">
                                        Great !
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="form-label w-100">Image</label>
                                <input id="createPostImage" class="file" name="image" type="file" required >
                                {{--multiple--}}
                                <div class="invalid-feedback">
                                    Please provide a image.
                                </div>
                                <div class="valid-feedback">
                                    Great !
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" placeholder="min : 30, max : 160"  rows="5"
                                      minlength="30" maxlength="160" name="description"
                                      id="createPostDescription" required></textarea>
                            <div class="invalid-feedback">
                                Please provide a valid description.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection