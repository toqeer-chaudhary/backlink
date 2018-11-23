<?php
//  creating an array of tag id's that are associated with the post
foreach($post->tags as $tag)
{
    // array of id
    $tagsArrayId[] = $tag->id;
}
?>

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
                <h5 class="card-title">Edit Post</h5>
            </div>
            <div class="card-body">
                <form class="updatePostForm" method="post" id="updatePostForm"
                      action="{{ route("post.update",$post->id) }}"  novalidate enctype="multipart/form-data">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    <input type="hidden" name="updatePost" id="updatePost" value="{{ $post->id }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="min : 10 , max : 60"
                                   minlength="10" maxlength="60" name="title" id="title"
                                   required autofocus value="{{ $post->title }}">
                            <div class="invalid-feedback">
                                Please provide a valid Title.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                            @if ($errors->has('title'))
                                <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-control select2" data-toggle="select2" name="category_id"
                                    id="categoryId" required>
                                <optgroup label="Categories">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $post->category->id ?
                                     'selected="selected"' : '' }} >{{ $category->name }}</option>
                                    @endforeach
                                </optgroup>
                                <div class="invalid-feedback">
                                    Please provide a valid Title.
                                </div>
                                <div class="valid-feedback">
                                    Great !
                                </div>
                                @if ($errors->has('categoryId'))
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('categoryId') }}</strong>
                                    </span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <div>
                                <label class="form-label">Tags</label>
                                <div>
                                    @foreach($tags as $tag)
                                        <label class="checkbox-inline">
                                        <input type="checkbox" value="{{ $tag->id }}"
                                               name="tags[]" {{ in_array($tag->id,$tagsArrayId) ? "checked" : "" }}
                                            > {{ $tag->name }}
                                        </label>
                                    @endforeach
                                        <div class="invalid-feedback">
                                            Please Select at leas one Tag.
                                        </div>
                                        <div class="valid-feedback">
                                            Great !
                                        </div>
                                    @if ($errors->has('tags'))
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $errors->first('tags') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div>
                                <label class="form-label">Description</label>
                                <textarea class="form-control" placeholder="min : 30, max : 160"  rows="5"
                                          minlength="30" maxlength="160" name="description"
                                          id="description">{{ $post->description }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                                <div class="invalid-feedback">
                                    Please provide a valid description.
                                </div>
                                <div class="valid-feedback">
                                    Great !
                                </div>
                            </div>
                            <br>
                            <div class="d-none d-md-block">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label w-100">Image</label>
                            <img class="img-fluid" style="height: 300px" src="{{ asset("assets/backend/images/post/$post->image") }}"
                                 alt="{{$post->image}}" width="300px">
                            <input id="postImage" class="file" name="image" type="file" >
                            {{--multiple--}}
                            @if ($errors->has('image'))
                                <div class="text-danger" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </div>
                            @endif
                            <div class="invalid-feedback">
                                Please provide a image.
                            </div>
                            <div class="valid-feedback">
                                Great !
                            </div>
                        </div>
                        <div class="d-none d-md-none d-sm-block">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @if (session('success'))
        <script>
            $.toaster({ message : '{{session('success')}}', priority : 'success' });
        </script>
    @endif
@endsection