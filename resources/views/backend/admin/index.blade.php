@extends("backend.layout.app")

@section("title")
    Admin
@endsection

@section("main-container")
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 col-md-6 col-xl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="col-12 col-md-6 align-self-center text-center text-md-left">
                                    <h4>{{ $users->count() }}</h4>
                                    <p class="mb-0">Total Users</p>
                                </div>
                                <div class="col-12 col-md-6 align-self-center text-center text-md-right">
                                    <div data-label="100%" class="doughnut mt-2 doughnut-primary doughnut-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="col-12 col-md-6 align-self-center text-center text-md-left">
                                    <h4>{{ \App\Model\Project::all()->count() }}</h4>
                                    <p class="mb-0">Total Projects</p>
                                </div>
                                <div class="col-12 col-md-6 align-self-center text-center text-md-right">
                                    <div data-label="100%" class="doughnut mt-2 doughnut-success doughnut-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="col-12 col-md-6 align-self-center text-center text-md-left">
                                    <h4>{{ \App\Model\Link::all()->count() }}</h4>
                                    <p class="mb-0">Total Links</p>
                                </div>
                                <div class="col-12 col-md-6 align-self-center text-center text-md-right">
                                    <div data-label="100%" class="doughnut mt-2 doughnut-warning doughnut-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-2">
                            <div class="row">
                                <div class="col-12 col-md-6 align-self-center text-center text-md-left">
                                    <h4>{{ \App\Model\Category::all()->count() }}</h4>
                                    <p class="mb-0">Total Categories</p>
                                </div>
                                <div class="col-12 col-md-6 align-self-center text-center text-md-right">
                                    <div data-label="100%" class="doughnut mt-2 doughnut-danger doughnut-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-12 col-lg-8 d-flex">--}}
                    {{--<div class="card flex-fill w-100">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Total Revenue</h5>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="chart">--}}
                                {{--<canvas id="chartjs-dashboard-line"></canvas>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<script>--}}
                        {{--document.addEventListener("DOMContentLoaded", function(event) {--}}
                            {{--// Line chart--}}
                            {{--new Chart(document.getElementById("chartjs-dashboard-line"), {--}}
                                {{--type: 'line',--}}
                                {{--data: {--}}
                                    {{--labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],--}}
                                    {{--datasets: [{--}}
                                        {{--label: "Sales ($)",--}}
                                        {{--fill: true,--}}
                                        {{--backgroundColor: "transparent",--}}
                                        {{--borderColor: "#0cc2aa",--}}
                                        {{--data: [2015, 1465, 1487, 1796, 1387, 2123, 2866, 2548, 3902, 4938, 3917, 4927]--}}
                                    {{--}, {--}}
                                        {{--label: "Orders",--}}
                                        {{--fill: true,--}}
                                        {{--backgroundColor: "transparent",--}}
                                        {{--borderColor: "#5fc27e",--}}
                                        {{--borderDash: [4, 4],--}}
                                        {{--data: [928, 734, 626, 893, 921, 1202, 1396, 1232, 1524, 2102, 1506, 1887]--}}
                                    {{--}]--}}
                                {{--},--}}
                                {{--options: {--}}
                                    {{--maintainAspectRatio: false,--}}
                                    {{--legend: {--}}
                                        {{--display: false--}}
                                    {{--},--}}
                                    {{--tooltips: {--}}
                                        {{--intersect: false--}}
                                    {{--},--}}
                                    {{--hover: {--}}
                                        {{--intersect: true--}}
                                    {{--},--}}
                                    {{--plugins: {--}}
                                        {{--filler: {--}}
                                            {{--propagate: false--}}
                                        {{--}--}}
                                    {{--},--}}
                                    {{--scales: {--}}
                                        {{--xAxes: [{--}}
                                            {{--reverse: true,--}}
                                            {{--gridLines: {--}}
                                                {{--color: "rgba(0,0,0,0.05)"--}}
                                            {{--}--}}
                                        {{--}],--}}
                                        {{--yAxes: [{--}}
                                            {{--ticks: {--}}
                                                {{--stepSize: 500--}}
                                            {{--},--}}
                                            {{--display: true,--}}
                                            {{--borderDash: [5, 5],--}}
                                            {{--gridLines: {--}}
                                                {{--color: "rgba(0,0,0,0)",--}}
                                                {{--fontColor: "#fff"--}}
                                            {{--}--}}
                                        {{--}]--}}
                                    {{--}--}}
                                {{--}--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-lg-4 d-flex">--}}
                    {{--<div class="card flex-fill w-100">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Current Visitors</h5>--}}
                        {{--</div>--}}
                        {{--<div class="card-body px-4">--}}
                            {{--<div id="usa_map" style="height:294px;"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<script>--}}
                        {{--document.addEventListener("DOMContentLoaded", function(event) {--}}
                            {{--$('#usa_map').vectorMap({--}}
                                {{--map: 'us_aea',--}}
                                {{--backgroundColor: 'transparent',--}}
                                {{--normalizeFunction: "polynomial",--}}
                                {{--hoverOpacity: .7,--}}
                                {{--hoverColor: false,--}}
                                {{--regionStyle: {--}}
                                    {{--initial: {--}}
                                        {{--fill: '#DCE3E8'--}}
                                    {{--}--}}
                                {{--},--}}
                                {{--markerStyle: {--}}
                                    {{--initial: {--}}
                                        {{--"r": 9,--}}
                                        {{--"fill": "#007bff",--}}
                                        {{--"fill-opacity": .9,--}}
                                        {{--"stroke": "#fff",--}}
                                        {{--"stroke-width": 7,--}}
                                        {{--"stroke-opacity": .4--}}
                                    {{--},--}}
                                    {{--hover: {--}}
                                        {{--"stroke": "#fff",--}}
                                        {{--"fill-opacity": 1,--}}
                                        {{--"stroke-width": 1.5--}}
                                    {{--}--}}
                                {{--},--}}
                                {{--markers: [{--}}
                                    {{--latLng: [37.77, -122.41],--}}
                                    {{--name: 'San Francisco: 375'--}}
                                {{--}, {--}}
                                    {{--latLng: [40.71, -74.00],--}}
                                    {{--name: 'New York: 350'--}}
                                {{--}, {--}}
                                    {{--latLng: [39.09, -94.57],--}}
                                    {{--name: 'Kansas City: 250'--}}
                                {{--}, {--}}
                                    {{--latLng: [36.16, -115.13],--}}
                                    {{--name: 'Las Vegas: 275'--}}
                                {{--}, {--}}
                                    {{--latLng: [32.77, -96.79],--}}
                                    {{--name: 'Dallas: 225'--}}
                                {{--}]--}}
                            {{--});--}}
                        {{--})--}}
                    {{--</script>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-md-6 col-xl-3 d-flex order-1 order-xl-2">--}}
                    {{--<div class="card flex-fill w-100">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Weekly sales</h5>--}}
                        {{--</div>--}}
                        {{--<div class="card-body d-flex">--}}
                            {{--<div class="align-self-center w-100">--}}
                                {{--<div class="py-3">--}}
                                    {{--<div class="chart chart-sm">--}}
                                        {{--<canvas id="chartjs-dashboard-pie"></canvas>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<table class="table mb-0">--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                        {{--<td><i class="fas fa-square-full text-primary"></i> Direct</td>--}}
                                        {{--<td class="text-right">2602</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td><i class="fas fa-square-full text-warning"></i> Affiliate</td>--}}
                                        {{--<td class="text-right">1253</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td><i class="fas fa-square-full text-danger"></i> E-mail</td>--}}
                                        {{--<td class="text-right">541</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td><i class="fas fa-square-full" style="background:#E8EAED;"></i> Other</td>--}}
                                        {{--<td class="text-right">1465</td>--}}
                                    {{--</tr>--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<script>--}}
                        {{--document.addEventListener("DOMContentLoaded", function(event) {--}}
                            {{--// Pie chart--}}
                            {{--new Chart(document.getElementById("chartjs-dashboard-pie"), {--}}
                                {{--type: 'pie',--}}
                                {{--data: {--}}
                                    {{--labels: ["Direct", "Affiliate", "E-mail", "Other"],--}}
                                    {{--datasets: [{--}}
                                        {{--data: [2602, 1253, 541, 1465],--}}
                                        {{--backgroundColor: ["#0cc2aa", "#fcc100", "#f44455", "#E8EAED"],--}}
                                        {{--borderColor: "transparent"--}}
                                    {{--}]--}}
                                {{--},--}}
                                {{--options: {--}}
                                    {{--responsive: !window.MSInputMethodContext,--}}
                                    {{--maintainAspectRatio: false,--}}
                                    {{--legend: {--}}
                                        {{--display: false--}}
                                    {{--}--}}
                                {{--}--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-md-12 col-xl-5 d-flex order-3 order-xl-3">--}}
                    {{--<div class="card flex-fill w-100">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Monthly Sales</h5>--}}
                        {{--</div>--}}
                        {{--<div class="card-body d-flex w-100">--}}
                            {{--<div class="align-self-center chart chart-lg">--}}
                                {{--<canvas id="chartjs-dashboard-bar"></canvas>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<script>--}}
                        {{--document.addEventListener("DOMContentLoaded", function(event) {--}}
                            {{--// Bar chart--}}
                            {{--new Chart(document.getElementById("chartjs-dashboard-bar"), {--}}
                                {{--type: 'bar',--}}
                                {{--data: {--}}
                                    {{--labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],--}}
                                    {{--datasets: [{--}}
                                        {{--label: "Last year",--}}
                                        {{--backgroundColor: "#0cc2aa",--}}
                                        {{--borderColor: "#0cc2aa",--}}
                                        {{--hoverBackgroundColor: "#0cc2aa",--}}
                                        {{--hoverBorderColor: "#0cc2aa",--}}
                                        {{--data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]--}}
                                    {{--}, {--}}
                                        {{--label: "This year",--}}
                                        {{--backgroundColor: "#E8EAED",--}}
                                        {{--borderColor: "#E8EAED",--}}
                                        {{--hoverBackgroundColor: "#E8EAED",--}}
                                        {{--hoverBorderColor: "#E8EAED",--}}
                                        {{--data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]--}}
                                    {{--}]--}}
                                {{--},--}}
                                {{--options: {--}}
                                    {{--maintainAspectRatio: false,--}}
                                    {{--legend: {--}}
                                        {{--display: false--}}
                                    {{--},--}}
                                    {{--scales: {--}}
                                        {{--yAxes: [{--}}
                                            {{--gridLines: {--}}
                                                {{--display: false--}}
                                            {{--},--}}
                                            {{--stacked: false,--}}
                                            {{--ticks: {--}}
                                                {{--stepSize: 20--}}
                                            {{--}--}}
                                        {{--}],--}}
                                        {{--xAxes: [{--}}
                                            {{--barPercentage: .75,--}}
                                            {{--categoryPercentage: .5,--}}
                                            {{--stacked: false,--}}
                                            {{--gridLines: {--}}
                                                {{--color: "transparent"--}}
                                            {{--}--}}
                                        {{--}]--}}
                                    {{--}--}}
                                {{--}--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-md-6 col-xl-4 d-flex order-2 order-xl-1">--}}
                    {{--<div class="card flex-fill">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Calendar</h5>--}}
                        {{--</div>--}}
                        {{--<div class="card-body d-flex">--}}
                            {{--<div class="align-self-center w-100">--}}
                                {{--<div class="chart">--}}
                                    {{--<div id="datetimepicker-dashboard"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<script>--}}
                        {{--document.addEventListener("DOMContentLoaded", function(event) {--}}
                            {{--$('#datetimepicker-dashboard').datetimepicker({--}}
                                {{--inline: true,--}}
                                {{--sideBySide: false,--}}
                                {{--format: 'L'--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-lg-8 col-xxl-9 d-flex">--}}
                    {{--<div class="card flex-fill">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Latest Projects</h5>--}}
                        {{--</div>--}}
                        {{--<table id="datatables-dashboard" class="table table-striped my-0">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Name</th>--}}
                                {{--<th class="d-none d-xl-table-cell">Start Date</th>--}}
                                {{--<th class="d-none d-xl-table-cell">End Date</th>--}}
                                {{--<th>Status</th>--}}
                                {{--<th class="d-none d-md-table-cell">Assignee</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                                {{--<td>Project Apollo</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-success">Done</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Carl Jenkins</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Fireball</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-danger">Cancelled</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Bertha Martin</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Hades</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-success">Done</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Stacie Hall</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Nitro</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-warning">In progress</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Carl Jenkins</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Phoenix</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-success">Done</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Bertha Martin</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project X</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-success">Done</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Stacie Hall</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Romeo</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-success">Done</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Ashley Briggs</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Wombat</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-warning">In progress</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Bertha Martin</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Project Zircon</td>--}}
                                {{--<td class="d-none d-xl-table-cell">01/01/2018</td>--}}
                                {{--<td class="d-none d-xl-table-cell">31/06/2018</td>--}}
                                {{--<td><span class="badge badge-danger">Cancelled</span></td>--}}
                                {{--<td class="d-none d-md-table-cell">Stacie Hall</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    {{--<script>--}}
                        {{--document.addEventListener("DOMContentLoaded", function(event) {--}}
                            {{--$('#datatables-dashboard').DataTable({--}}
                                {{--pageLength: 4,--}}
                                {{--lengthChange: false,--}}
                                {{--bFilter: false,--}}
                                {{--autoWidth: false--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--</div>--}}
                {{--<div class="col-12 col-lg-4 col-xxl-3 d-flex">--}}
                    {{--<div class="card flex-fill">--}}
                        {{--<div class="card-header">--}}
                            {{--<h5 class="card-title mb-0">Newest Members</h5>--}}
                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="media mb-4">--}}
                                {{--<img src="img/avatar-5.jpg" width="64" height="64" class="rounded-circle mr-2" alt="Ashley Briggs">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="my-1">Ashley Briggs</h5>--}}
                                    {{--<span class="d-block text-muted">ashley@briggs.com</span>--}}
                                    {{--<span class="d-block text-primary">Author</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="media mb-4">--}}
                                {{--<img src="img/avatar-4.jpg" width="64" height="64" class="rounded-circle mr-2" alt="Stacie Hall">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="my-1">Stacie Hall</h5>--}}
                                    {{--<span class="d-block text-muted">stacie@hall.com</span>--}}
                                    {{--<span class="d-block text-danger">Editor</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="media">--}}
                                {{--<img src="img/avatar-2.jpg" width="64" height="64" class="rounded-circle mr-2" alt="Carl Jenkins">--}}
                                {{--<div class="media-body">--}}
                                    {{--<h5 class="my-1">Carl Jenkins</h5>--}}
                                    {{--<span class="d-block text-muted">carl@jenkins.com</span>--}}
                                    {{--<span class="d-block text-info">Administrator</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </main>
@endsection
