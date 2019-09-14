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
                                    <button type="button" class="btn btn-primary float-right " data-toggle="modal"
                                            data-target="#exampleModalx">Yeni Paket Ekle
                                    </button>
                                    <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Görevin : </h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('create_assignment_tasks')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body " style="text-align: center">
                                                        &nbsp;<span class="col-sm-5"> Kullanıcı : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <select name="user_id"
                                                                style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black"
                                                                class=" form-control">
                                                            @foreach($staff  as $item2)
                                                                <option
                                                                    value="{{$item2->id}}">{{$item2->staff_name}}</option>
                                                            @endforeach
                                                        </select>&nbsp;<br>&nbsp;<br>
                                                        &nbsp;<span class="col-sm-5"> Görevi : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <select name="task_id"
                                                                style="width: 50%;margin-left:30px;background-color: white ; border:1px solid black"
                                                                class=" form-control">
                                                            @foreach($tasks  as $task)
                                                                <option
                                                                    value="{{$task->id}}">{{$task->task_name}}</option>
                                                            @endforeach
                                                        </select>
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
                                        <th colspan="2">Personel</th>
                                        @if (auth()->user()->staff_id == 0)
                                            <th>Yetkiler</th>@endif
                                        <th>Tarihi</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $key=>$task)
                                        @php $dizi2[$key]=(int)$task->id @endphp
                                    @endforeach
                                    @foreach($staff as $item)
                                        @foreach($item->staff_task as $key=>$item3)
                                            @php $dizi[$key]=(int)$item3->task_id;@endphp
                                        @endforeach
                                        <tr>
                                            <td style="width:50px;"><span
                                                    class="round">{{substr($item->staff_name,0,1)}}</span></td>
                                            <td><h6>{{$item->staff_name}}</h6></td>
                                            <form action="{{route('edit_assignment', $item->id)}}" method="post">
                                                <td>
                                                    @csrf
                                                    @foreach($tasks as $key=>$task)
                                                        <label> <input type='checkbox' name='task_id[]'
                                                                       value='{{$task->id}}'
                                                                       @if(in_array($dizi2[$key], $dizi)) checked @endif>
                                                            <small
                                                                @if(in_array($dizi2[$key], $dizi)) style="color:green"
                                                                @else style="color:red" @endif>{{$task->task_name}}
                                                            </small>
                                                        </label><br>
                                                    @endforeach
                                                </td>
                                                <td>{{$item->created_at->day}} {{date("F", strtotime($item->created_at))}} {{$item->created_at->year}} </td>
                                                <td>
                                                    <button class="btn btn-danger">Düzenle</button>
                                                </td>
                                            </form>
                                        </tr>
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
