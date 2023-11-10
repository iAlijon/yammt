@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4>Menu qo'shish</h4>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('menu.store') }}" method="POST">
                @csrf
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">O'Z</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">ЎЗ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">

                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            {{-- oz --}}
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                <div class="form-group">
                                    <label for="title_oz">Title</label>
                                    <input type="text" class="form-control" name="title_oz" placeholder="title">
                                </div>
                            </div>
                            {{-- uz --}}
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="form-group">
                                    <label for="title_uz">Title</label>
                                    <input type="text" name="title_uz" class="form-control" placeholder="Title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Опубликовано</option>
                                    <option value="2">Черновик</option>
                                    <option value="3">Не активен</option>
                                </select>
                            </div>

                            <div class="text-right">
                                <button class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
