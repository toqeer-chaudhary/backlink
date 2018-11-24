<?php
// an array of colors
$badgeColors = ["primary", "secondary", "danger", "warning", "info", "dark"];
// wrong formula to be continued
$averageRating = 0;
$sum = 0;
$total = 0;
foreach($post->ratings as $rating){
    $sum += $rating->rating;
    $total += 5; // adding 5 per iteration
}

if ($sum == 0){
    $averageRating = 0;
} else {
    $averageRating = ($sum / $total);
}

?>

@extends("frontend.layout.app")

@section("styles")
    <style>
        .rate-hover-layer
        {
            color: orange;
        }
        .rate2
        {
            font-size: 35px;
        }
        .rate2 .rate-select-layer
        {
            color: orange;
        }
    </style>
@endsection

@section("main-container")
    <div class="container">
        <br>
        <div class="row mt-15">
            <input type="hidden" id="postId" value="{{$post->id}}">
            <!-- Blog Post -->
            <div class="col-md-10 col-sm-12">
                    <div class="card" style="padding: 5px; margin-bottom: 15px">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset("assets/backend/images/post/".$post->image) }}"
                                     width="100%" height="100%">
                            </div>
                            <div class="col-md-8">
                                <div class="card-block px-3">
                                    <h4 class="card-title">{{ $post->title }}</h4>
                                    <p class="card-text d-none d-md-block">
                                        {{ $post->description }}
                                    </p>
                                    <p class="card-text">
                                        @foreach($post->tags as $tag)
                                            {{--The badgeColors array will work from index 0 to the size of array -1--}}
                                            <span class="badge badge-pill badge-{{ $badgeColors[mt_rand(0,sizeof($badgeColors)-1)] }}">{{ $tag->name }}</span>
                                        @endforeach
                                    </p>
                                    <p class="card-text">
                                        Posted on {{ $post->created_at->toFormattedDateString() }} by
                                        <a href="#" id="user_info" data-id="{{ $post->id }}"
                                           data-toggle="modal" data-target="#userModal" >{{ ucfirst($post->user->name) }}</a>
                                        In <span class="badge badge-pill badge-success">{{ $post->category->name }}</span>
                                        {{--<a href="#" id="scrollComments"  class="text-dark pull-right"><i class="fa fa-comments-o"></i> 15</a>--}}
                                    </p>
                                    @auth
                                        <p>
                                             <div class="user-rating"></div>
                                        </p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            {{--<div class="col-md-2">--}}
                {{--<div class="card">--}}
                    {{--<h3 class="card-header">Ads</h3>--}}
                    {{--<img class="card-img" src="https://picsum.photos/200/300" alt="">--}}
                    {{--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, quam!</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="sharethis-inline-share-buttons col-md-10"></div>--}}
            <div class="col-md-10" id="disqus_thread"></div>
        </div>
    </div>
    </div>

    {{--user info modal--}}
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <img id="userImage" class="card-img-top img-fluid"
                             alt="Card image" style="width:100%; height: 300px">
                        <div class="card-body">
                            <h4 id="userName" class="card-title"></h4>
                            <p id="userEmail" class="card-text"></p>
                            <a id="userPostLink" href="#" class="btn btn-primary"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bf29a1ad741e40011ae9660&product=inline-share-buttons' async='async'></script>
    <script>
        setTimeout(function () {
            $('html, body').animate({ scrollTop: 200 }, "slow");
        },3000);
    </script>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        var disqus_config = function () {
        this.page.url = "{{ route("post.show",$post->id) }}";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://article-blog.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script src="{{asset("assets/common/js/rater.js")}}"></script>
    <script>
        // only want this script to load on this page
        $(document).ready(function(){
            var options = {
                initial_value: "<?php echo $averageRating ?>"
            };
         var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
         var postId = $("#postId").val();
            $(".user-rating").rate(options);
            $(".user-rating").on("change", function(ev, data){
                $.ajax({
                    url:"/rating",
                    method:"post",
                    data:{_token:token,rating:data.to,postId:postId},
                    success :function (response) {
                        if (response > 0){
                            $.toaster({ message : 'Rating Updated Successfully', priority : 'info' });
                        } else {
                            $.toaster({ message : 'Rating Stored Successfully', priority : 'success' });
                        }
                    }
                })
            });
        });
    </script>
@endsection