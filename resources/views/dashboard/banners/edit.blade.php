@extends('dashboard.layout.main')
@section('title','تعديل بنر')
@section('content')
    <div class="content-body">

        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تعديل بنر</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                {!! Form::model($banner,['route'=>['banners.update',$banner],'files'=>true,'method'=>'PUT']) !!}
                                @include('dashboard.banners.form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
