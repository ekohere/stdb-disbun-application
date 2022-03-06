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

                                        <div class="col-sm-12 mt-2 pr-3">
                                            <div id="img-loader" class="position-absolute" style="display: none;">
                                                <img src="{{asset('image/img-loader.gif')}}" width="48px" height="48px">
                                            </div>
                                            <div id="chart-report-stdb" class="text-center" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </form>
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
            $('#yearSelected').on('change', function() {
                var month = document.getElementById("monthSelected").value;
                $.ajax({url:'api/reportSTDB?year='+this.value+'&month='+month,
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

            $('#monthSelected').on('change', function() {
                var year = document.getElementById("yearSelected").value;
                $.ajax({url:'api/reportSTDB?year='+year+'&month='+this.value,
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

            var year = document.getElementById("yearSelected").value;
            var month = document.getElementById("monthSelected").value;
            $.ajax({url:'api/reportSTDB?year='+year+'&month='+this.value,
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

        {{--document.addEventListener('livewire:load', function () {--}}
        {{--    var data = {!! $status !!};--}}
        {{--    createChart(data);--}}
        {{--});--}}
        {{--document.addEventListener('livewire:update', function () {--}}

        {{--});--}}
        function createChart(data){
            var chart = am4core.create("chart-report-stdb", am4charts.XYChart);
            am4core.useTheme(am4themes_animated);

            chart.data = data;
            chart.legend = new am4charts.Legend();
            //Create Export Chart
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.items = [
                {
                    "label": "...",
                    "menu": [
                        { "type": "png", "label": "PNG" },
                        { "type": "csv", "label": "CSV" },
                    ]
                }
            ];
            chart.exporting.menu.items[0].icon = "{{asset('image/save.png')}}";
            // chart.exporting.menu.items[0].menu.push({
            //     label: "Excel",
            //     type: "custom",
            //     options: {
            //         callback: function() {
            //             window.open(data[0]['name']);
            //         }
            //     }
            // });

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "name";
            categoryAxis.title.text = "Jumlah";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            var  valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Jumlah (STDB)";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "total";
            series.dataFields.categoryX = "name";
            series.fontSize = 5;
            series.name = "Jumlah STDB Pengajuan";
            series.tooltipText = "[bold]{valueY}[/] STDB";
            // series.stacked = true;
            series.strokeWidth = 0;
            // series.sequencedInterpolation = true;

            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.locationX = 0.5;
            labelBullet.locationY = 0.5;
            labelBullet.label.text = "{valueY}[/] STDB";
            labelBullet.label.fill = am4core.color("#fff");

            //Modify Color Series
            var gradient = new am4core.LinearGradient();
            gradient.addColor(am4core.color("#388E3C"));
            gradient.addColor(am4core.color("#2E7D32"));
            gradient.rotation = 20;
            series.fill = gradient;

            // Add cursor
            chart.cursor = new am4charts.XYCursor();
        }
    </script>
@endsection
