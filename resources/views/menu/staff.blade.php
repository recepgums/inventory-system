@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive m-t-40">
                                <div class="table-responsive m-t-40">
                                    @if(auth()->user()->role_id <= 1)
                                        <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">Yeni Personel Ekle</button>
                                    @endif
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Personelin : </h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('create_staff')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body " style="text-align: center">
                                                        <span class="col-sm-4"> Adı  </span>&emsp;&emsp;&emsp;
                                                        <input name="staff_name" class="form-control col-sm-9 lg-6" type="text" style="background-color: white; border:1px solid black;"><br><br>
                                                        <span class="col-sm-2 float-left">Pozisyonu </span>&nbsp;
                                                        <select name="position_of_staff" style="width: 100%;background-color: white ; border:1px solid black" class="col-sm-6 form-control ">
                                                            <option >---Pozisyon Seçin---</option>
                                                            @foreach($position  as $item2)
                                                                <option  value="{{$item2->id}}">{{$item2->position_name}}</option>
                                                            @endforeach
                                                        </select><button type="button" class="btn btn-primary float-right " style="margin-right: 20px" data-toggle="modal" data-target="#exampleModalx">+ Yeni</button><br><br>
                                                        <span class="col-sm-3">Aylık Maaşı</span>
                                                        <input name="staff_salary" class="form-control col-sm-9 lg-6" type="text" style="background-color: white ; border:1px solid black"><br><br>
                                                        <span class="col-sm-3">Yetkileri&emsp; </span>
                                                        <select name="staff_rank" style="width: 100%;background-color: white ; border:1px solid black" class="col-sm-9 form-control ">
                                                            <option >---Yetki Seçin---</option>
                                                            @foreach($rank  as $item2)
                                                                <option  value="{{$item2->id}}">{{$item2->name}}</option>
                                                            @endforeach
                                                        </select><br><br>
                                                        <span class="col-sm-3">PIN Kodu&emsp;</span>
                                                        <input name="pin" class="form-control col-sm-9 lg-6" type="text" style="background-color: white ; border:1px solid black"><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ekle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Yeni Pozisyon Adı : </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{route('create_position')}}" method="POST">
                                                @csrf
                                                <input name="position_name" class="form-control col-sm-10 float-right" type="text" style="text-align:center;tbackground-color: white ; border:1px solid black" class="lg-6">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Pozisyon</th>

                                        <th>Maaş</th>
                                        <th>Başlangıç</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($staff as $item)
                                        <tr >
                                            <td style="width:50px;"><span class="round">{{substr($item->staff_name,0,1)}}</span></td>
                                            <td>
                                                <h6>{{$item->staff_name}}</h6><small class="text-muted">{{$item->position->position_name}}</small></td>

                                            <td>{{$item->staff_salary}} &#8378;</td>
                                            <td>{{$item->created_at->day}} {{date("F", strtotime($item->created_at))}} {{$item->created_at->year}} </td>
                                            <td>
                                                @if(auth()->user()->role_id <= 2)
                                                <button class="btn btn-danger float-right " data-toggle="modal" data-target="#exampleModal{{$item->id}}">Düzenle</button>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>Personelin : </h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="{{route('edit_staff', $item->id)}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body " style="text-align: center">
                                                            <span class="col-sm-4"> Adı : </span>&nbsp;
                                                            <input name="staff_name" class="form-control col-sm-8" value="{{$item->staff_name}}" type="text" style="background-color: white; border:1px solid black;"><br><br>
                                                            <span class="col-sm-3">Pozisyonu : </span>
                                                            <select name="position_of_staff" class="form-control" style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black"  >
                                                                <option value="{{$item->position->id}}">{{$item->position->position_name}}</option>
                                                                @foreach($position as $itemx)
                                                                    <option value="{{$itemx->id}}">{{$itemx->position_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="col-sm-3">Aylık Maaşı</span>
                                                            <input name="staff_salary" class="form-control col-sm-9" value="{{$item->staff_salary}}" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                            @if(auth()->user()->role<=1)
                                                                <span class="col-sm-3">Yetkileri</span>
                                                                <select name="staff_rank" style="width: 100%;background-color: white ; border:1px solid black" class="col-sm-9 form-control ">
                                                                    <option >---Yetki Seçin---</option>
                                                                    @foreach($rank  as $item2)
                                                                        <option  value="{{$item2->id}}">{{$item2->name}}</option>
                                                                    @endforeach
                                                                </select><br><br>

                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Düzenle</button>
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
