@extends('backend.layout.admin_layout')
@section('main')
    <style>
        .wrapper {
            background: white;
        }
    </style>

    <div style="padding: 20px 20px">
        <div>
            <div id="chartByDay"></div>
        </div>
        <div>
            <div id="chartByMonth"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(document).ready(function (){
            chartByDay()
            chartByMonth()

            function chartByDay(){
                let type = "day"
                $.ajax({
                    url: "{{ route('admin.chart') }}",
                    method: 'get',
                    data: { type },
                    success: function (res) {
                        if (res.success === 1) {
                            let data = res.data.data
                            let cate = res.data.cate
                            let title = "Tổng số lượng đã bán theo ngày"
                            renderChart(data, cate, title, 'chartByDay')
                        } else {
                            //
                        }
                    },
                    error: function (res) {

                    },
                });
            }
            function chartByMonth(){
                let type = "month"
                $.ajax({
                    url: "{{ route('admin.chart') }}",
                    method: 'get',
                    data: { type },
                    success: function (res) {
                        if (res.success === 1) {
                            let data = res.data.data
                            let cate = res.data.cate
                            let title = 'Tổng số lượng sản phẩm đã bán theo tháng'
                            renderChart(data, cate, title, 'chartByMonth')
                        } else {
                            //
                        }
                    },
                    error: function (res) {

                    },
                });
            }
        })

        function renderChart(data, cate, title, type) {
            var max = Math.max(...data) > 0 ? Math.max(...data) + 3 : 0
            var options = {
                series: [{
                    name: "Tổng số lượng",
                    data: data
                }],
                chart: {
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    height: 400
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight',
                    width: 1,
                    curve: 'smooth',
                },
                title: {
                    text: title,
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: cate,
                },
                yaxis: {
                    max: max
                }
            };

            var chart = new ApexCharts(document.querySelector("#"+type), options);
            chart.render();
        }
    </script>
@endsection
