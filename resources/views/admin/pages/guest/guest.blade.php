@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການຂໍ້ມູນແຂກຮັບເຊີນ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ແຂກຮັບເຊີນ</h5>
                        <a href="{{ route('admin.getAddGuest') }}"> <i class="fa fa-plus" style="position:absolute;right:20px;top:20px;"></i></a>
                       
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຮູບພາບ</th>
                                            <th class="border-0">ຊື່</th>
                                            <th class="border-0">ຕໍາແໜ່ງ</th>
                                            
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $auto_number = 1;
                                        @endphp
                                        @foreach($guests as $guest)
                                        <tr>
                                            <td>{{ $auto_number++ }}</td>
                                            <td><img style="max-height: 50px;" src="{{ url('/') }}/admins/guest/{{ $guest->photo }}"></td>
                                            <td>{{ $guest->name }}</td>
                                            <td>{{ $guest->position }}</td>
                                            <td style="text-align:right">
                                                <a href="{{ route('admin.getUpdateGuest', $guest->id) }}"><i class="fa fa-edit"></i></a>
                                                
                                                &nbsp;&nbsp;
                                                <a href="#"><i class="fa fa-trash" data-toggle="modal" data-target="#DeleteModal-{{ $guest['id'] }}"></i></a>
                                            </td>
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
</div>




<!-- Modal Edit Type -->
@foreach($guests as $guest)
<div class="modal fade" id="DeleteModal-{{ $guest['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.deleteGuest', $guest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="deletename">ທ່ານຕ້ອງການທີ່ຈະລົບແທ້ບໍ່ ?</p>
                    <br>
                    <button class="btn btn-danger" style="border-radius:5px;">ລຶບອອກ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- Modal Edit End -->
@endsection