<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$news->title}}</title>
    <link rel="icon" href="{{asset($logo->desktop_logo)}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/line-awesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/fontawesome.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front/css/primeitworld-style.css" media="all">
    <link rel="stylesheet" type="text/css" href="https://75bangladesh.com/wp-content/themes/primeitworldnewspro/style.css" media="all">
    <style> @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@300;400;600;700;900&display=swap'); </style>
    <style>
        #News_Print_Page {
            max-width: 1140px;
            background-color: #fff;
            color: #000;
            width: 960px;
            padding: 20px;
            border: 1px solid #e3e3e3;
            margin: 10px auto 38px;
            font-family: sans-serif;
        }
        .print_page_header {
            margin-bottom: 20px;
        }
        .print_page_header .logo {
            margin-bottom: 10px;
            width: 90%;
            display: flex;
            justify-content: right;
        ;
        }
        .print_page_header .logo img {
            width: 80%;
            height: 120px;
        }
        .print_page_header .date_row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .print_page_header .date {
            width: calc(100% - 300px);
            font-size: 18px;
            line-height: 34px;
            background: #ee142f;
            color: #fff;
            display: flex;
            justify-content: center;
        }
        .print_page_header .date_row .day, .print_page_header .date_row .kal {
            width: 150px;
            background: #008200;
            color: #fff;
            font-size: 18px;
            line-height: 34px;
            display: flex;
            justify-content: center;
        }
        .print_page_header .date_row span {
            display: block;
        }
        .print_page_content .title {
            font-size: 33px;
            font-weight: 600;
            color: #B90101;
            line-height: 1.3;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
        }
        .print_page_content .single_meta {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .print_page_content .single_meta span {
            font-size: 20px;
            line-height: 35px;
        }
        .print_page_content .content {
            font-size: 20px;
            column-count: 3;
            text-align: justify;
        }
        .print_page_content .content .thumbnail {
            position: relative;
            top: 7px;
        }
        .print_page_content .content img {
            width: 100%;
            margin-bottom: 15px;
            display: block;
        }
        .print_page_content .content .thumbnail img {
            margin-bottom: 25px;
        }
        .print_page_content .content p {
            margin-bottom: 7px;
        }
        .print_page_footer .copyright {
            display: flex;
            justify-content: space-between;
        }
        .print_page_footer .copyright p {
            font-size: 20px;
            margin: 0;
        }
        .print_page_footer .editorial {
            font-size: 22px;
        }
        .print_page_footer .editorial strong {
            font-weight: 600;
        }
        #News_Print_Page .devider {
            width: 100%;
            height: 1px;
            background: #bbb9b9;
            margin: 15px 0;
        }
        .printPage_btn_area {
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        .printPage_btn_area .print_btn, .printPage_btn_area .Image_btn {
            font-size: 17px;
            padding: 7px 10px 5px 10px;
            background: #ff0218;
            display: inline-block;
            color: #fff;
            min-width: 160px;
        }
        .printPage_btn_area .Image_btn {
            background: green;
        }
        .printPage_btn_area .print_btn i, .printPage_btn_area .Image_btn i {
            margin-right: 6px;
        }
        @media print{
            a[href]:after{
                content:""
            }
            .printPage_btn_area{
                display:none
            }
        }
        @media only screen and (max-width: 991px) {
            .printPage_btn_area .print_btn, .printPage_btn_area .Image_btn {
                font-size: 42px;
                padding: 12px 15px 10px 15px;
                width: 44%;
            }
            .print_page_header .date_row .day, .print_page_header .date_row .kal, .print_page_header .date {
                font-size: 22px;
                line-height: 38px;
            }
        }
    </style>
</head>
<body>
<body data-pin-hover="true" class="print-page">
<div id="News_Print_Page" class="container">
    <div class="print_page_header">
        <a href="{{route('home')}}">
            <div class="logo">
                <img src="{{asset($logo->desktop_logo)}}" alt="Logo">
            </div>
        </a>

        <div class="date_row">
            <div class="day"> <span>{{$currentDay}}</span></div>
            <div class="date">
                {{$currentDate}}
            </div>
            <div class="kal"><span> {{$news->getBengaliTerm()}}</span></div>

        </div>
    </div>
    <div class="print_page_content">
        <h1 class="title">{{$news->title}}</h1>
        <div class="single_meta">
               <span class="reporter">
{{--                                             <img src="" width="400">--}}

                   {{$news->reporter->name}},{{$news->reporter->designation}}  ।।            </span>
            <span class="time"><i class="fas fa-clock"></i></i> প্রকাশিত: {{$news->created_at->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL')}},</span>
            <br><br><br>
        </div>

        <div class="content">
            <div class="thumbnail">
                <img width="1600" height="270" src="{{asset($news->image)}}" alt="" >
            </div>
            {!! strip_tags( $news->body, '<br><p><ul><li><h1><h2><h3><h4><h5><h6><strong><em><b><i><u><blockquote><hr>') !!}

        </div>
    </div>
    <div class="print_page_footer">
        <div class="devider"></div>
        <div class="editorial">
            <p><strong>সম্পাদক ও প্রকাশকঃ</strong> {{$cantact->publisher}} <strong>
                    <strong>ফোন:{{$cantact->mobile}}</strong>
                    <strong>ইমেইল:{{$cantact->email}}</strong></p>


        </div>
        <div class="devider"></div>
        <div class="copyright">
            <p></p>
{{--            <p>© সর্বস্বত্ব সংরক্ষিত © <a href="https://www.news16.tv/">News 16</a></p>--}}
            <p>Developed by : <a target="blank" href="https://monirulbd.com">monirulbd.com</a></p>
        </div>
    </div>
</div>
<div class="printPage_btn_area">
    <a class="print_btn" href="#" onclick="window.print();"><i class="fas fa-print"></i> প্রিন্ট করুন</a><a id="Image_btn" class="Image_btn" href="#"><i class="fa-solid fa-file-arrow-down"></i> ছবি ডাউনলোড করুন</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>
    $(document).ready(function () {
        var element = $("#News_Print_Page"); // global variable
        var getCanvas; //global variable
        html2canvas(element, {
            onrendered: function (canvas) {
                getCanvas = canvas;
            }
        });

        $("#Image_btn").on('click', function () {
            var imgageData = getCanvas.toDataURL("image/png");
            //Now browser starts downloading it instead of just showing it
            var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#Image_btn").attr("download", "{{$news->title}}.png").attr("href", newData);
        });
    });
</script>

</body>
</body>
</html>



