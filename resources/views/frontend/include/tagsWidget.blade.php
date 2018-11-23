<!-- Tags Widget -->
<div class="card my-4">
    <h5 class="card-header">Tags</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                {{--<ul class="mb-0">--}}
                @foreach($tags as $tag)
                    <li class="list-inline-item col-md-12">
                        <a href="/tag/{{$tag->id}}">{{ ucfirst($tag->name) }}</a>
                    </li>
                @endforeach
                {{--</ul>--}}
            </div>
        </div>
    </div>
</div>