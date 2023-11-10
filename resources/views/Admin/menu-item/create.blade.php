@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4>MenuItem Qo'shish</h4>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="col-12 col-sm-12">
                <form action="{{route('menu-item.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-outline card-info">
                        <div class="card-header p-0 pt-1 border-bottom-0">
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
                                        <select class="form-control" name="menu_id">
                                            @foreach($data['categories'] as $key => $category)
                                                <option value="{{$key}}">{{$category['oz']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_oz"></label>
                                        <input type="text" name="title_oz" class="form-control" placeholder="title">
                                    </div>
                                </div>
                                {{-- uz --}}
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <div class="form-group">
                                        <select class="form-control" name="menu_id">
                                            @foreach($data['categories'] as $key => $category)
                                                <option value="{{$key}}">{{$category['uz']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title_oz"></label>
                                        <input type="text" name="title_oz" class="form-control" placeholder="title">
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
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
