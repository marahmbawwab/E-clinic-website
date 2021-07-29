<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <script src="js/custom.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<header class="site-header">
    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between  align-items-center" >
                    <div class="site-branding d-flex align-items-center">
                        <a  style=" text-decoration:none ; font-weight: bolder;font-family: sans-serif"class="d-block" href="index.php" rel="home"><img class="d-block" width="100px"  height="50px"src="images/logo.png" alt="logo"> MEDICAL CLINIC</a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation  d-flex justify-content-end  align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-items-center">
                            <li class="current-menu-item"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About us</a></li>
                            <li><a href="services.php">Departments</a></li>

                            <li><a href="contact.php">Contact us</a></li>

                            <li>   <div class="search-widget">
                                    <form class="flex flex-wrap align-items-center">
                                        <input type="search" placeholder="Search...">
                                        <button type="submit" class="flex justify-content-center align-items-center">Search</button>
                                    </form><!-- .flex -->
                                </div><!-- .search-widget --></li>

                        </ul>
                    </nav><!-- .site-navigation -->

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->

    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap" style="background-image: url('images/picture3.jpg')">
                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1> Welcome To Our<br> Medical Clinic</h1>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>We Care For Your Health Every Moment.
                                        Your health is<br> in the first place.So,Our Team Aims To Deliver High-Quality<br> Services To All Our Customers</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-4">
                                    <a href="logas.php"title="Log-In" class="button gradient-bg">Get Started</a>

                                    <a href="logas.php"class="button gradient-bg">Make An Appointment</a>
                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

        </div><!-- .swiper-wrapper -->

    </div><!-- .hero-slider -->
</header><!-- .site-header -->




<div id="myCarousel" class="carousel slide" style="width: 100%; height:auto;" data-ride="carousel">
    <center> <h1 style=" font-weight: bolder; font-style:italic;color: black;  font-family: Calibri ">Lastest News</h1></center>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <div class="item active">
            <center><img src="images/1.jpg" style="width:35%"> </center>
            <div  >
                <center><h3 style=" font-weight: bolder;color: black ">جهاز الرنين المغناطيسي MRI</h3>
                    <p style="color: black ;font-weight: bolder;font-size: medium">
                        من أكثر الأجهزة المتطورة  في منطقة الشمال، ويمتاز بالسرعة والدقة قي التصوير</p>

                    <p style="color: black ;font-weight: bolder;font-size: medium"> ويقوم  الجهاز بتصوير شرايين الجسم بوضوح وبدقة عالية.</p>

                    <p style="color: black ;font-weight: bolder;font-size: medium"> ويقوم جهاز انين المغناطيسي بتوفير الصور  لمختلف أجزاء الجسم  بدقة عالية.</p>
                </center>
            </div>

        </div>

        <div class="item">
            <center> <img src="images/2.jpg"  style="width:35%">  </center>
            <div >
                <center>   <h3 style="font-weight: bolder;color: black">جهاز تفتيت الحصى</h3>
                    <p style="color: black ;font-weight: bolder;font-size: medium">
                        يقوم الجهاز بتفتيت الحصى عن طريق الموجات التصادمية  بدون أي تدخل جراحي</p>

                    <p style="color: black ;font-weight: bolder;font-size: medium"> وبدون ألم وذلك بإشراف فنية مختصة في هذا المجال وتحت إشراف طبي.</p>

                </center>
            </div>
        </div>

        <div class="item">
            <center> <img src="images/3.jpg"  style="width:35%">  </center>
            <div >
                <center>   <h3 style="font-weight: bolder;color: black">جهاز كشف الأوردة</h3>
                    <p style="color: black ;font-weight: bolder;font-size: medium">
                        هو جهاز عرض يعمل بالأشـعة تحـت الحمراء يظهر خريطة الأوردة</p>

                    <p style="color: black ;font-weight: bolder;font-size: medium"> ويتيح إيجاد الوريد المطلوب بدون عناء..</p>

                </center>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="homepage-boxes" style="background-image: url('images/footer-bg.png')">
    <div class="container" >
        <div class="row">
            <div style=" margin-left: 70px;" class="col-12 col-md-6 col-lg-5 mt-5 mt-lg-0">
                <div   style="width:450px;  height:320px"class="opening-hours">
                    <h2 class="d-flex align-items-center">Opening Hours</h2>

                    <ul class="p-0 m-0">

                        <li>Saturday <span>9.30 - 23.00</span></li>
                        <li>Sunday <span>8.00 - 10.30</span></li>
                        <li>Monday <span>8.00 - 10.30</span></li>

                        <li>Tuesday<span>8.00 - 10.30</span></li>
                        <li>Wednesday <span>8.00 - 10.30</span></li>

                        <li>Thursday <span>9.30 - 23.00</span></li>

                        <li>Friday <span>9.30 - 23.00</span></li>
                    </ul>
                </div>
            </div>

            <div style=" margin-right: 70px;"align="center" class="col-12 col-md-6 col-lg-5 mt-5 mt-lg-0">
                <div  style="width:450px; height:320px"class="opening-hours" >
                    <h2 class="d-flex align-items-center">Quick Contact</h2>

                    <form action="#" >
                        <br>
                        <input type="text" class="footer_contact_input" placeholder=" Your Name" required="required">

                        <input type="email" class="footer_contact_input" placeholder=" Your E-mail" required="required">
                        <br>
                        <br>
                        <textarea cols="43"  rows="5"class="footer_contact_input footer_contact_textarea" placeholder="Enter Your Message Here" required="required"></textarea>
                        <br>
                        <button style="border-radius: 20px;" class="button gradient-bg">send message</button>



                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
</div>


<footer class="footer">
    <div class="footer_bar">
        <div class="container">
            <div class="row">
                <div class="col">

                    <nav class=" d-flex justify-content-start  align-items-start">
                        <p  style="margin-top:20px;"class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                        <p style="margin-top:20px;margin-left:300px;">
                            <a href="#"><img src="images/facebook.png" width="30px"
                                             height="30px" ></a>
                            &nbsp;
                            &nbsp;

                            <a href="#"><img src="images/tw.png" width="30px"
                                             height="30px"></a>
                            &nbsp;
                            &nbsp;
                            <a href="#"><img src="images/in.png" width="30px"
                                             height="30px"></a>
                        </p>
                    </nav><!-- .foot-about -->
                    <!-- .col -->





                </div><!-- .col -->



            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-widgets -->
</footer><!-- .site-footer -->

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/jquery.barfiller.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
</body>
</html>

