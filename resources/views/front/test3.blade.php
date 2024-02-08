@extends('front.layout')

@section('pagename')
    - {{ __('Test 1') }}
@endsection

@section('meta-description', !empty($seo) ? $seo->home_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->home_meta_keywords : '')

@section('content')
<section class="breadcrumbs-section bg_cover lazy entered loaded" style="background-image: url(&quot;https://exocial.manageprojects.in/assets/front/img/60ea8dcf724d7.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-content text-center">
                        <h1>Contact Us</h1>
                        <ul class="breadcrumbs-link">
                        <li><a href="https://profilo.xyz">Home</a></li>
                        <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="signin-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="{{route('front.index')}}">
                        <img src="https://exocial.manageprojects.in/assets/front/img/home/footer/logo.png" class="img-fluid" alt="">
                    </a>
                    <ul class="mt-4">
                        <li class="pt-3 pb-3">
                            <div class="d-flex align-items-normal">
                                <div class="img-content mr-2">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/contact/chat.png" class="img-fluid" alt="">
                                </div>
                                <div class="text-content">
                                    <h5 class="mb-0 heading">Chat to us</h5>
                                    <p class="sub-heading">Our friendly team is here to help. <br><a href="mailto:hi@itsfolio.com"><b>hi@itsfolio.com</b></a></p>
                                </div>
                            </div>
                        </li>
                        <li class="pt-3 pb-3">
                            <div class="d-flex align-items-normal">
                                <div class="img-content mr-2">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/contact/visit.png" class="img-fluid" alt="">
                                </div>
                                <div class="text-content">
                                    <h5 class="mb-0 heading">Vsiit us</h5>
                                    <p class="sub-heading">Come say hello at our office. <br><a href="mailto:hi@itsfolio.com"><b>hi@itsfolio.com</b></a></p>
                                </div>
                            </div>
                        </li>
                        <li class="pt-3 pb-3">
                            <div class="d-flex align-items-normal">
                                <div class="img-content mr-2">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/contact/call.png" class="img-fluid" alt="">
                                </div>
                                <div class="text-content">
                                    <h5 class="mb-0 heading">Call us</h5>
                                    <p class="sub-heading">Our friendly team is here to help. <br><a href="mailto:hi@itsfolio.com"><b>hi@itsfolio.com</b></a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="social-box">
                        <ul class="social-link">
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/home/footer/facebook.png" class="img-fluid">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/home/footer/instagram.png" class="img-fluid">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/home/footer/linkedin.png" class="img-fluid">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="https://exocial.manageprojects.in/assets/front/img/home/footer/twitter.png" class="img-fluid">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="gradient-box">
                        <h4 class="title">Got ideas? We’ve got <br> the skills. Let’s team up.</h4>
                        <p class="sub-title">Tell us more about yourself and the idea that bought you here.</p>
                        <form>
                            <div class="form_group mb-5">
                                <textarea class="form_control" placeholder="Your name" name="message" required=""></textarea>
                            </div>
                            <div class="form_group">
                                <button class="btn btn-started">Let’s get started</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>              
@endsection