@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h4>Menu</h4>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm"><span
                                class="fas fa-fw fa-plus"></span> Yangi qo'shish</a>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @elseif(session()->has('errors'))
                    <div class="alert alert-danger">
                        {{session()->get('errors')}}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="width: 15px">#</th>
                            <th>Sarlavha</th>
                            <th>Kiritilgan sana</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $k=>$model)
                            <tr>
                                <td style="width: 15px">{{$k+1}}</td>
                                <td>{{ $model->title['oz'] }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($model->created_at)->format('d.m.Y') }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('menu.edit', $model->id) }}" class="mr-2"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="menuId" type="button" data-id="{{$model->id}}"><i
                                            class="fas fa-trash-alt"></i></a>
                                    {{--                                        <form action="{{ route('menu.destroy', $model->id) }}" method="POST" id="deleteId-{{$model->id}}" class="mr-2">--}}
                                    {{--                                            @csrf--}}
                                    {{--                                            @method('DELETE')--}}
                                    {{--                                            <input type="hidden" name="_method" value="DELETE">--}}
                                    {{--                                        </form>--}}
                                    {{--                                        <a href="#" onclick="if (confirm('Siz rostdan ham ushbu menu ni o\'chirishni xoxlaysizmi ?')){ document.getElementById('deleteId-<?= $model->id ?>').submit();} event.returnValue = false; return false"><i class="fas fa-trash-alt"></i></a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="text-right">
                        {{$models->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.menuId').on('click', function () {
                let menuId = $(this).data('id');
                console.log(menuId)
                $.ajaxSetup({
                    headers:  {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')}
                })
                $.ajax({
                    url: '/admin/menu/' + menuId,
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: {"id": menuId},
                    success: function (res) {
                        if (res) {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "3000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.success(['success', 'Success delete menu'], function () {
                                setTimeout(function () {
                                    location.href = "{{route('menu.index')}}"
                                }, 4000)
                            })
                        }
                    },
                    error:function (res){
                        console.log(res)
                        if (res){
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "3000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.error(['error','Error delete menu'],function (){
                                setTimeout(function (){
                                    location.href = "{{back()}}"
                                }, 4000)
                            })
                        }
                }
                })
            })
        })
    </script>
@endpush
