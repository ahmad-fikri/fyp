@extends('master')
@section('title', 'Report')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Paid Vs Unpaid</h1>
                    <canvas id="paid" height="150"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">A2 vs A3 vs A4</h1>
                    <canvas id="product" height="150"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Sales Per Month</h1>
                    <canvas id="sales" height="150"></canvas>
                </div>
            </div>

        </div>
    </div>



    
@include('report.paid_status')
@include('report.product_report')
@include('report.sale_report')
@endsection