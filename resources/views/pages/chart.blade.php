<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body style="margin: 0">
<div
    id="container"
    style="min-width: 400px; height: 300px; margin: 0 auto;"
></div>
</body>

<script type="text/javascript">
    var last_data_count = 0;

    window.onload = function () {
        $.getJSON('{{route('DataCount',[$id,$chart_num])}}', function (count) {
            if (count >= 0){
                last_data_count = count;
                $.getJSON('{{route('Data',[$id,$chart_num,'results'=>$results])}}', function (db_data) {
                    var data = [];
                    for (i = 0; i < db_data.length; i++) {
                        var time = new Date(db_data[i].created_at).getTime(),
                            value = parseFloat(db_data[i].value);
                        data.push({
                            x: time,
                            y: value
                        });
                    }
                    initchart(data);
                });
            }
        });
    }
    function initchart(db_data) {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        Highcharts.chart('container', {
            chart: {
                type: '{{$type}}',
                events: {
                    load: function () {
                        var s = this.series[0];
                        setInterval(function () {
                            $.getJSON('{{route('DataCount',[$id,$chart_num])}}', function (count) {
                                /*chart 更新設定 shift為是否左移 */
                                    @if($is_dynamic)
                                var shift = true;
                                    @else
                                var shift = false;
                                @endif
                                if (db_data.length < {{$results}}) {
                                    shift = false;
                                }
                                if (count < 0) ;
                                else if (count < last_data_count && count == 0) {
                                    location.reload();
                                }
                                else if (count <= last_data_count) ;
                                else {
                                    var data_count = count - last_data_count;
                                    last_data_count = count;
                                    $.getJSON('{{route('Data',[$id,$chart_num,'results'=>''])}}' + data_count, function (update_db_data) {
                                        for (let i = 0; i < data_count; i++) {
                                            var time = new Date(update_db_data[i].created_at).getTime(),
                                                value = parseFloat(update_db_data[i].value);
                                            s.addPoint([time, value], true, shift);
                                        }
                                    });
                                }
                            });
                        }, 3000);
                    }
                }
            },
            title: {
                text: '{{$name}}'
            },
            xAxis: {
                title: {
                    text: 'Time'
                },
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'Value'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#333333'
                }]
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: '{{$name}}',
                data: db_data,
                color: '#999999'
            }],
            credits: {
                text: 'test chart',
                href: '',
                style: {
                    color: '#999999'
                }
            }
        });
    }
</script>
</html>
