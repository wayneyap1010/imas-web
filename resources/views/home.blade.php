@extends('layouts.app')

@section('content')    

    @php($date = date('d-m-Y'))


    <div class="row" style="padding: 20px;">
      <div class="col-md-6">
          <h1 class="text-black-50">Daily Attendace Graph</h1>
      </div>

      <div class="col-md-6 text-right">
          <h1 class="text-black-50">{{ $date }}</h1>
      </div>
    </div>

    <!-- Chart's container -->
    <div id="chart" style="height: 700px;"></div>
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
          .legend({ position: 'bottom' })
          .datasets([{ type: 'bar', fill: false }, 'bar']),
        el: '#chart',
        url: 'https://chartisan.dev/chart/example.json',
        // You can also pass the data manually instead of the url:
        // data: { ... }
        data: data
      })
    </script>
@endsection
