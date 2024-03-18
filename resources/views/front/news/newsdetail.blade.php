@extends('front.master')
@section('title')
     News Detail |
@endsection
<meta name="language" content="bn" />
<meta http-equiv="Content-Language" content="bn" />
<meta name="robots" content="all">
<meta name="googlebot" content="all" />
<meta name="googlebot-news" content="all" />
<meta name="Developer" content="Md Monirul Islam" />
<meta name="Developed By" content="News 16 Tv" />
<meta name="author" content="News 16 Tv" />
<meta name="url" content="{{route('home')}}" />
@section('newsdetailstitle')
    {{$newsdetail->title}}
@endsection
<meta itemprop="name" content="{{$newsdetail->title}}">
<meta itemprop="description" content="{{$newsdetail->mid_content}}">
<meta itemprop="image" content="{{ asset($newsdetail->image) }}">


<meta name="title" content="{{$newsdetail->title}}"/>
<meta name="description" content="{{$newsdetail->mid_content}}">
<meta property="article:type" content="website">
<meta property="article:title" content="{{$newsdetail->title}}">
<meta property="article:url" content="{{request()->url()}}">
<meta property="article:description" content="{{$newsdetail->mid_content}}">
<meta property="article:image" content="{{asset($newsdetail->image)}}">
<meta property="article:published_time" content="{{$newsdetail->created_at->format('Y-m-d h:i:s A, F Y, l')}}" />
<meta property="article:modified_time" content="{{$newsdetail->updated_at->format('Y-m-d h:i:s A, F Y, l')}}" />


<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="news16.tv" />
<meta property="og:title" content=" {{$newsdetail->title}}" />
<meta property="og:description" content="{{$newsdetail->title}}" />
<meta property="og:image" content="{{ asset($newsdetail->image) }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:secure_url" content="{{ asset($newsdetail->image) }}" />
<meta property="og:image:alt" content="{{$newsdetail->title}}" />
<link rel="image_src" href="{{ asset($newsdetail->image) }}">


@php
    $url = request()->url();
    $encodedUrl = urlencode($url);
@endphp

<style>
    @media only screen and (max-width: 767px) {
        .single-social {
            margin-top: 3%;
        }
    }

</style>

@section('body')
    <div class="single-page2" >

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-page2-topAdd">


                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-7 col-md-9">
                    <div class="single-home2">
                        <div class="single-white">
                            <div class="single-home-cat2">
                                <ul>
                                    <li><a href="{{route('home')}}"> <i class="las la-home"></i> প্রচ্ছদ </a> <i class="las la-angle-double-right"></i></li>
                                    <li><a href="#"> Detail </a> <i class="las la-angle-double-right"></i> </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="single-white2 ">
                        <h5 class="single-page2-subTitle">

                        </h5>

                        <h1 class="single-page2-title">
                            {{$newsdetail->title}}
                        </h1>
                        <div class="update-time">

                            <ul>
                                <li>  <a href="#"> <img src="{{asset($newsdetail->reporter->image)}}"> {{$newsdetail->reporter->name}} </a> </li>
                            </ul>


                            <ul>

                                <li> <i class="lar la-clock"></i>
                                    আপলোড সময় :

                                    {{$newsdetail->created_at->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL')}}

                                </li>
                                @if($newsdetail->updated_date ==!null)
                                    <li> <i class="lar la-clock"></i>
                                        @php
                                            // Parse the updated_date string from the database into a Carbon instance
                                            $updated_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $newsdetail->updated_date);

                                            // Format the date and time using the desired locale and timezone
                                            $formatted_date = $updated_date->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL');
                                        @endphp
                                        <span style="font-size: 95%">আপডেট সময় :
                                        {{$formatted_date}}</span>
                                    </li>
                                @else
                                    <li> <i class="lar la-clock"></i>
                                        আপডেট সময় :
                                        {{$newsdetail->created_at->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL')}}
                                    </li>
                                @endif
                            </ul>

                        </div>
                        <div class="single-image2">
                            <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($newsdetail->image)}}" alt="{{$newsdetail->title}}" title="শ{{$newsdetail->title}}" width="100%" height="auto">
                            <span style="font-style: italic; color: #333;"> {{$newsdetail->	image_caption}} </span>
                        </div>

                        <div class="single-page-add2">


                        </div>

                        <div class="single-content2">
                           {!! $newsdetail->body !!}
                        </div>

                        </br>
                        নিউজটি আপডেট করেছেন : {{ $newsdetail->author_id }}
                        </br></br>




                        <div class="row">
                            <div class="col-lg-9 col-md-9">
                                <script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635cdf45c2d9fb68"></script>

                                <div class="addthis_inline_share_toolbox"></div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="single-social" style="  background: #3b5998; width: 100%; padding: 10px; text-align: center; ">
                                    <a href="{{route('news-print',['id'=>$newsdetail->id,'slug'=>$newsdetail->slug])}}" style="color:white;" target="_blank"> প্রিন্ট করুন : <i class="las la-print"></i></a>
                                </div>
                            </div>

                        </div>

                        <div class="row" >
                            <div class="col-lg-9 col-md-9">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}" target="_blank">
                                    <img src="{{asset('/')}}front/templateimage/facebook.png" alt="facebook" style="width: 8%">
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ $encodedUrl }}&text={{ urlencode($newsdetail->title) }}" target="_blank">
                                    <img src="{{asset('/')}}front/templateimage/twitter.png" alt="twitter" style="width: 8%">
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?url={{ $encodedUrl }}" target="_blank">
                                    <img src="{{asset('/')}}front/templateimage/linkedin.png" alt="linkedin" style="width: 8%">
                                </a>
                                <a href="whatsapp://send?text={{ urlencode($newsdetail->title) }} - {{ $encodedUrl }}" target="_blank">
                                    <img src="{{asset('/')}}front/templateimage/whatsapp.png" alt="whatsapp" style="width: 8%">
                                </a>
                            <!-- <a href="javascript:void(0);" id="copy-button">
                                    <img src="{{ asset('/') }}front/templateimage/link.png" alt="Copy link" style="width: 8%" title="Copy Link">
                                </a> -->
                                <script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-635cdf45c2d9fb68"></script>

                                <div class="addthis_inline_share_toolbox"></div>
                            </div>

                        </div>

                        <div style="margin-top: 20px; border-bottom: 1px solid #ddd; padding: 8px 0px;"> কমেন্ট বক্স </div>

                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="../../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=334182264340964&autoLogAppEvents=1"></script>
                        <div class="fb-comments" data-href="" data-width="100%" data-numposts="5"></div>





                    </div>


                    <!-- Author start -->
                    <div class="author">

                        <div class="author-content">

                            <h6 class="author-caption">
                                <span> প্রতিবেদকের তথ্য  </span>
                            </h6>

                            <div class="author-image">
                                <img src="{{asset($newsdetail->reporter->image)}}" alt="{{$newsdetail->reporter->name}}">
                            </div>

                            <h1 class="author-name">
                                {{$newsdetail->reporter->name}}
                            </h1>

                            <div class="author-title">
                                <strong><a href="{{route('reporter-detail',['id'=>$newsdetail->reporter->id,'slug'=>$newsdetail->reporter->slug])}}"> প্রতিবেদকের সকল নিউজ </a></strong>
                            </div>


                        </div>




                    </div>


                    <!-- Author End -->

                    <!--======== Related news start ========-->
                    <div class="related-section">
                        <div class="related-new-cat">
                            <span><a href="#"> এ জাতীয় আরো খবর </a></span>
                        </div>
                        <div class="single-white">
                            <div class="related-news-content2"> <!--Related News start-->
                                <div class="row">


                                    @foreach($samenewses as $samenews)
                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="related-news-wrpp2"> <!--Related Wrpp start-->
                                            <div class="relatedImage2">
                                                <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($samenews->image)}}" alt="{{$samenews->title}}" title="{{$samenews->title}}">

                                            </div>
                                            <h4 class="relatedTitle2"><a href="{{route('news-detail',['id'=>$samenews,$samenews->slug])}}">{{$samenews->title}} </a></h4>

                                        </div> <!--Related Wrpp End-->
                                    </div>
                                    @endforeach


                                </div>





                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-2 col-md-3 order-first">
                    <div class="fixrd-sitber" style="position: sticky; top: 0;">
                        <div class="single-white ">
                            <div class="latest-title">
                                <i class="fas fa-map-marker-alt"></i>  সর্বশেষ সংবাদ
                            </div>
                            <div class="single-itemContent">
                                <div class="row">


                                    @foreach($leatestnews10 as $leatest10)
                                    <div class="themesBazar-1 themesBazar-m2">
                                        <div class="single-drack-bg">
                                            <div class="single-left">
                                                <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($leatest10->image)}}" alt="{{$leatest10->title}}" title="{{$leatest10->title}}">


                                            </div>
                                            <h4 class="leftSitbe-title"><a href="{{route('news-detail',['id'=>$leatest10->id,'slug'=>$leatest10->slug])}}">{{$leatest10->title}}</a>

                                            </h4>

                                        </div>

                                    </div>
                                    @endforeach




                                </div>


                                <div class="seingle2-sitebarAdd2">


                                </div>




                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8">
                    <div class="fixrd-sitber" style="position: sticky; top: 0;">

                        <div class="single-white">




                            <div class="popular-cat">
                                আলোচিত সংবাদ
                            </div>

                            <div class="popular-content"> <!--Popular Content-->
                                <div class="row">



                                    @foreach($popular_newses10 as $popular_news10 )
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="popular-wrpp"> <!--Popular Wpp Start-->
                                            <div class="rightSitbear-image2">
                                                <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($popular_news10->image)}}" alt="{{$popular_news10->title}}" title="{{$popular_news10->title}}">



                                            </div>
                                            <h4 class="rSitebar-title2"><a href="{{route('news-detail',['id'=>$popular_news10->id,'slug'=>$popular_news10->slug])}}"> {{$popular_news10->title}}</a></h4>
                                        </div> <!--Popular Wpp End-->

                                    </div>
                                    @endforeach

                                </div>




                            </div>


                        </div>

                        <div class="seingle2-sitebarAdd2">


                        </div>

                    </div>


                </div>
            </div>
        </div>


    </div>
@endsection
