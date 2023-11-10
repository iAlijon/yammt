@extends('admin.layouts.app')

@section('content')

 <div class="content-header">
     <div class="container-fluid">
          <h4>Yangiliklar</h4>
     </div>
 </div>
 <div class="content">
     <div class="container-fluid">
         <div class="card card-outline card-info">
             <div class="card-header">
                 <h3 class="card-title">
                     <a href="{{route('news.create')}}" class="btn btn-primary btn-sm float-right"><span class="fas fa-fw fa-plus"></span> Yangi qo'shish</a>
                 </h3>
                 <div class="card-tools">
                     <div class="input-group input-group-sm">
                         <input type="text" name="search" class="form-control float-right" placeholder="search">
                         <div class="input-group-append">
                             <button type="submit" class="btn btn-default">
                                 <i class="fas fa-search"></i>
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="card-body">
                 <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                             <th style="width: 10px">#</th>
                             <th>Sarlavxa</th>
                             <th>Qisqa sarlavxa</th>
                             <th>Kiritilgan sana</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach($result as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{json_decode($item->title)->oz}}</td>
                                <td>{{json_decode($item->description)->oz}}</td>
                                <td>{{\Illuminate\Support\Carbon::parse($item->date)->format('d m Y')}}</td>
                                <th class="d-flex justify-content-start">
                                    <a href="{{route('news.edit', $item->id)}}" class="mr-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('news.destroy', $item->id)}}" method="post" id="deleteItem-{{$item->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                    <a href="#" onclick="if (confirm('Siz rostdan ham ushbu ma\'lumotni o\'chirishni xoxlaysizmi ?')){ document.getElementById('deleteItem-<?= $item->id ?>').submit(); } event.returnValue = false; return false"><i class="fa fa-trash-alt"></i></a>
                                </th>
                            </tr>
                        @endforeach
                     </tbody>
                 </table>
                 <br>
                 <div class="pagination pagination-sm">
                     {{$result->links("pagination::bootstrap-4")}}
                 </div>
             </div>
         </div>
     </div>
 </div>



@endsection
