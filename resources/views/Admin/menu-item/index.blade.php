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
                                <td>{{$item->title['oz']}}</td>
                                @if($item->status == 1)
                                    <td>Опубликовано</td>
                                @elseif($item->status == 2)
                                    <td>Черновик</td>
                                @else
                                    <td>Не активен</td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a href="{{route('menu-item.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="" data-id="{{$item->id}}" class="deleteMenuItem mr-2"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$models->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
           $(document).ready(function (){
               $('.deleteMenuItem').on('click',function (e){
                   e.preventDefault();
                   let id = $(this).data('id');
                   $.ajaxSetup({
                       headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')}
                   })
                   $.ajax({
                       url: 'admin/menu-item' + id,
                       method: 'delete',
                       data: id,
                       success:function (res){
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
                                   }, 5000)
                               })
                           }
                       }
                   })

               })
           })
    </script>
@endpush
