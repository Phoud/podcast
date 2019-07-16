@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ລາຍລະອຽດຂໍ້ຄວາມຕິດຕໍ່</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"><strong>ຊື່</strong>: {{ $contact->name }}</h5>
                        <h5 class="card-header"><strong>ທີ່ຢູ່ອີເມວ</strong>: {{ $contact->email }}</h5>
                        <h5 class="card-header"><strong>ຫົວຂໍ້</strong>: {{ $contact->subject }}</h5>
                        <h5 class="card-header"><strong>ລາຍລະອຽດ</strong>:  {{ $contact->message }}</h5>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection