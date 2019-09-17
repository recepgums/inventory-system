@extends('layouts.app')
@section('content')

    <style>
        #shiva
        {
            width: 100px;
            height: 100px;
            float:left;
            margin:5px;
        }
        .count
        {
            line-height: 100px;
            margin-left:30px;
            font-size:25px;
        }
        #map {
            height: 600px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>


    <!---BURASI DASHBOARDD--->

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        @if(auth()->user()->role_id <=2)
                            <div class="row">
                                <!-- Column -->
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4 class="card-title">Personel Sayısı</h4>
                                            <div class="text-center">
                                                <h1 class="font-light m-b-0"><span class="count" style="font-size: 56px">{{$staff->count()}}</span></h1>
                                            </div>
                                            <span class="text-success" >%{{(int)($staff->count()/37*100)}} Doluluk</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{(int)($staff->count()/37*100)}}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4 class="card-title">Envanter Doluluk Oranı</h4>
                                            <div class="text-center">
                                                <h1 class="font-light m-b-0"><span class="count" style="font-size: 56px">{{$result}}</span></h1>
                                            </div>
                                            <span class="text-info">{{$result}}%</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$result}}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4 class="card-title">Arızalara Harcanan Bütçe</h4>
                                            <div class="text-center">
                                                <h1 class="font-light m-b-0"><span class="count" style="font-size: 56px">{{$fault}}</span>&#8378;</h1>
                                            </div>
                                            <span class="text-danger">Kalan Bütçe : {{10000-$fault}} &#8378;</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$fault/100}}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- Column -->
                                <div id="map"></div>
                                <script>
                                    function initMap() {
                                        var uluru = {lat: 38.682084, lng: 39.176999};
                                        var map = new google.maps.Map(
                                            document.getElementById('map'), {zoom: 10, center: uluru});
                                        var marker = new google.maps.Marker({position: uluru, map: map});
                                    }
                                </script>
                                <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8nr-nrxaBwVL3O7AvMxkOMeqlEbUyIHw&callback=initMap">
                                </script>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
@endsection
