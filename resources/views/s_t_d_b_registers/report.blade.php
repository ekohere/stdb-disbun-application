@extends('layouts.app')
@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <h4 class="form-section">
                                            <a href="{!! route('home') !!}" class="btn btn-icon danger btn-lg pl-0 ml-0"><i class="ft-arrow-left"></i> Kembali</a>
                                        </h4>
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('admin_disbun'))
                                            <livewire:s-t-d-b-report></livewire:s-t-d-b-report>
                                        @endif
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="col-sm-12 mt-2">
                                    <div class="blog-item">
                                        <div class="blog-item">
                                            <div class="row justify-content-around">
                                                <h4 class="text-center text-uppercase text-bold-700">Report STDB By Month</h4>
                                            </div>
                                            <div class="row col-sm-4 mb-2">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-green bg-darken-2 text-white text-bold-600">Filter Tahun</span>
                                                    </div>
                                                    {!! Form::select('year-selected-chart', $years, 0, ['id'=>'year-selected-chart','class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div id="img-loader" class="position-absolute" style="display: none;">
                                                <img src="{{asset('image/img-loader.gif')}}" width="48px" height="48px">
                                            </div>
                                            <!-- Chart's container -->
                                            <div id="chart-report" class="text-center" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/lang/de_DE.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/germanyLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/fonts/notosans-sc.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/spiritedaway.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            am4core.options.autoDispose = true;
            $('#year-selected-chart').on('change', function() {
                var year = document.getElementById("year-selected-chart").value;
                $.ajax({url:'api/reportSTDB?year='+year,
                    beforeSend: function(){
                        // Show image container
                        $("#img-loader").show();
                    },
                    success: function (response) {
                        if (Array.isArray(response) && response.length){
                            createChart(response);
                        }else {
                            alert("Data Kosong");
                        }
                    },
                    complete:function(data){
                        // Hide image container
                        $("#img-loader").hide();
                    },
                    error: function (xhr, status, error){
                        alert("Error: "+error);
                    }
                });
            });

            var year = document.getElementById("year-selected-chart").value;
            $.ajax({url:'api/reportSTDB?year='+year,
                beforeSend: function(){
                    // Show image container
                    $("#img-loader").show();
                },
                success: function (response) {
                    if (Array.isArray(response) && response.length){
                        createChart(response);
                    }else {
                        alert("Data Kosong");
                    }
                },
                complete:function(data){
                    // Hide image container
                    $("#img-loader").hide();
                },
                error: function (xhr, status, error){
                    alert("Error: "+error);
                }
            });
        });

        function createChart(data) {
            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("chart-report", am4charts.XYChart);
            chart.data = data;
            chart.legend = new am4charts.Legend();
            chart.fontSize = 12;
            //Create Export Chart
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.items = [
                {
                    "label": "...",
                    "menu": [
                        { "type": "png", "label": "PNG" },
                        { "type": "csv", "label": "CSV" }
                    ]
                }
            ];
            chart.exporting.menu.items[0].icon = "{{asset('image/save.png')}}";

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "bulan";
            categoryAxis.title.text = "[bold]Bulan";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;

            var  valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "[bold]Jumlah STDB";

            function createSeries(status, title,color1, color2) {
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.dataFields.valueY = status;
                series.dataFields.categoryX = "bulan";
                series.name = title;
                series.tooltipText = "{valueY}[/] STDB";
                series.strokeWidth = 0;
                //series.interpolationEasing = am4core.ease.elasticIn;
                series.sequencedInterpolation = true;

                //Modify Color Series
                var gradient = new am4core.LinearGradient();
                gradient.addColor(am4core.color(color1));
                gradient.addColor(am4core.color(color2));
                gradient.rotation = 60;
                series.fill = gradient;

                var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                labelBullet.locationX = 0.5;
                labelBullet.locationY = -0.1;
                labelBullet.label.text = "{valueY}";
                labelBullet.label.text.fontSize = 6;
                labelBullet.label.fill = am4core.color("#000");
            }

            createSeries("stdb_proses","Di Proses","#F6D066","#f6b747");
            createSeries("stdb_valid_kph","Reviewed KPH","#8cecf6","#44d7f6");
            createSeries("stdb_valid_ppr","Reviewed PPR","#8fc3f6","#4e9df6");
            createSeries("stdb_verified","Terverifikasi","#8af67f","#10c919");
            createSeries("stdb_rejected","Tertolak","#f67b75","#c22725");


            // // Create series
            // var series = chart.series.push(new am4charts.ColumnSeries());
            // series.dataFields.valueY = "adhb";
            // series.dataFields.categoryX = "tahun";
            // series.name = "ADHB";
            // series.tooltipText = "{name}: [bold]Rp. {valueY}[/]";
            // series.strokeWidth = 0;
            // //series.interpolationEasing = am4core.ease.elasticIn;
            // series.sequencedInterpolation = true;
            // //Create series 2
            // var series2 = chart.series.push(new am4charts.ColumnSeries());
            // series2.dataFields.valueY = "adhk";
            // series2.dataFields.categoryX = "tahun";
            // series2.name = "ADHK";
            // series2.tooltipText = "{name}: [bold]Rp. {valueY}[/]";
            // series2.strokeWidth = 0;
            // //series.interpolationEasing = am4core.ease.elasticIn;
            // series2.sequencedInterpolation = true;

            // //Modify Color Series
            // var gradient = new am4core.LinearGradient();
            // gradient.addColor(am4core.color("#b892ff"));
            // gradient.addColor(am4core.color("#6d53b0"));
            // gradient.rotation = 60;
            // series.fill = gradient;
            // var gradient2 = new am4core.LinearGradient();
            // gradient2.addColor(am4core.color("#f09fff"));
            // gradient2.addColor(am4core.color("#ae21b0"));
            // gradient2.rotation = 60;
            // series2.fill = gradient2;

            // Add cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.xAxis = categoryAxis;
            chart.cursor.fullWidthLineX = true;
            chart.cursor.lineX.strokeWidth = 0;
            chart.cursor.lineX.fill = am4core.color("#8F3985");
            chart.cursor.lineX.fillOpacity = 0.1;
        }
    </script>
@endsection
