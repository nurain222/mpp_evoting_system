@extends('layouts.adminnav')

@section('content')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart1);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart1() {
            var data1 = google.visualization.arrayToDataTable([
            ['Status', 'Total'],
            <?php echo $schartData?>
            ]);

            var options1 = { title:'Voters Turnout Chart'};

            var chart = new google.visualization.PieChart(document.getElementById('pie_chart1'));
            chart.draw(data1, options1);
        }

        function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
        ['Name', 'Total'],
        <?php echo $rchartData?>
        ]);

        var options2 = { title:'Election Results Chart'};

        var chart = new google.visualization.PieChart(document.getElementById('pie_chart2'));
        chart.draw(data2, options2);
    }
    </script>

<section>
    <div> <br> <br></div>
    <div class="column">
        <div class="container">
            <div id="pie_chart1" style="width: 650px; height: 500px;">  </div>
            <div id="pie_chart2" style="width: 650px; height: 500px;"> </div>
        </div>
    </div>
</section>

@endsection