@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive m-t-40">
                                <!--YENİ EKLE BUTONU-->
                                <div class="table-responsive m-t-40">
                                    @if(auth()->user()->role_id <= 2)
                                        <button type="button" class="btn btn-primary float-right " data-toggle="modal"
                                                data-target="#exampleModalx">Yeni Paket Ekle
                                        </button>
                                    @endif
                                    <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Pakletin : </h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="{{route('create_inventory')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body " style="text-align: center">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
                                                            class="col-sm-5"> Adi : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input name="package_name" class="form-control col-sm-7"
                                                               type="text"
                                                               style="background-color: white; border:1px solid black;"><br><br>
                                                        <span class="col-sm-5">Eklenecek paket : </span>
                                                        <input name="package_count" class="form-control col-sm-7 "
                                                               type="text"
                                                               style="background-color: white ; border:1px solid black"
                                                               class="lg-6"><br><br>
                                                        <span class="col-sm-5">Paket kapasitesi :</span>
                                                        <input name="storage_for_package" class="form-control col-sm-7"
                                                               type="text"
                                                               style="background-color: white ; border:1px solid black"
                                                               class="lg-6"><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ekle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--YENİ EKLE BUTONU SONU-->
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Paket ismi</th>
                                        <th>Paket miktarı</th>
                                        <th>Depodaki Kapasite</th>
                                        <th>Paket/Depo Oranı</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($inventories as $item)
                                        <tr >
                                            <td style="width:50px;"><span
                                                    class="round">{{substr($item->package_name,0,1)}}</span></td>
                                            <td><h6>{{$item->package_name}}</h6></td>
                                            <td>{{$item->package_count}}</td>
                                            <td>{{$item->storage_for_package}}</td>
                                            <td>
                                                <span class="text-info">{{round(($item->package_count)/($item->storage_for_package)*100)}}%</span>
                                                <div class="progress" style="width: 250px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{round(($item->package_count)/($item->storage_for_package)*100)}}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                              </td>
                                            <td>
                                                @if(auth()->user()->role_id <= 2)
                                                    <button class="btn btn-danger float-right " data-toggle="modal"
                                                            data-target="#exampleModal{{$item->id}}">Düzenle
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Paketin : </h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('edit_inventory', $item->id)}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body " style="text-align: center">
                                                            <span class="col-sm-4"> Adı : </span>&nbsp;
                                                            <input name="package_name" class="form-control col-sm-8"
                                                                   value="{{$item->package_name}}" type="text"
                                                                   style="background-color: white; border:1px solid black;"><br><br>
                                                            <span class="col-sm-3">İçeriği : </span>
                                                            <input name="package_count" class="form-control col-sm-9"
                                                                   value="{{$item->package_count}}" type="text"
                                                                   style="background-color: white ; border:1px solid black"
                                                                   class="lg-6"><br><br>
                                                            <span class="col-sm-3">Aylık Maaşı</span>
                                                            <input name="storage_for_package"
                                                                   class="form-control col-sm-9"
                                                                   value="{{$item->storage_for_package}}" type="text"
                                                                   style="background-color: white ; border:1px solid black"
                                                                   class="lg-6"><br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Düzenle
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
