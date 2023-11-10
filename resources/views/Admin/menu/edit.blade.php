@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4>Menu#{{$model->id}}</h4>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('menu.update', $model->id) }}" method="POST">
                @csrf
                @method('PUT')
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
                                    <input type="text" class="form-control" name="title_oz" placeholder="title" value="{{($model->title['oz'])}}">
                                </div>
                            </div>
                            {{-- uz --}}
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="form-group">
                                    <label for="title_uz">Title</label>
                                    <input type="text" name="title_uz" class="form-control" placeholder="Title" value="{{($model->title['uz'])}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    @if($model->status)
                                        <option value="1" {{($model->status)?'selected':''}}>Опубликовано</option>
                                        <option value="2" {{($model->status)?'selected':''}}>Черновик</option>
                                        <option value="3" {{($model->status)?'selected':''}}>Не активен</option>
                                    @endif
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
