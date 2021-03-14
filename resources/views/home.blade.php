@extends('layouts.app')

@section('content')

    @php($date = date('d-M-Y'))

    <div class="container" style="padding-top:20px;">
        <div class="card" style="background-color: indianred;">
            <div class="row" style="padding: 20px;">
                <div class="col-md-6">
                    <h3 class="text-black-50">Monthly Attendace Graph</h3>
                </div>
                <div class="col-md-6 text-right">
                    <h3 class="text-black-50">{{ $date }}</h3>
                </div>
            </div>
        </div>

        <!-- Chart's container -->
        <div class="card">
            <div class="row" style="padding: 20px 20px 0 20px;">
                <div id="chart" style="width: 100%; height: 550px;"></div>
            </div>
        </div>
    </div>

    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <!-- Your application script -->
    <script>
        var data = {!! $chartData !!};

        const chart = new Chartisan({
            hooks: new ChartisanHooks()
                .colors(['#00b3ca', '#fa2d48'])
                .responsive()
                .beginAtZero()
                .colors()
                .borderColors()
                .legend({ position: 'bottom' })
                .datasets([{ type: 'line', fill: false }, { type: 'bar', fill: false }]),
            el: '#chart',
            url: 'https://chartisan.dev/chart/example.json',
            // You can also pass the data manually instead of the url:
            // data: { ... }
            data: data,
        })
    </script>
@endsection
