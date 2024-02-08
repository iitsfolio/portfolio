@extends('front.layout')

@section('pagename')
    - {{ __('Content') }}
@endsection

@section('meta-description', !empty($seo) ? $seo->home_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->home_meta_keywords : '')

@section('content')
    <section class="breadcrumbs-section bg_cover lazy entered loaded" style="background-image: url(&quot;{{ asset('assets/front/img/60ea8dcf724d7.jpg') }} &quot;);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-content text-center">
                        <h1>Contact Us</h1>
                        <ul class="breadcrumbs-link">
                        <li><a href="/">Home</a></li>
                        <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="saas-analysis contact-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-information">
                        <div class="info-box">
                            <ul class="info-box-list">
                                <li>
                                    <div class="contact-info-title mb-3">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Address:
                                    </div>
                                    <p><i class="fas fa-map-pin base-color mr-2"></i>India</p>
                                    <p><i class="fas fa-map-pin base-color mr-2"></i>Noida</p>
                                </li>
                                <li> 
                                    <div class="contact-info-title mb-3">
                                        <i class="fas fa-phone mr-2"></i>
                                        Call Us :
                                    </div>
                                    <p>9911020168</p>
                                </li>
                                <li>
                                    <div class="contact-info-title mb-3">
                                        <i class="fas fa-envelope mr-2"></i>
                                        Email Us :
                                    </div>
                                    <p>iitsfolio@gmail.com</p> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        <h4 class="title">Contact Us</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_group mb-5">
                                    <input type="text" class="form_control" placeholder="Full Name" ></input>          
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group mb-5">
                                    <input type="email" class="form_control" placeholder="Email Address" ></input>          
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group mb-5">
                                    <input type="text" class="form_control" placeholder="Subject" ></input>          
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group mb-5">
                                    <textarea class="form_control" placeholder="Message"  ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group mb-5">
                                    <button class="btn submit-btn">Submit</button>
                                </div>
                            </div> 
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
     
   
@endsection
