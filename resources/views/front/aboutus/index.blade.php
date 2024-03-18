@extends('front.master')
@section('title')
    About Us
@endsection

@section('body')
    <div class="create-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="create-pageTitle">
                        <span>  আমাদের সম্পর্কে   </span>
                    </div>

                    <div class="create-page-details">
                        <p>{!! $aboutus->about_us !!}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
