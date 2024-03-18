<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="AnchorBarta">
    <meta name="csrf-token" content="GyMtLxk7RgHUPGL1bQxwfSHRjMlHPXkFVsBKE3Es">


    <title>@yield('title')</title>
    <meta name="keyword" content="জাহাজ, বন্দর, নৌযান, লাইটার জাহাজ, সিমেন্ট, ইস্পাত, শীপ, শিপিং, মাদার ভেসেল, ড্রেজার, ফিশিং ভেসেল, ডিজেল, নদী, সাগর, newspaper, online news, paper">
    <meta name="description" content="বাংলাদেশসহ বিশ্বের সর্বশেষ সংবাদ শিরোনাম, প্রতিবেদন, বিশ্লেষণ, খেলা, বিনোদন, চাকরি, রাজনীতি ও বাণিজ্যের বাংলা নিউজ পড়তে ভিজিট করুন।">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('newsdetailstitle')" />
    <meta property="og:description" content="Popular Online Newspaper of Bangladesh"/>
    <meta property="og:image" content="{{asset($logo->desktop_logo)}}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="This Is Twitter Share Title" />
    <meta name="twitter:description" content="Popular Online Newspaper of Bangladesh" />
    <meta name="twitter:image" content="{{asset($logo->desktop_logo)}}" />
    <meta name="brand_name" content="This Is Twitter Share Title" />
    <meta name="twitter:creator" content="@themesbazar">
    <meta name="twitter:site" content="@themesbazar">


    <link rel="icon" href="{{asset('/')}}frontend/templateimage/20240307_160400.png">

    <!-- Css Link Start    -->
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/stellarnav.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/responsive.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}frontend/style.css">
</head>
<script>
    function convertToBanglaNumeral(num) {
        var banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        var str = num.toString();
        var converted = '';
        for (var i = 0; i < str.length; i++) {
            var digit = parseInt(str[i]);
            converted += banglaNumbers[digit];
        }
        return converted;
    }
    // function to convert a Gregorian date to Bangla date
    function getBanglaDate(gregorianDate) {
        // array of Bengali month names
        var banglaMonths = [
            'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
        ];
        var banglaMonthsShort = [
            'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
        ];
        // subtract 593 from the Gregorian year to get the Bengali year
        var bengaliYear = gregorianDate.getFullYear() - 593;
        // get the Bengali month index (0-based) by subtracting 4 from the Gregorian month
        var bengaliMonthIndex = gregorianDate.getMonth() - 4;
        if (bengaliMonthIndex < 0) {
            bengaliMonthIndex += 12;
            bengaliYear--;
        }
        var bengaliMonth = banglaMonths[bengaliMonthIndex];
        var bengaliMonthShort = banglaMonthsShort[bengaliMonthIndex];
        // get the Bengali day of the month by adding 16 to the Gregorian day
        var bengaliDayOfMonth = gregorianDate.getDate() + 16;
        if (bengaliDayOfMonth > 31) {
            bengaliDayOfMonth -= 31;
            bengaliMonthIndex++;
        }
        // check if the Bengali month index is out of range (0-11)
        if (bengaliMonthIndex > 11) {
            bengaliMonthIndex -= 12;
            bengaliYear++;
        }
        bengaliMonth = banglaMonths[bengaliMonthIndex];
        bengaliMonthShort = banglaMonthsShort[bengaliMonthIndex];
        // return the Bangla date in the format "DD MonthName YYYY"
        bengaliYear = convertToBanglaNumeral(bengaliYear);
        bengaliDayOfMonth = convertToBanglaNumeral(bengaliDayOfMonth);
        return bengaliDayOfMonth + ' ' + bengaliMonthShort + ' ' + bengaliYear;
    }
    // function to get the current time in 12-hour format with সকাল দুপুর বিকাল রাত
    function getCurrentTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var meridian = ''; // initialize meridian variable
        if (hours >= 0 && hours < 6) {
            meridian = 'রাত';
            hours = hours + 12;
        } else if (hours >= 6 && hours < 12) {
            meridian = 'সকাল';
        } else if (hours >= 12 && hours < 16) {
            meridian = 'দুপুর';
        }else if (hours >= 16 && hours < 18) {
            meridian = 'বিকাল';
        }else if (hours >= 18 && hours < 22) {
            meridian = 'সন্ধ্যা';
        }else {
            meridian = 'রাত';
            hours = hours - 12;
        }
        minutes = convertToBanglaNumeral(minutes);
        seconds = convertToBanglaNumeral(seconds);
        hours = hours % 12;
        hours = hours ? convertToBanglaNumeral(hours) : '১২';
        // hours = hours  // set hour to 12 if it's 0
        var timeString = hours + ':' + (minutes < 10 ? '0' + minutes : minutes) + ':' + (seconds < 10 ? '0' + seconds : seconds) + ' ' + meridian;
        return timeString;
    }


    // function to get the current day of the week in Bengali
    function getCurrentDay() {
        var banglaDays = ['রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার', 'শনিবার'];
        var banglaDayIndex = new Date().getDay();
        var banglaDay = banglaDays[banglaDayIndex];
        return banglaDay;
    }

    // set the current time, date, and day of the week every second
    setInterval(function() {
        var currentTime = getCurrentTime();
        var currentDate = new Date();
        var banglaDate = getBanglaDate(currentDate);
        var currentDay = getCurrentDay();
        document.getElementById('time').innerHTML = currentTime;
        // document.getElementById('date').innerHTML = banglaDate;
        document.getElementById('date').innerHTML = banglaDate +' '+'বঙ্গাব্দ'+ ' | ' + currentDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        document.getElementById('days').innerHTML = currentDay;
    }, 1000);
</script>






<!--=============== Header section Start ========================-->
<header class="themesbazar_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="date">
                    <i class="lar la-calendar"></i>

                    <span id="time"></span> |
                    <span id="date"></span> |
                    <span id="days"></span>


                </div>



            </div>

            <div class="col-lg-3 col-md-3">
                <form class="header-search" method="get" action="https://themebazar.xyz/laraflash/news/post/search">
                    <input type="hidden" name="_token" value="GyMtLxk7RgHUPGL1bQxwfSHRjMlHPXkFVsBKE3Es">                        <input type="text" name="search"  placeholder="এখানে লিখুন">
                    <button type="submit" value="খুজুন"> <i class="las la-search"></i> </button>
                </form>


            </div>
            <div class="col-lg-4 col-md-4">
                <div class="header-social">
                    <ul>
                        <li><a href="#"> <i class="lab la-facebook-f"></i> </a></li>
                        <li><a href="#"> <i class="lab la-twitter"></i> </a></li>
                        <li><a href="#"> <i class="lab la-linkedin-in"></i> </a></li>
                        <li><a href="#"> <i class="lab la-youtube"></i> </a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--=============== Logo banner section Start ========================-->
    <section class="logo-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href={{route('home')}}> <img src="{{asset($logo->desktop_logo)}}" alt="LaraCrush"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner">
                        <a href="https://www.monirulbd.com/" target="_blank"><img src="{{asset('/')}}frontend/templateimage/20240307_020816.jpg" alt="LaraCrush"></a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============== Logo banner section End ========================-->



</header>
<!--=============== Header section End ========================-->





<!--=======================
                        Menu-section-Start
                    ==========================-->
<div class="menu_section" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mobileLogo">
                    <a href={{route('home')}}> <img src="{{asset($logo->mobile_logo)}}" alt="LaraCrush"></a>
                </div>
                <h1 class="stellarnav">
                    <ul>
                        <li class="current-item"><a href={{route('home')}}> <i class="las la-home"></i> </a></li>

                        @foreach($categories1 as $category)
                        <li><a href="{{route('catagory-news',['id'=>$category->id,$category->slug])}}" >{{$category->category_name}}</a>
                           @if(count($category->subCategory)>0)
                                <ul>
                                    @foreach($category->subCategory as $subcategory)
                                        <li><a href="{{route('sub-category-news',['id'=>$subcategory->id,'slug'=>$subcategory->slug])}}" >{{$subcategory->name}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif
                            @endforeach


                        </li>


                        <li><a href="#" >আরো</a>

                            <ul>
                                @foreach($categories2 as $category2)
                                <li><a href="{{route('catagory-news',['id'=>$category2->id,$category2->slug])}}" >{{$category2->category_name}}</a>
                                    @endforeach


                                </li>


                            </ul>
                        </li>

                    </ul>
                </h1><!-- .stellarnav -->
            </div>




        </div>
    </div>

</div>
<!--=======================
                        Menu-section-End
                    ==========================-->



<div class="top-scroll-section5">
    <div class="container">

        <div class="alert" role="alert">
            <div class="scroll-section5">
                <div class="row">
                    <div class="col-md-12 top_scroll2">
                        <div class="scroll5-left">
                            <div id="scroll5-left">
                                <span> সংবাদ শিরোনাম :  </span>
                            </div>

                        </div>

                        <div class="scroll5-right">
                            <marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">


                                @foreach($headlines as $headline)
                                <a href="{{route('news-detail',['id'=>$headline->id,'slug'=>$headline->slug])}}"> <i class="las la-bullseye"></i> {{$headline->title}} </a>
                                @endforeach

                            </marquee>
                        </div>
                        <div class="scroolbar5">
                            <button data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--============Scroll 05 End==============-->

@yield('body')










<!--=======================
                        ThemesBazar-section-one-start
                    ==========================-->

{{--                            footer-area start--}}
{{--                        ==========================-->--}}
<footer class="footer-area">
    <div class="container">


        <div class="footer-menu">
            <ul>
                <li><a href="{{route('aboutus')}}" > আমাদের সম্পর্কে </a></li>
                <li><a href="{{route('videogallery')}}" > ভিডিও গ্যালারী </a></li>
                <li><a href="{{route('photogallery')}}" > ফটোগ্যালারী </a></li>
                <li><a href="{{route('reporter')}}" > আমাদের পরিবার </a></li>
                <li><a href="{{route('all-news')}}" > সকল নিউজ </a></li>

            </ul>
        </div>



        <div class="footerColor">

            <div class="row">


                <div class="col-lg-12 col-md-12">



                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <h3 class="footer-title">
                                সম্পাদকীয় :
                            </h3>
                            <div class="footer-content">
                                <p align="left">সম্পাদক ও প্রকাশক : {{$cantact->publisher}}</p><p align="left">নির্বাহী সম্পাদক : {{$cantact->executive}}<br></p><p align="left">বার্তা সম্পাদক : {{$cantact->editor}}</p><p align="left"><br></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h3 class="footer-title">
                                অফিস :
                            </h3>
                            <div class="footer-content">
                                <p align="left">অফিস : {{$cantact->	address}}</p><p align="left">ইমেইল : {{$cantact->email}}</p><p align="left">মোবাইল : {{$cantact->mobile}}<br></p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="copy_right_section">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copy-right">
                            © All rights reserved © Lara Crush
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="design-developed">
                            NewsScript Developed BY  <a href="https://www.monirulbd.com/" target="_blank" title="monirulbd.com"><h1>monirulbd.com</h1></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="scrollToTop"><i class="las la-long-arrow-alt-up"></i></a>

    </div>
</footer>



<!--=======================
                            footer-area-End
                        ==========================-->

<div class="footer-scrool">
    <div class="footer-scrool-1">
        <span>নোটিশ </span>
    </div>

    <div class="footer-scrool-2">

        <a href="#"><marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">

                @foreach($notices as $notice)<i class="lar la-dot-circle">{{$notice->title}}</i> @endforeach </marquee>

        </a>

    </div>
</div>





















<script src="{{asset('/')}}frontend/assets/js/jquery-3.5.1.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/stellarnav.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/jquery-ui.js"></script>
<script src="{{asset('/')}}frontend/assets/js/lazyload.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/main.js"></script>
</body>

</html>




