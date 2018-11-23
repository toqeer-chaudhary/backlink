<?php
// an array of colors
$badgeColors = ["primary", "secondary", "danger", "warning", "info", "dark"]
?>

@extends("frontend.layout.app")

@section("main-container")
    {{--<div class="container">--}}
        {{--<br>--}}
        {{--<div class="row mt-15">--}}
            {{--<!-- Blog Post -->--}}
            {{--<div class="col-md-9 col-sm-12">--}}
            {{--@forelse($posts as $post)--}}
                    {{--<div class="card" style="padding: 5px; margin-bottom: 15px">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-4">--}}
                                {{--<img class="img-fluid" src="{{ asset("assets/backend/images/post/".$post->image) }}"--}}
                                      {{--width="300px" style="height: 200px">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-8">--}}
                                {{--<div class="card-block px-3">--}}
                                    {{--<div>--}}
                                        {{--<h4 class="card-title float-left">{{ $post->title }}</h4>--}}
                                        {{--@auth--}}
                                        {{--<a href="{{ route("post.edit",$post->id )}}"--}}
                                           {{--class="d-none d-md-block btn btn-primary float-right">--}}
                                            {{--<i class="fa fa-pencil"></i>--}}
                                        {{--</a>--}}
                                        {{--@endauth--}}
                                    {{--</div>--}}
                                    {{--<div class="clear">--}}
                                        {{--<p class="card-text d-none d-md-block clear">--}}
                                            {{--{!! \Illuminate\Support\Str::words($post->description,20,--}}
                                           {{--"<a href=post/$post->id class='text-primary'> read more </a>") !!}</p>--}}
                                        {{--<p class="card-text">--}}
                                            {{--@foreach($post->tags as $tag)--}}
                                                {{--The badgeColors array will work from index 0 to the size of array -1--}}
                                                {{--<span class="badge badge-pill badge-{{ $badgeColors[mt_rand(0,sizeof($badgeColors)-1)] }}">{{ $tag->name }}</span>--}}
                                            {{--@endforeach--}}
                                        {{--</p>--}}
                                        {{--<p class="card-text">--}}
                                            {{--Posted on {{ $post->created_at->toFormattedDateString() }} by--}}
                                            {{--<a href="#" id="user_info" data-id="{{ $post->user->id }}"--}}
                                               {{--data-toggle="modal" data-target="#userModal" >--}}
                                                {{--{{ ucfirst($post->user->name) }}--}}
                                            {{--</a>--}}
                                            {{--In <span class="badge badge-pill badge-success">{{ $post->category->name }}</span>--}}
                                            {{--<a href="{{ route("post.show",$post->id) }}" id="scrollComments" class="text-dark pull-right"><i class="fa fa-comments-o"></i> 15</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@empty--}}
                    {{--<h3 class="text-center text-dark">No Posts Available <a href="{{ route("post.create") }}">--}}
                            {{--Create One</a></h3>--}}
                {{--@endforelse--}}
            {{--</div>--}}

                {{--<!-- Sidebar Widgets Column -->--}}
                {{--Note this coloumn will only be shown if the user is logged in--}}
                {{--<div class="col-md-3 col-sm-12">--}}
                    {{--Including tags widget--}}
                    {{--@include("frontend.include.tagsWidget")--}}

                    {{--Including category widget--}}
                    {{--@include("frontend.include.categoryWidget")--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- Pagination -->--}}
            {{--<div class="pagination justify-content-center mb-4">--}}
                {{--{{ $posts->links() }}--}}
            {{--</div>--}}
        {{--</div></div>--}}

    {{--user info modal--}}
    {{--<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalCenterTitle"--}}
         {{--aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
            {{--<div class="modal-content modal-md">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLongTitle">User Info</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="card">--}}
                        {{--<img id="userImage" class="card-img-top img-fluid"--}}
                             {{--alt="Card image" style="width:100%; height: 300px">--}}
                        {{--<div class="card-body">--}}
                            {{--<h4 id="userName" class="card-title"></h4>--}}
                            {{--<p id="userEmail" class="card-text"></p>--}}
                            {{--<a id="userPostLink" href="#" class="btn btn-primary"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

@section("script")
    @if (session('success'))
        <script>
            $.toaster({ message : '{{session('success')}}', priority : 'success' });
        </script>
    @endif
@endsection