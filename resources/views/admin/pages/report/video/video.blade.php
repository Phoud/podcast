
@extends('admin.common.main')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ລາຍງານລາຍການທຸກທິດທາງ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ລາຍການທຸກທິດທາງທັງໝົດ ({{ $videos->count() }})</h5>
                        <a class="btn btn-outline-primary" href="{{ route('videoReportGenerate') }}" style="position:absolute;right:20px;top:5px;">Export Videos</a>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຊື່ຫົວຂໍ້</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($videos as $video)
                                        <tr>
                                            <td>{{ $video->id }}</td>
                                            <td>{{ $video->title }}</td>
                                            
                                            
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

@endsection
