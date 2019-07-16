
@extends('admin.common.main')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ລາຍງານສື່ທີ່ຖືກດາວໂຫຼດຫຼາຍທີ່ສຸດ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ຈໍານວນດາວໂຫຼດທັງໝົດ</h5>
                        <a class="btn btn-outline-primary" href="{{ route('topdownloadReportGenerate') }}" style="position:absolute;right:20px;top:5px;">Export</a>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ລາຍການ</th>
                                            <th class="border-0">ປະເພດ</th>
                                            <th class="border-0">ຈໍານວນດາວໂຫຼດ</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($media as $me)
                                        <tr>
                                            <td>{{ $me->id }}</td>
                                            <td>{{ $me->title }}</td>
                                            <td>{{ $me->mediaType }}</td>
                                            <td>{{ $me->download_count }}</td>
                                            
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
