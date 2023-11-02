@extends('layouts.admin')

@section('content')



    <div class="row">
        <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Interactive Area Chart
                    </h3>

                    <div class="card-tools">
                        Real time
                        <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                            <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="interactive" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1497" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1198.2px; height: 300px;"></canvas><canvas class="flot-overlay" width="1497" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1198.2px; height: 300px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="28" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">0</text><text x="141.01372701953156" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">10</text><text x="258.00362600943055" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">20</text><text x="374.9935249993295" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">30</text><text x="491.9834239892285" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">40</text><text x="608.9733229791275" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">50</text><text x="725.9632219690264" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">60</text><text x="842.9531209589255" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">70</text><text x="959.9430199488245" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">80</text><text x="1076.9329189387233" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">90</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="8.952343940734863" y="269" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text><text x="1" y="15" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">60</text><text x="1" y="226.66666666666666" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text><text x="1" y="184.33333333333334" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text><text x="1" y="142" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">30</text><text x="1" y="99.66666666666667" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">40</text><text x="1" y="57.333333333333336" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">50</text></g></svg></div></div>
                </div>
                <!-- /.card-body-->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>




@endsection
