@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການວາລະສານ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ຂໍໍ້ມູນວາລະສານ</h5>
                        <a href="{{ route('admin.getAddMagazine') }}"><i class="fa fa-plus" style="position:absolute;right:20px;top:20px;"></i></a>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຮູບວາລະສານ</th>
                                            <th class="border-0">ເລກທີ່</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $auto_number = 1;
                                        @endphp
                                        
                                        @foreach($show_magazines as $show_magazine)
                                        <tr>
                                           
                                            <td>{{ $auto_number++ }}</td>
                                            <td><img style="max-height: 60px;" src="{{ url('/') }}/admins/magazine/{{ $show_magazine->cover }}" alt=""></td>
                                            <td>{{ $show_magazine->issue }}</td>
                                            <td>{{ $show_magazine->name }}</td>
                                            <td style="text-align:right">
                                                <a href="{{ route('admin.getUpdateMagazine', $show_magazine->id) }}"><i class="fa fa-edit"></i></a>
                                                
                                                &nbsp;&nbsp;
                                                <i class="fa fa-trash" data-toggle="modal" data-target="#DeleteModal-{{ $show_magazine['id'] }}"></i>
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
@foreach($show_magazines as $mag)
<div class="modal fade" id="DeleteModal-{{ $mag['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('admin.delete.magazine', $mag->id) }}" method="GET">
            <div class="modal-body">
                <label class="lbname">ທ່ານເເນ່ໃຈ ທີ່ຈະລຶບ ຫຼື ບໍ ?</label><br>
                <button class="btn btn-danger" style="border-radius:5px;" type="submit">ລຶບອອກ</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
<!-- Modal Edit End -->
@endsection

@section('js')

@stop