@extends('front.master')
@section('title')
   Reporter List
@endsection

@section('body')
    <div class="all-section" style="overflow: hidden;"><!-- All Section-->
        <section class="team-section">
            <div class="container">
                <div class="row">


                    @foreach($reportershome as $reporterh)
                    <div class="themesBazar-4 themesBazar-m2">
                        <div class="team-wrpp">
                            <div class="team-image">
                                <img src="{{asset($reporterh->image)}}" alt="{{$reporterh->name}}">
                            </div>
                            <h1 class="team-name">
                                <a href="{{route('reporter-detail',['id'=>$reporterh->id,'slug'=>$reporterh->slug])}}">{{$reporterh->name}}</a>
                            </h1>
                            <h6 class="team-deg">
                                {{$reporterh->designation}}
                            </h6>
                        </div>

                    </div>
                    @endforeach

                    <div style="text-align: center; display: ruby; margin:20px">  </div>




                </div>


            </div>
        </section>





    </div><!-- All Section Close -->
@endsection
