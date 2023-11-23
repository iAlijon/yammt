@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4>Yangilik qo'shish</h4>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="col-12 col-sm-12">
                <div class="card card-outline card-info">
                    <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control {{$errors->has('category_id')?'is-invalid':''}}">
                                        <option value="">---</option>
                                        @foreach($data['categories'] as $category)
                                            <option value="{{$category->id}}">{{$category['title']['oz']}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">{{$errors->first('category_id')}}</small>
                                </div>
                                {{-- oz --}}
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <div class="form-group">
                                        <label for="title_oz">Title</label>
                                        <input type="text" name="title_oz" id="title_oz" class="form-control {{$errors->has('title_oz')?'is-invalid':''}}" placeholder="Title">
                                        <small class="text-danger">{{$errors->first('title_oz')}}</small>
                                    </div>

                                    <div class="form-group {{$errors->has('description_oz')?'is-invalid':''}}">
                                        <label for="description_oz">Description</label>
                                        <textarea class="form-control" cols="50" name="description_oz" id="description_oz"></textarea>
                                        <small class="text-danger">{{$errors->first('description_oz')}}</small>
                                    </div>

                                    <div class="form-group {{$errors->has('content_oz')}}">
                                        <label for="content_oz">Content</label>
                                        <textarea class="textarea form-control summernote" name="content_oz" id="content_oz"></textarea>
                                        <small class="text-danger">{{$errors->first('content_oz')}}</small>
                                    </div>
                                </div>
                                {{-- uz --}}
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <div class="form-group">
                                        <label for="title_uz">Title</label>
                                        <input type="text" name="title_uz" id="title_uz" class="form-control {{$errors->has('title_uz')?'is-invalid':''}}" placeholder="Title">
                                        <small class="text-danger">{{$errors->first('title_uz')}}</small>
                                    </div>

                                    <div class="form-group {{$errors->has('description_oz')?'is-invalid':''}}">
                                        <label for="description_uz">Description</label>
                                        <textarea class="form-control" cols="50" name="description_uz" id="description_uz"></textarea>
                                        <small class="text-danger">{{$errors->first('description_uz')}}</small>
                                    </div>

                                    <div class="form-group {{$errors->has('content_uz')?'is-invalid':''}}">
                                        <label for="content_uz">Content</label>
                                        <textarea class="textarea form-control summernote" name="content_uz" id="content_uz"></textarea>
                                        <small class="text-danger">{{$errors->first('content_uz')}}</small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Rasm</label>
                                    <input type="file" name="image" id="image" class="form-control"
                                           accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="text" class="form-control combodate" id="date" name="date">
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
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
