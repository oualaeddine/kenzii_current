<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sintex product landing page template">
    <meta name="author" content="ThemeEaster">

    <title>Dar lbrikol | كاميرا شاومي</title>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/font-awesome.min.css')}}">
    <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/themify-icons.css')}}">
    <!-- Elegant Font Icons CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/elegant-font-icons.css')}}">
    <!-- Elegant Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/elegant-line-icons.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/bootstrap.min.css')}}">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/venobox/venobox.css')}}">
    <!-- Slicknav CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/slicknav.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/animate.min.css')}}">
    <!-- OWL-Carousel CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/owl.carousel.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/main.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('mi/css/responsive.css')}}">

    <style>

    .cookiealert {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0 !important;
            z-index: 999999;
            opacity: 1;
            visibility: visible;
            border-radius: 0;
            transform: translateY(0%);
            transition: all 500ms ease-out;
            color: #ecf0f1;
            background: #212327;
    }

    </style>

    <script src="{{asset('mi/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

    @include('OldStoreFront::partials.facebook_pixel')

</head>
<body data-spy="scroll" data-target="#navmenu" data-offset="70">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


<header id="header" class="header-section">
    <div class="container">
        <nav class="navbar">
            <a href="#" class="navbar-brand"><img src="{{asset('mi/img/logo.png')}}" alt="darlbricole"></a>
            <div class="d-flex menu-wrap">
                <div id="navmenu" class="mainmenu">
                    <a href="{{route('product.checkout')}}?store_product=18" class="default-btn">أطلب الأن</a>
                </div>
            </div>
        </nav>
    </div>
</header><!-- Header Section-->

<section id="home" class="hero-section bd-bottom">
    <div class="container">
        <div class="row d-flex align-items-center">

            <div class="col-md-4">
                <img src="{{asset('mi/img/camera360.png')}}" class="hero-cam" alt="">
            </div>

            <div class="col-md-8">
                <div class="hero-content text-right">
                    <h1> <b style="color:#ff6700;">(2021)</b> كاميرا الحماية والمراقبة<br> من شاومي بزاوية تصوير 360 درجة </h1>
                    <p>1080p FHD | رؤية 360 درجة | رؤية ليلية بالأشعة تحت الحمراء | كشف الحركة بالذكاء الاصطناعي |
                        مكالمة ثنائية الاتجاه | إمكانيات تثبيت متعددة
                    </p>


                    <div>
                        <h2 dir="rtl" style="color:#ff6700;font-size: 52px;"> 13,600.00 <span> دج </span> <strike style="color:#807f7f;font-size: 36px;" >17,400.00 <span> دج </span></strike></h2> 
                        <h3 class="text-secondary " style="margin-top: -10px;">مليون و300 و60  ألف</h3>
                    </div>

                    <a href="{{route('product.checkout')}}?store_product=18" class="default-btn btn-shaky" style="max-height: 45px; margin-top: 10px;">أطلب الأن</a>


                </div>
            </div>

        </div>

        <!-- <img src="img/hero-cam.png" class="hero-cam" alt=""> -->
        <!-- <div class="hero-cam"></div> -->
    </div>
</section><!-- Hero Section-->

<section class="promo-section bg-grey bd-bottom padding">
    <div class="container">
        <div class="promo-wrap row">
            <div class="col-lg-3 col-sm-6 sm-padding">
                <div class="promo-content text-center" style="height: 243px;">
                    <i class="icon-camera"></i>
                    <h3>دقة الكاميرا</h3>
                    <p> . جودة صورة مثالية. مع 2.0 ميجا بكسل ودقة 1080 بكسل ونطاق ديناميكي واسع ، حتى الخلفيات البعيدة
                        واضحة ومفصلة</p>
                </div>
            </div><!-- Promo 1 -->
            <div class="col-lg-3 col-sm-6 sm-padding">
                <div class="promo-content text-center" style="height: 243px;">
                    <i class="icon-speedometer"></i>
                    <h3>التحكم بالسرعة</h3>
                    <p> تحقق من منزلك من أي مكان وقم بتسجيل الفيديو بسرعة </p>
                    <span>2x / 4x / 16x</span>
                </div>
            </div> <!-- Promo 2 -->
            <div class="col-lg-3 col-sm-6 sm-padding">
                <div class="promo-content text-center" style="height: 243px;">
                    <i class="icon-adjustments"></i>
                    <h3>تحكم قوي وسهل</h3>
                    <p>يمكنك التحكم بالكاميرا وكل مايتعلق بها عن طريق تطبيق شاومي للمنزل </p>
                </div>
            </div><!-- Promo 3 -->
            <div class="col-lg-3 col-sm-6 sm-padding">
                <div class="promo-content text-center" style="height: 243px;">
                    <i class="icon-bargraph"></i>
                    <h3>التخزين</h3>
                    <p>تدعم شريحة الذاكرة حتى 64 جيغا للتخزين, كما تدعم الأرشفة .</p>
                </div>
            </div> <!-- Promo 4 -->

        </div>
    </div>
</section><!-- Promo Section-->

<section id="features" class="feature-section padding">
    <div class="container">
        <div class="section-heading text-center">
            <h2> ميزات مذهلة</h2>
            <p>كاميرا شاومي المنزلية هي أداة بصرية لالتقاط صور فائقة الجودة</p>
        </div>
        <div class="feature-wrap row"  style="margin-top:100px;">
            <div class="col-lg-4 col-6">
                <ul class="feature-content feature-left text-right">
                    <li>
                        <h3>اتصال سريع</h3>
                        <p> أسرعة إتصال عن طريق الهاتف أينما كنت</p>
                    </li>
                    <li class="center">
                        <h3>ميكروفون</h3>
                        <p>ميكروفون عالي الجودة لدقة صوت متناهية</p>
                    </li>
                    <li>
                        <h3>زر إعادة التشغيل</h3>
                        <p>زر لإعادة التشغيل في كل وقت</p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 offset-lg-4 col-6">
                <ul class="feature-content feature-right text-left">
                    <li>
                        <h3>مكبر صوت مرتفع </h3>
                        <p>مكبر صوت بجودة عالية و صوت مرتفع.</p>
                    </li>
                    <li class="center">
                        <h3>الكاميرا</h3>
                        <p>فتحة عدسة 1.8 ومستشعر بجودة عالية</p>
                    </li>
                    <li>
                        <h3>زر الطاقة</h3>
                        <p>زر الطاقة لتشغيل الكاميرا</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="feature-cam" style="margin-top:50px;"></div>
    </div>
</section><!-- Feature Section -->

<section id="works" class="how-it-works-section padding">
    <div class="container">
        <div class="how-wrap row">
            <div class="col-md-4 col-sm-6 xs-padding">
                <div class="how-content text-center">
                    <i class="icon-anchor"></i>
                    <h3>حمل تطبيق شاومي</h3>
                    <p>قم بتحميل تطبيق شاومي للمنزل و تثبيته على هاتفك</p>
                    <div class="arrow"></div>
                </div>
            </div><!-- Item-1 -->
            <div class="col-md-4 col-sm-6 xs-padding">
                <div class="how-content text-center">
                    <i class="icon-adjustments"></i>
                    <h3>ضبط الإعدادات</h3>
                    <p>قم بتوصيل التطبيق مع الكاميرا وضبط الإعدادات</p>
                    <div class="arrow"></div>
                </div>
            </div><!-- Item-1 -->
            <div class="col-md-4 col-sm-6 xs-padding">
                <div class="how-content text-center">
                    <i class="icon-happy"></i>
                    <h3>ياي ! تم</h3>
                    <p>الأن يمكنك الإستمتاع بتجربة رائعة مع كاميرا شاومي</p>
                </div>
            </div><!-- Item-3 -->
        </div>
    </div>
</section><!-- How It Works Section -->

<section class="content-section bd-bottom padding">
    <div class="container">
        <div class="content-wrap row">

            <div class="col-md-6 xs-padding text-center">
                <img src="{{asset('mi/img/content-bg-1.jpg')}}" alt="img">
            </div>

            <div class="col-md-6 xs-padding text-right">
                <div class="content-details">
                    <h2>تصميم أنيق <br> لوحة خيارات قوية للغاية</h2>
                    <p>تتميز كاميرا شاومي بتصميمها المتناسق والجميل .كما تتميز أيضا ب بساطة لوحة التحكم الخاصة بها
                        وسهولة ضبط الإعدادات</p>
                    <a href="{{route('product.checkout')}}?store_product=18" class="default-btn btn-shaky">أطلب الأن</a>
                </div>
            </div>

        </div>
    </div>
</section><!-- Content Section -->


<section id="faq" class="faq-section bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-40">
            <h2>الأسئلة الأكثر شيوعا ؟</h2>

        </div>
        <div class="faq-wrap row text-right">
            <div class="col-md-6 padding-15">
                <h3 dir="rtl">1. كيف أقوم بتشغيلها ؟</h3>
                <p dir="rtl"> تقوم بتنزيل التطبيق الخاص بشاومي للمنزل من متجر غوغل ثم تقوم بتثبيته على هاتفك . بعد ذلك
                    تقوم بإختيار إضافة جهاز بعدها تختار عن طريق الكود بار . بعد فحصه والإتصال بالنت تقوم ب إتباع
                    التعليمات حتى الخطوة الأخيرة .</p>
            </div>
            <div class="col-md-6 padding-15">
                <h3 dir="rtl">2. كيف يمكنني شراء الكاميرا وهل يوجد توصيل ؟</h3>
                <p dir="rtl"> يمكنك طلب كاميرا شاومي لحماية المنزل عن طريق ضغط زر طلب الأن و ملئ إستمارة المعلومات
                    الخاصة بك كما انه متوفر التوصيل لجميع الولايات والدفع عند الإستلام .</p>
            </div>
            <div class="col-md-6 padding-15">
                <h3 dir="rtl">3. هل يمكن سماع الصوت وتتبع الحركة ؟</h3>
                <p dir="rtl">نعم تحتوي كاميرا شاومي على مكبر صوت و ميكرفون بجودة عالية و جودة صوت ممتازة . كما تحتوي
                    كاميرا شاومي على متتبع حركة دقيق جدا يعمل بالذكاء الإصطناعي .</p>
            </div>
            <div class="col-md-6 padding-15">
                <h3 dir="rtl">4. كيف تعمل كاميرا شاومي ؟ </h3>
                <p dir="rtl">تعمل كاميرا شاومي عن طريق الواي فاي و الإتصال الدائم بالكهرباء .وتقوم بالتصوير بدقة 1080
                    بجودة FHD مما يجعل كاميرا شاومي ذات جودة رائعة و صور واضحة وتفاصيل دقيقة .</p>
            </div>
        </div>
    </div>
</section><!-- ./Faq Section -->


<section class="cta-section">
    <div class="container">
        <div class="row cta-content">
            <div class="col-md-6  xs-padding">
                <a href="{{route('product.checkout')}}?store_product=18" class="default-btn btn-shaky">أطلب الأن</a>
            </div>

            <div class="col-md-6 xs-padding text-right">
                <h2>أحد أقوى المنتجات التي يحتاجها كل منزل </h2>
            </div>

        </div>
    </div>
</section><!-- ./CTA Section -->

<div class="widget-section padding">
    <div class="container">
        <div class="widget-content text-center">
            <img class="mb-20" src="{{asset('mi/img/logo.png')}}" alt="img">
            <p>نساعدك دائما على تحسين منزلك عن طريق أحدث وأقوى المنتجات . يمكنك التواصل معنا عبر حساباتنا </p>
            <p>او عن طريق الهاتف : <span style="color: #ff6700; font-weight: bold;">0770496866</span></p>
            <ul class="social-share">
                <li><a href="https://www.facebook.com/darlbricole"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div><!-- ./Widget Section -->

<footer class="footer-section align-center">
    <div class="container">
        <p>&copy; 2021 Powered by Dar lbricole دار البريكول</p>
    </div>
</footer><!-- /Footer Section -->

@include('dentairestore::partials.cookies')



<a data-scroll href="#home" id="scroll-to-top"><i class="arrow_carrot-up"></i></a>

<!-- jQuery Lib -->
<script src="{{asset('mi/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('mi/js/vendor/bootstrap.min.js')}}"></script>
<!-- Tether JS -->
<script src="{{asset('mi/js/vendor/tether.min.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{asset('mi/js/vendor/jquery.slicknav.min.js')}}"></script>
<!-- OWL-Carousel JS -->
<script src="{{asset('mi/js/vendor/owl.carousel.min.js')}}"></script>
<!-- Smooth Scroll JS -->
<script src="{{asset('mi/js/vendor/smooth-scroll.min.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('mi/js/main.js')}}"></script>

<script>

    /***end to do*/
    
    $allow_cookies = localStorage.getItem('AllowCookiesMiCamera') || false;
    
    if( $allow_cookies == 'true'){
        $('.cookiealert').hide();
    }else{
        $('.cookiealert').show();
    }
    
    $('.acceptcookies').on('click',function(){
        localStorage.setItem('AllowCookiesMiCamera', true);
        $('.cookiealert').hide();
    })
    
    // hide cookies end 
    
    </script>

</body>
</html>