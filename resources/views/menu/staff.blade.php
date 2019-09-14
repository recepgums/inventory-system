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
                                    <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">Yeni Personel Ekle</button>
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
                                                        <span class="col-sm-4"> Adı : </span>&nbsp;
                                                        <input name="staff_name" class="form-control col-sm-8" type="text" style="background-color: white; border:1px solid black;"><br><br>
                                                        <span class="col-sm-3">Pozisyonu : </span>
                                                        <input name="position_of_staff" class="form-control col-sm-9 " type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                        <span class="col-sm-3">Aylık Maaşı</span>
                                                        <input name="staff_salary" class="form-control col-sm-9" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                        <span class="col-sm-3">Yetkileri</span>
                                                        <input name="staff_rank" class="form-control col-sm-9" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ekle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Pozisyon</th>
                                        <th>Yetkiler</th>
                                        <th>Maaş</th>
                                        <th>Başlangıç</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($staff as $item)
                                        <tr>
                                            <td style="width:50px;"><span class="round">{{substr($item->staff_name,0,1)}}</span></td>
                                            <td>
                                                <h6>{{$item->staff_name}}</h6><small class="text-muted">{{$item->position->position_name}}</small></td>
                                            <td>{{$item->staff_rank}}</td>
                                            <td>{{$item->staff_salary}} &#8378;</td>
                                            <td>{{$item->created_at->day}} {{date("F", strtotime($item->created_at))}} {{$item->created_at->year}} </td>
                                            <td><button class="btn btn-danger float-right " data-toggle="modal" data-target="#exampleModal{{$item->id}}">Düzenle</button></td>
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
                                                            <span class="col-sm-3">Yetkileri</span>
                                                            <input name="staff_rank" class="form-control col-sm-9" value="{{$item->staff_rank}}" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
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
