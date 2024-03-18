@extends('front.master')
@section('title')
    Reporter Detail
@endsection
@section('body')
    <div class="all-section" style="overflow: hidden;"><!-- All Section-->
        <section class="single-team">
            <div class="container">
                <div class="single-teamContent">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="team-Twrpp">
                                <div class="singel-teamImage">
                                    <img src="{{asset($singlereporter->image)}}" alt="{{$singlereporter->name}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="team-singleItem">
                                <h5 class="tSingle-name">
                                    {{$singlereporter->name}}
                                </h5>

                                <h6 class="single-deg">
                                    {{$singlereporter->designation}}
                                </h6>


                                <div class="team-details">
                                </div>

                                </br>
                                <div class="single-Tsocial">
                                    <div class="author-title">
                                        <strong><a href="{{route('reporter-allnews',['id'=>$singlereporter->id,'slug'=>$singlereporter->slug])}}"> প্রতিবেদকের সকল নিউজ </a></strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







    </div><!-- All Section Close -->
@endsection
