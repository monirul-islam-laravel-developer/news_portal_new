@extends('front.master')
@section('title')
    Photo Gallery
@endsection

@section('body')
    <section class="photoArchive-page">
        <div class="container">

            <div class="photoArchive-page-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="archive-info-cats">
                            <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> ফটোগ্যালারী
                        </div>

                        <div class="row">


                            @foreach($photogalleries as $photo)
                            <div class="themesBazar-4 themesBazar-m2">
                                <div class="photoArchive-page-wrpp">
                                    <div class="photoArchive-page-image">
                                        <a class="photoArchive-pageIcon themesbazar" href="{{asset($photo->image)}}">  <i class="las la-camera"></i>
                                            <img src="{{asset($photo->image)}}" alt="পাহাড়পুর বৌদ্ধ বিহার, রাজশাহী"></a>
                                    </div>
                                    <div class="photoArchive-page-title">
                                        <a href="#"> পাহাড়পুর বৌদ্ধ বিহার, রাজশাহী  </a>
                                    </div>

                                </div>
                            </div>
                            @endforeach






                        </div>

                        <div style="text-align: center; display: ruby; margin : 20px">  </div>

                    </div>

                </div>


            </div>




        </div>
    </section>
@endsection
