@extends('front.master')
@section('title')
    All News
@endsection
@section('body')
    <section class="date-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">




                    <div class="date-page-content">

                        <div class="archive-info-cats">
                            <a href="{{route('home')}}"><i class="la la-home"> </i> </a>  <i class="la la-chevron-right"></i> All Latest News
                        </div>

                        <div class="row">


                            @foreach($allnewses as $allnews)
                            <div class="custom-col4">
                                <div class="date-page-wrpp">
                                    <div class="date-image">
                                        <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($allnews->image)}}" alt="{{$allnews->title}}" title="{{$allnews->title}}">



                                    </div>
                                    <h4 class="datePage-title">
                                        <a href="{{route('news-detail',['id'=>$allnews->id,'slug'=>$allnews->slug])}}"> {{$allnews->title}}</a>
                                    </h4>

                                    <div class="date-meta">
                                        <a href="#"><i class="las la-tags"> </i>  ১১ মাস আগে
                                        </a>
                                    </div>

                                </div>

                            </div>
                            @endforeach






                        </div>




                        <div style="text-align: center;  display: block ruby;"> <nav>
                                <ul class="pagination">

                                    {{ $allnewses->links('pagination::bootstrap-4', ['prev_text' => 'Previous', 'next_text' => 'Next']) }}


                                </ul>
                            </nav>
                        </div>






                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection
