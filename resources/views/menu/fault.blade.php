@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive m-t-40">
                                <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">Arıza Kaydı Oluştur</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Arıza : </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{route('show_fault')}}" method="POST">
                                                @csrf
                                                <div class="modal-body " style="text-align: center">
                                                    <span class="col-sm-4">Sahibi : </span>&nbsp;&nbsp;&nbsp;
                                                    <select name="made_by_that_staff" style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black" class="form-control">
                                                        <option  value=""></option>
                                                        @foreach($staff  as $item)
                                                            <option  value="{{$item->id}}">{{$item->staff_name}}</option>
                                                        @endforeach
                                                    </select><br><br>
                                                    <span class="col-sm-4">Kaydedicisi : </span>
                                                    <input name="person_receiving_feedback" value="{{\App\Staff::find(auth()->user()->staff_id)->id}}" type="hidden">
                                                    <input value="{{\App\Staff::find(auth()->user()->staff_id)->staff_name }}" class="form-control col-sm-8" type="text" style="background-color: white ; border:1px solid black" class="lg-6" readonly><br><br>
                                                    <br><br>
                                                    <span class="col-sm-6"> Türü :</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <select name="fault_type" style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black" class=" form-control">
                                                        <option  value=""></option>
                                                        @foreach($fault_details  as $item2)
                                                            <option  value="{{$item2->id}}">{{$item2->fault_name}}</option>
                                                        @endforeach
                                                    </select><button type="button" class="btn btn-primary float-right " style="margin-right: 20px" data-toggle="modal" data-target="#exampleModalx">+ Yeni</button>
                                                    <br><br>
                                                    <span class="col-sm-4">Maaliyeti : </span>&nbsp;&nbsp;
                                                    &nbsp;&nbsp;<input name="fault_amount" class="form-control col-sm-8" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                    <span class="col-sm-4">Açıklaması : </span>
                                                    <input name="fault_description" class="form-control col-sm-8" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Oluştur</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table stylish-table">
                                <thead>
                                <tr>
                                    <th colspan="2">Arıza Sahibi</th>
                                    <th>Arıza Kaydedicisi</th>
                                    <th>Arıza Türü</th>
                                    <th>Arıza Maliyeti</th>
                                    <th>Açıklama</th>
                                    <th>Eklenme Tarihi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($faults as $item)
                                    <tr >
                                        <td style="width:50px;"><span class="round">{{substr($item->staff->staff_name,0,1)}}</span></td>
                                        <td>
                                            <h6>{{$item->staff->staff_name}}</h6><small class="text-muted">{{$item->position_of_staff}}</small></td>
                                        <td>{{$item->fault_receiving_by->staff_name}}</td>
                                        <td>{{$item->fault_det->fault_name}}</td>
                                        <td>{{$item->fault_amount}}&#8378;</td>
                                        <td>{{$item->fault_description}}</td>
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

                                                <form action="{{route('edit_fault', $item->id)}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body " style="text-align: center">
                                                        <span class="col-sm-4">Sahibi : </span>&nbsp;&nbsp;&nbsp;
                                                        <select name="made_by_that_staff" style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black" class="form-control">
                                                            <option  value="{{$item->staff->id}}">{{$item->staff->staff_name}}</option>
                                                            @foreach($staff  as $item2)
                                                                <option  value="{{$item2->id}}">{{$item2->staff_name}}</option>
                                                            @endforeach
                                                        </select><br><br>
                                                        <span class="col-sm-4">Kaydedicisi : </span>
                                                        <input  style="background-color: white ; border:1px solid black" class="lg-6" value="{{\App\Staff::find($item->person_receiving_feedback)->staff_name }}" type="text" readonly>
                                                        <input name="person_receiving_feedback" value="{{\App\Staff::find($item->person_receiving_feedback)->id }}"type="hidden">
                                                        <br><br>

                                                        <span class="col-sm-6"> Türü :</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <select name="fault_type" style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black" class=" form-control">
                                                            <option  value="{{$item->fault_det->id}}">{{ $item->fault_det->fault_name }}</option>
                                                            @foreach($fault_details  as $item2)
                                                                <option  value="{{$item2->id}}">{{$item2->fault_name}}</option>
                                                            @endforeach
                                                        </select><button type="button" class="btn btn-primary float-right " style="margin-right: 20px" data-toggle="modal" data-target="#exampleModalx">+ Yeni</button>
                                                        <br><br>
                                                        <span class="col-sm-4">Maaliyeti : </span>&nbsp;&nbsp;
                                                        &nbsp;&nbsp;<input name="fault_amount" value="{{$item->fault_amount}}" class="form-control col-sm-8" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                        <span class="col-sm-4">Açıklaması : </span>
                                                        <input name="fault_description" value="{{$item->fault_description}}" class="form-control col-sm-8" type="text" style="background-color: white ; border:1px solid black" class="lg-6"><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Düzenle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Yeni Arıza Türü : </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{route('create_fault_detail')}}" method="POST">
                                                @csrf
                                                <input name="fault_name" class="form-control col-sm-10 float-right" type="text" style="text-align:center;tbackground-color: white ; border:1px solid black" class="lg-6">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
