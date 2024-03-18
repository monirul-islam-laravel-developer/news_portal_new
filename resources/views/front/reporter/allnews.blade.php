@extends('front.master')
@section('title')
    Reporter All News
@endsection
@section('body')
    <section class="author-page">
        <div class="container">


            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">



                        @foreach($allnewses as $allnews)
                        <div class="custom-col-6">
                            <div class="author-wrpp">
                                <div class="authorNews-image">
                                    <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($allnews->image)}}" alt="যুক্তরাজ্যভিত্তিক গ্লোবাল ব্র্যান্ডস ম্যাগাজিন পুরস্কার ২০২২ জিতল ‘নগদ’" title="যুক্তরাজ্যভিত্তিক গ্লোবাল ব্র্যান্ডস ম্যাগাজিন পুরস্কার ২০২২ জিতল ‘নগদ’">


                                </div>
                                <div class="authorPage-content">
                                    <h2 class="authorPage-title">
                                        <a href="{{route('news-detail',['id'=>$allnews->id,'slug'=>$allnews->slug])}}"> {{$allnews->title}}</a>
                                    </h2>
                                    <div class="author-date">
                                        <a href="#"> {{$singlereporter->name}} </a> <span> <i class="las la-clock"></i>
                                            @php
                                                // Parse the created_at date into a Carbon instance
                                                $created_at = \Carbon\Carbon::parse($allnews->created_at);

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
  </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach



                            <div style="text-align: center;  display: block ruby;"> <nav>
                                    <ul class="pagination">

                                        {{ $allnewses->links('pagination::bootstrap-4', ['prev_text' => 'Previous', 'next_text' => 'Next']) }}


                                    </ul>
                                </nav>
                            </div>






                    </div>



                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="fixd-sitebar" style="position: sticky; top: 0;">

                        <div class="authorPage-content">
                            <figure class="authorPagee-image">
                                <img src="{{asset($singlereporter->image)}}" alt="{{$singlereporter->name}}" width="100%">
                            </figure>

                            <h1 class="authorPage-name">
                                <a href="#">{{$singlereporter->name}}</a>
                            </h1>

                            <span style="text-align : center; display: block;"> সর্বমোট নিউজ </span>


                        </div>


                        <div class="authorCat-title">
                            <span> সর্বশেষ সংবাদ </span>
                        </div>

                        <div class="authorPopular_item">





                            @foreach($leatestnews20 as $lnews20)
                            <div class="authorPopular-wrpp">
                                <div class="authorPopular-image">
                                    <img class="lazyload" src="{{asset($logo->desktop_logo)}}" data-src="{{asset($lnews20->image)}}" alt="{{$lnews20->title}}" title="{{$lnews20->title}}">



                                    <div class="authorPopular-content">
                                        <h4 class="authorPopular-title">
                                            <a href="{{route('news-detail',['id'=>$lnews20->id,'slug'=>$lnews20->slug])}}"> {{$lnews20->title}}</a>
                                        </h4>
                                        <h6 class="authorPopular-date">
                                            <i class="las la-clock"></i>
                                            @php
                                                // Parse the created_at date into a Carbon instance
                                                $created_at = \Carbon\Carbon::parse($lnews20->created_at);

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
                                        </h6>
                                    </div>

                                </div>

                            </div>
                            @endforeach








                        </div>



                        <figure class="siteber-add">


                        </figure>




                    </div>
                </div>








            </div>





        </div>
    </section>
@endsection
