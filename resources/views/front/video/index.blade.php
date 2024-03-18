@extends('front.master')
@section('title')
    Video Gallery
@endsection

@section('body')
    <section class="videoGallery-page">
        <div class="container">
            <div class="archive-info-cats">
                <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> ভিডিও গ্যালারী
            </div>

            <div class="video-page-content">
                <div class="row">


                    @foreach($videos as $video)
                    <div class="themesBazar-4 themesBazar-m2">
                        <div class="video-page-wrpp">
                            <div class="video-page-image">
                                <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($video->image)}}">
                                <a href="{{$video->link}}" class="video-pageIcon popup"> <i class="las la-video"></i>  </a>

                            </div>
                            <div class="video-page-title">
                                <a href="{{$video->link}}">{{$video->title}}</a>
                            </div>

                        </div>
                    </div>

                    @endforeach


                    <div style="text-align: center; display: ruby; margin:20px">  </div>





                </div>





            </div>





        </div>
    </section>
@endsection
