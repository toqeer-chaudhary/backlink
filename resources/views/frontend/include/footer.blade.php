{{--Footer--}}
{{--@if(!empty($posts))--}}
    {{--<footer class="py-3 bg-dark {{ $posts->count() > 0 ? " " : "fixed-bottom" }}">--}}
        {{--<div class="container">--}}
            {{--<p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} {{ date("Y") }}</p>--}}
        {{--</div>--}}
    {{--</footer>--}}
{{--@else--}}
    {{--<div class="py-3 bg-dark" style="min-height: 100%;">--}}
        {{--<div class="container">--}}
            {{--<p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} {{ date("Y") }}</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}

{{--Global Script goes here--}}
<script src="{{asset("assets/common/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/common/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/common/js/jquery.toaster.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/common/plugins/Customizable-Loading-Modal-Plugin/js/modal-loading.js")}}"></script>


{{--Special Page styles goes here--}}
@yield("script")
<script src="{{asset("assets/frontend/js/blog.js")}}"></script>
