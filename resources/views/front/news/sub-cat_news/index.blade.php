@extends('front.master')
@section('title')
    Subcategory News |
@endsection

@section('body')
    <div class="archive-page2">
        <div class="container">


            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="rachive-info-cats">
                        <a href="{{route('home')}}"><i class="las la-home"> </i> </a>  <i class="las la-angle-right"></i> {{ $postWithSubCategory->name }}
                    </div>

                    <div class="archivePage-content2">
                        <div class="row">
                            @foreach($subcategoryNewses as $subcatnews)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="archivePage-wrpp2">
                                        <div class="archive2-image">
                                            <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($subcatnews->image)}}" alt="{{asset($logo->desktop_logo)}}" title="{{$subcatnews->title}}">



                                        </div>
                                        <h4 class="archivePage2-title">
                                            <a href="{{route('news-detail',['id'=>$subcatnews->id,$subcatnews->slug])}}"> {{$subcatnews->title}} </a>
                                        </h4>

                                        <div class="archive-meta2">
                                            <a href="#"><i class="las la-tags"> </i>
                                                @php
                                                    // Parse the created_at date into a Carbon instance
                                                    $created_at = \Carbon\Carbon::parse($subcatnews->created_at);

                                                    // Get the difference between the created_at date and the current date in human-readable format
                                                    $diff_for_humans = $created_at->locale('bn')->diffForHumans();

                                                    // Create a NumberFormatter instance for Bangla numerals
                                                    $formatter = new NumberFormatter('bn', NumberFormatter::DECIMAL);

                                                    // Replace the English numerals in the diff_for_humans string with Bangla numerals
                                                    $diff_for_humans_bn = preg_replace_callback('/\d+/', function($matches) use ($formatter) {
                                                        return $formatter->format($matches[0]);
                                                    }, $diff_for_humans);
                                                @endphp
                                                {{$diff_for_humans_bn}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                                <div style="text-align: center;  display: block ruby;"> <nav>
                                        <ul class="pagination">

                                            {{ $subcategoryNewses->links('pagination::bootstrap-4', ['prev_text' => 'Previous', 'next_text' => 'Next']) }}


                                        </ul>
                                    </nav>

                            </div>




                        </div>







                    </div>

                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="sitebar-fixd" style="position: sticky; top: 0;"><!-- Fixd Siteber -->





                        <div class="archivePopular">
                            <ul class="nav nav-pills" id="archivePopular-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active"  data-bs-toggle="pill" data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent" aria-selected="false"> সর্বশেষ সংবাদ </div>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular" role="tab" aria-controls="archivePopulars" aria-selected="false"> আলোচিত সংবাদ </div>
                                </li>




                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContentarchive">
                            <div class="tab-pane active show  fade" id="archiveTab_recent" role="tabpanel" aria-labelledby="archiveRecent">
                                <div class="archiveTab-sibearNews">

                                    @foreach($leatestnews20 as $lnews20)
                                        <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($lnews20->image)}}" alt="{{$lnews20->title}}" title="{{$lnews20->title}}">
                                            </div>


                                            <h4 class="archiveTab_hadding"><a href="{{route('news-detail',['id'=>$lnews20->id,$lnews20->slug])}}"> {{$lnews20->title}} </a>

                                            </h4>

                                            <div class="archive-conut">
                                                {{ str_replace(range(0, 9), ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'], $loop->iteration) }}

                                            </div>


                                        </div>
                                    @endforeach



                                </div>




                            </div>


                            <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">
                                <div class="archiveTab-sibearNews">






                                    @foreach($popular_newses as $popular_news)
                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($popular_news->image)}}" alt="{{$popular_news->title}}" title="{{$popular_news->title}}">
                                        </div>


                                        <h4 class="archiveTab_hadding"><a href="{{route('news-detail',['id'=>$popular_news->id,$popular_news->slug])}}"> {{$popular_news->title}}</a>

                                        </h4>

                                        <div class="archive-conut">
                                            {{ str_replace(range(0, 9), ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'], $loop->iteration) }}

                                        </div>


                                    </div>
                                    @endforeach



                                </div>




                            </div>

                        </div>


                        <div class="siteber-add2">


                        </div>

                    </div> <!-- Fixd Siteber End -->


                </div>
            </div>
        </div>
    </div>

@endsection
