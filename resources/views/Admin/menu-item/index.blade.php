@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4>MenuItem</h4>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('menu-item.create') }}" class="btn btn-primary btn-sm"><span
                                class="fas fa-fw fa-plus"></span> Yangi qo'shish</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th style="width: 15px">#</th>
                                <th>Sarlavha</th>
                                <th>Status</th>
                                <th>Qo'shilgan sana</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $k => $item)
                                <tr>
                                    <td>{{++$k}}</td>
                                    <td>{{}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
