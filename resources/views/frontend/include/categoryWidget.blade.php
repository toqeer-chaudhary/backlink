<!-- Tags Widget -->
<div class="card my-4">
    <h5 class="card-header">Category</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                {{--<ul class="mb-0">--}}
                @foreach($categories as $category)
                    <li class="list-inline-item col-md-12">
                        <a href="/category/{{$category->id}}">{{ ucfirst($category->name) }}</a>
                    </li>
                @endforeach
                {{--</ul>--}}
            </div>
        </div>
    </div>
</div>