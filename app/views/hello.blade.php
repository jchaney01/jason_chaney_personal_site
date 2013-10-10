<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]>
<html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en-US"> <!--<![endif]-->
<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <title>{{$data->meta->title}}</title>

    <meta name="description" content="Mobile web application development"/>

    <!-- Mobile Specifics -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>

    <!-- Mobile Internet Explorer ClearType Technology -->
    <!--[if IEMobile]>
    <meta http-equiv="cleartype" content="on">  <![endif]-->

    <link href="{{URL::asset('css/screen.css')}}" rel="stylesheet">

    <!-- Google Font -->
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>

    <!-- Modernizr -->
    <script src="{{URL::asset('js/modernizr.js')}}"></script>

</head>


<body>

<!-- This section is for Splash Screen -->
<div class="ole">
    <section id="jSplash">
        <div id="circle"></div>
    </section>
</div>
<!-- End of Splash Screen -->

<!-- Homepage Slider -->
<div id="home-slider">
    <div class="overlay"></div>

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="slider-text">
                    <div id="slidecaption"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="control-nav">
        <a id="prevslide" class="load-item"><i class="font-icon-arrow-simple-left"></i></a>
        <a id="nextslide" class="load-item"><i class="font-icon-arrow-simple-right"></i></a>
        <ul id="slide-list"></ul>

        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
        <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

        <div id="logo">
            <a id="goUp" href="#home-slider" title="Jason Chaney | Mobile Web Application Development">Jason Chaney</a>
        </div>

        <nav id="menu">
            <ul id="menu-nav">
                <li><a href="#work">{{$data->portfolio->title}}</a></li>
                <li><a href="#about">{{$data->about->title}}</a></li>
                <li><a href="#process">{{$data->process->title}}</a></li>
                <li><a href="{{URL::route('resume')}}" class="external">Resume</a></li>
                <li><a href="{{URL::asset('downloads/code_samples.zip')}}" class="external">Code Samples</a></li>
                <li><a href="#contact">{{$data->contact->title}}</a></li>
            </ul>
        </nav>

    </div>
</header>
<!-- End Header -->

<!-- Our Work Section -->
<div id="work" class="page">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">{{$data->portfolio->title}}</h2>

                    <h3 class="title-description">{{$data->portfolio->body}}</h3>

                    <div class="page-description">

                    </div>

                </div>
            </div>
        </div>
        <!-- End Title Page -->

        <!-- Portfolio Projects -->
        <div class="row">
            <div class="span12">
                <!-- Filter -->
                <!--                <nav id="options" class="work-nav">-->
                <!--                    <ul id="filters" class="option-set" data-option-key="filter">-->
                <!--                        <li class="type-work">Type of Work</li>-->
                <!--                        <li><a href="#filter" data-option-value="*" class="selected">All Projects</a></li>-->
                <!--                        <li><a href="#filter" data-option-value=".design">Design</a></li>-->
                <!--                        <li><a href="#filter" data-option-value=".illustration">Illustration</a></li>-->
                <!--                        <li><a href="#filter" data-option-value=".photography">Photography</a></li>-->
                <!--                        <li><a href="#filter" data-option-value=".video">Video</a></li>-->
                <!--                    </ul>-->
                <!--                </nav>-->
                <!-- End Filter -->
            </div>

            <div class="span12">
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs">

                            @foreach(get_object_vars($data->portfolio->samples)['sample'] as $sample)
                            <li class="item-thumbs span3 {{$sample->category}}">
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" alt="{{$sample->description}}" title="{{$sample->title}} | {{$sample->client}}"
                                   href="{{URL::asset($sample->image)}}">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-search"></span>
                                </a>
                                <img src="{{URL::asset($sample->thumb)}}">
                            </li>
                            @endforeach

                        </ul>
                    </section>

                </div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->

<!-- About Section -->
<div id="about" class="page-alternate">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">{{$data->about->title}}</h2>

                    <h3 class="title-description">{{$data->about->subtitle}}</h3>

                    <div class="page-description">
                        {{$data->about->body}}
                    </div>
                </div>
            </div>
        </div>

        <!-- People -->
        <div class="row">

            <!-- Start Profile -->
            <div class="span4 profile">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <span class="overlay-text-thumb">That's an iPod on my wrist</span>
                    </div>
                    <img src="{{$data->about->freetime->dad->image}}" alt="Jason Chaney">
                </div>
                <h3 class="profile-name">{{$data->about->freetime->dad->title}}</h3>

                <p class="profile-description">{{$data->about->freetime->dad->body}}</p>

<!--                <div class="social">-->
<!--                    <ul class="social-icons">-->
<!--                        <li><a href="http://twitter.com/jchaney01" target="_blank"><i-->
<!--                                    class="font-icon-social-twitter"></i></a></li>-->
<!--                        <li><a href="http://www.linkedin.com/in/jchaney01/" target="_blank"><i-->
<!--                                    class="font-icon-social-linkedin"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
            <!-- End Profile -->

            <!-- Start Profile -->
            <div class="span4 profile">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <span class="overlay-text-thumb">Bike trailer + Segway = fun</span>
                    </div>
                    <img src="{{$data->about->freetime->technology->image}}" alt="Technology">
                </div>
                <h3 class="profile-name">{{$data->about->freetime->technology->title}}</h3>

                <p class="profile-description">{{$data->about->freetime->technology->body}}</p>
            </div>
            <!-- End Profile -->

            <!-- Start Profile -->
            <div class="span4 profile">
                <div class="image-wrap">
                    <div class="hover-wrap">
                        <span class="overlay-img"></span>
                        <span class="overlay-text-thumb">Yes, this is my real workstation</span>
                    </div>
                    <img src="{{$data->about->freetime->code->image}}" alt="Jason Workstation">
                </div>
                <h3 class="profile-name">{{$data->about->freetime->code->title}}</h3>

                <p class="profile-description">{{$data->about->freetime->code->body}}</p>
            </div>
            <!-- End Profile -->

        </div>

        <!-- End People -->
    </div>
</div>
<!-- End About Section -->

<!-- Big Blockquote -->
<div class="big-quote page">
    <div class="container">
        <div class="row">
            <div class="span12">
                <p>Jason is a technical genius and a man of integrity. He is passionate about his work and consistently
                    brings in projects on time and on budget. I am constantly amazed at the ideas he generates and his
                    ability to execute them as well. I would highly recommend him and the Creative Acceleration team.</p>
                <div class="author">Brian Glassford, Emergent Productions</div>
                <span class="font-icon-blockquote"></span>
            </div>
        </div>
    </div>
</div>
<!-- End Big Blockquote -->

<!-- Process Section -->
<div id="process" class="page-alternate">
<div class="container">
<!-- Title Page -->
<div class="row">
    <div class="span12">
        <div class="title-page">
            <h2 class="title">My Process</h2>

            <h3 class="title-description">What separates me from other developers?</h3>

            <div class="page-description">
                {{$data->process->body}}
            </div>

        </div>
    </div>
</div>

<!-- End Title Page -->

<div class="row margin-40">
    <div class="span9">

        @foreach(get_object_vars($data->process->points)['point'] as $point)
        <h3>{{$point->headline}}</h3>
        <p>{{$point->body}}</p>
        @endforeach

        <p>&nbsp;</p>

        <h3>{{$data->process->close}}</h3>
    </div>

    <div class="span3">
        <div class="icon hidden-phone">
            <span style="font-size: 14em" class="icon-html5 icon-5x"></span>
        </div>
    </div>
</div>

<div class="sep">
<!--    <span class="separator"></span>-->
</div>

<!-- Services Boxes -->
<div class="row">
    <div class="span6">
        <div class="services-box">
            <div class="icon">
                <span class="icon-mobile-phone icon-5x"></span>
            </div>
            <h3>Responsive</h3>

            <p>{{$data->oneoffs->responsive}}</p>
        </div>
    </div>

    <div class="span6">
        <div class="services-box">
            <div class="icon">
                <span class="font-icon-layer icon-4x"></span>
            </div>
            <h3>Full Stack</h3>

            <p>{{$data->oneoffs->fullstack}}</p>
        </div>
    </div>
</div>
    <div class="row">
        <div class="span12" style="text-align: center">
            <a href="{{URL::route('resume')}}" class="button">Resume</a>
        </div>
    </div>
<!-- End Services Boxes -->

</div>
</div>
<!-- End Services Section -->

<!-- Google Map -->
<div id="map-area">
    <div class="map" id="map_1" data-mapLat="44.881871" data-mapLon="-123.066144" data-mapZoom="11"
         data-mapTitle=""></div>
</div>
<!-- End Google Map -->

<!-- Contact Section -->
<div id="contact" class="page">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">{{$data->contact->title}}</h2>

                    <h3 class="title-description">{{$data->contact->subtitle}}</h3>

                    <div class="page-description">

                    </div>
                </div>
            </div>
        </div>
        <!-- End Title Page -->

        <!-- Contact Form -->
        <div class="row">
            <div class="span9">

                <form id="contact-form" class="contact-form">
                    {{Form::token()}}
                    <p class="contact-name">
                        <input id="contact_name" type="text" placeholder="Full Name" value="" name="name"/>
                    </p>


                    <p class="contact-email">
                        <input id="contact_email" type="text" placeholder="Email Address" value="" name="email"/>
                    </p>

                    <p class="contact-message">
                        <textarea id="contact_message" placeholder="Your Message" name="message" rows="15"
                                  cols="40"></textarea>
                    </p>

                    <p class="contact-submit">
                        <button type="submit" id="contact-submit" class="submit">Send</button>
                    </p>

                    <div id="response">

                    </div>
                </form>

            </div>

            <div class="span3">
                <div class="contact-details">
                    <h3>The Details</h3>
                    <ul>
                        <li><a href="mailto:{{$data->contact->email}}">{{$data->contact->email}}</a></li>
                        <li>{{$data->contact->phone}}</li>
                        <li>
                            {{$data->contact->company}}
                            <br>
                            {{$data->contact->address}}
                            <br>
                            {{$data->contact->city}}, {{$data->contact->state}} {{$data->contact->zip}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Services Form -->
    </div>
</div>
<!-- End Contact Section -->

<!-- Twitter Feed -->
<div id="twitter-feed" class="page-alternate">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="follow">
                    <a href="https://twitter.com/jchaney01" title="Follow Me on Twitter" target="_blank"><i
                            class="font-icon-social-twitter"></i></a>
                </div>

                <div id="ticker" class="query">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Twitter Feed -->

<!-- Socialize -->
<div id="social-area" class="page">
    <div class="container">
        <div class="row">
            <div class="span12">
                <nav id="social">
                    <ul>
                        <li><a href="https://twitter.com/jchaney01" title="Follow Me on Twitter" target="_blank"><span
                                    class="font-icon-social-twitter"></span></a></li>
                        <li><a href="http://www.linkedin.com/in/jchaney01" title="Follow Me on LinkedIn"
                               target="_blank"><span class="font-icon-social-linkedin"></span></a></li>
                        <li><a href="http://meetthechaneys.com" title="Follow Me on my Blog"
                               target="_blank"><span class="icon-code"></span></a></li>
                        <li><a href="http://www.youtube.com/user/donglekrack" title="Follow Me on YouTube"
                               target="_blank"><span class="icon-youtube-sign"></span></a></li>
                    </ul>
                </nav>



            </div>
        </div>
    </div>
</div>
<!-- End Socialize -->

<!-- Footer -->
<footer>
    <p class="credits">&copy;{{Date("Y")}} Jason Chaney<br>Built with <a href="http://laravel.com/">Laravel</a> and <a href="http://twitter.github.io/bootstrap/">Bootstrap</a></p>
</footer>
<!-- End Footer -->

<!-- Back To Top -->
<a id="back-to-top" href="#">
    <i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->

<!-- Js -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<!-- Google Map API -->
<script src="{{URL::asset('js/app.js')}}"></script>
<!-- Default JS -->
<!-- End Js -->

</body>
</html>