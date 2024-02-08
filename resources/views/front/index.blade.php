@extends('front.layout')

@section('pagename')
    - {{ __('Home') }}
@endsection

@section('meta-description', !empty($seo) ? $seo->home_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->home_meta_keywords : '')

@section('content')

    <!--====== Start Saas-banner section ======-->
    <section class="saas-banner banner-wrapper">
        <div class="shape">
            
            <img data-src="{{ asset('assets/front/img/shape-1.png') }}" class="img-fluid img-1 lazy" alt="">
            
            <img data-src="{{ asset('assets/front/img/shape-2.png') }}" class="img-fluid img-2 lazy" alt="">
        </div>
        <div class="container">
            
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center h-100">
                        <div class="hero-content">
                            <h4 class="title">Itsfolio Helping </h4>
                            <div class="word"></div>
                            <h5 class="mid-title">To Make More Money</h5>
                            <p class="sub-title">Create your portfolio website at your fingertips. <br> No coding or designing skills required.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-img">
                        <img src="{{ asset('assets/front/img/banner/banner-img.png') }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/pricing/" class="start-btn btn">Start For Free</a>
                        <p class="desclaimer-text mb-0">No Credit Card Required</p>
                        <h5 class="mb-2 leader-text">worlds leading Portfolio maker</h5>
                        <div class="d-flex align-items-center justify-content-center">
                            <span><i class=" fal fa-star text-warning fa-2x" aria-hidden="true"></i></span>
                            <span><i class=" fal fa-star text-warning fa-2x" aria-hidden="true"></i></span>
                            <span><i class=" fal fa-star text-warning fa-2x" aria-hidden="true"></i></span>
                            <span><i class=" fal fa-star text-warning fa-2x" aria-hidden="true"></i></span>
                            <span><i class=" fal fa-star text-warning fa-2x" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End Saas-banner section ======-->
    <section class="saas-analysis counter-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h4 class="text-white title">Here's What Our Customers <br> Experienced After Synthesising <br> Itsfolio With There Skills.</h4>
                    <hr class="text-white">
                    <span><i class=" fal fa-star text-warning" aria-hidden="true"></i></span>
                    <span><i class=" fal fa-star text-warning" aria-hidden="true"></i></span>
                    <span><i class=" fal fa-star text-warning" aria-hidden="true"></i></span>
                    <span><i class=" fal fa-star text-warning" aria-hidden="true"></i></span>
                    <span><i class=" fal fa-star text-warning" aria-hidden="true"></i></span>
                    <h6 class="sub-title mt-5">The Platform Was Instrumental On Our 60% Revenue.</h6>
                </div>
                <div  class="col-md-7">
                    <div class="row align-item-center" >
                        <div class="col-lg-4">
                            <div class="counter-box">
                                <div class="img-holder">
                                    <img src="{{ asset('assets/front/img/home/counter/profile-user.png') }}" class="img-fluid">
                                </div>
                                <h2 class="percentage-status">92%</h2>
                                <p class="counter-title">Potential Clients Onbording</p>
                            </div>
                        </div>
                            
                        <div class="col-lg-4"> 
                            <div class="counter-box">
                                <div class="img-holder">
                                    <img src="{{ asset('assets/front/img/home/counter/tick-circle.png') }}" class="img-fluid">
                                </div>
                                <h2 class="percentage-status">87%</h2>
                                <p class="counter-title">Potential Meetings</p> 
                            </div>
                        </div>
                            
                        <div class="col-lg-4">
                            <div class="counter-box">
                                <div class="img-holder">
                                    <img src="{{ asset('assets/front/img/home/counter/icon-verify.png') }}" class="img-fluid">
                                </div>
                                <h2 class="percentage-status">77%</h2>
                                <p class="counter-title">Potential Increased Outreach</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="saas-analysis template-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="title text-center">Amazing Templates that <br> speaks for you </h4>
                    <p class="sub-title text-center">Choose A Template For Your Portfolio Website That Grows With Your Business</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="template-slide mb-5 profile-wrapper pb-0">
                    @if ($users)

                    @foreach ($users as $user)
                        <div class="profile-box">
                            <div class="profile-title">

                                 @if (isset($user->photo))
                                 <img class="lazy loaded rounded-circle img-fluid" alt="" src="{{ asset('assets/front/img/user/' . $user->photo) }}">
 
                                @else
                                    <img data-src="{{ asset('assets/admin/img/propics/blank_user.jpg') }}"
                                        alt="..." class="avatar-img rounded-circle lazy">
                                @endif 
                                <h4 class="user-name">{{ $user->first_name . ' ' . $user->last_name }}</h5>
                                <span class="user-address">{{ $user->city }}, {{ $user->country }}</span> 
                            </div>
                            <div class="user-button">
                                @php
                                    if (!empty($user)) {
                                        $currentPackage = App\Http\Helpers\UserPermissionHelper::userPackage($user->id);
                                        $preferences = App\Models\User\UserPermission::where([['user_id', $user->id], ['package_id', $currentPackage->package_id]])->first();
                                        $permissions = isset($preferences) ? json_decode($preferences->permissions, true) : [];
                                    }
                                @endphp
                                <ul>
                                    <li><a href="/{{ detailsUrl($user) }}" class="profile-btn"><i class="fas fa-eye"></i> View Profile</a></li>
                                    @guest
                                        @if (!empty($permissions) && in_array('Follow/Unfollow', $permissions))
                                            <li>
                                                <a href="{{ route('user.follow', ['id' => $user->id]) }}"
                                                    class="profile-btn"><i class="fal fa-user-plus"></i>{{ __('Follow') }}
                                                </a>
                                            </li>
                                        @endif
                                    @endguest
                                    @if (Auth::check() && Auth::id() != $user->id)
                                        @if (!empty($permissions) && in_array('Follow/Unfollow', $permissions))
                                            <li>
                                                @if (App\Models\User\Follower::where('follower_id', Auth::id())->where('following_id', $user->id)->count() > 0)
                                                    <a href="{{ route('user.unfollow', $user->id) }}"
                                                    class="profile-btn"><i
                                                            class="fal fa-user-minus"></i>{{ __('Unfollow') }}
                                                    </a>
                                                @else
                                                    <a href="{{ route('user.follow', ['id' => $user->id]) }}"
                                                    class="profile-btn"><i
                                                            class="fal fa-user-plus"></i>{{ __('Follow') }}
                                                @endif
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <div class="social-box">
                                <ul class="social-link">
                                    @foreach ($user->social_media as $social)
                                        <li><a href="{{ $social->url }}" class="home-vr-social_media" target="_blank">
                                            <i class="{{ $social->icon }}"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    @endif

                         
                    </div>
                    <!--<div class="template-slide mb-5">
                        <div class="template-item text-center">
                            <div class="template-info">
                                <h5 class="slider-title">E-Commerce</h5>
                            </div>
                            <div class="template-img">
                                <img src="{{ asset('assets/front/img/home/templates/temp1.png') }}" class="img-fluid lazy" alt="template">
                            </div>
                        </div>
                        <div class="template-item text-center">
                            <div class="template-info">
                                <h5 class="slider-title">E-Commerce</h5>
                            </div>
                            <div class="template-img">
                                <img src="{{ asset('assets/front/img/home/templates/temp2.png') }}" class="img-fluid lazy" alt="template">
                            </div>
                        </div>
                        <div class="template-item text-center">
                            <div class="template-info">
                                <h5 class="slider-title">E-Commerce</h5>
                            </div>
                            <div class="template-img">
                                <img src="{{ asset('assets/front/img/home/templates/temp3.png') }}" class="img-fluid lazy" alt="template">
                            </div>
                        </div>
                        <div class="template-item text-center">
                            <div class="template-info">
                                <h5 class="slider-title">E-Commerce</h5>
                            </div>
                            <div class="template-img">
                                <img src="{{ asset('assets/front/img/home/templates/temp2.png') }}" class="img-fluid lazy" alt="template">
                            </div>
                        </div>
                        <div class="template-item text-center">
                            <div class="template-info">
                                <h5 class="slider-title">E-Commerce</h5>
                            </div>
                            <div class="template-img">
                                <img src="{{ asset('assets/front/img/home/templates/temp1.png') }}" class="img-fluid lazy" alt="template">
                            </div>
                        </div>
                        <div class="template-item text-center">
                            <div class="template-info">
                                <h5 class="slider-title">E-Commerce</h5>
                            </div>
                            <div class="template-img">
                                <img src="{{ asset('assets/front/img/home/templates/temp3.png') }}" class="img-fluid lazy" alt="template">
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/pricing/" class="start-btn btn">Start For Free</a>
                        <p class="desclaimer-text mb-0">No Credit Card Required</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="saas-analysis steps-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-white title text-center">Now  Get Serious</h1>
                    <p class="sub-title text-white text-center">Showcase Your Best Work With 3 Simple Steps. And Run Your Business Like A Pro.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="steps-box">
                                <div class="img-holder">
                                    <img src="{{ asset('assets/front/img/home/steps/1.png') }}" class="img-fluid" alt="ideation">
                                </div>
                                <h4 class="step-count">Step 1</h4>
                                <h3 class="title">IDEATION</h3>
                                <p class="sub-title">Choose A Professionally Desigend Template For Your Unique Brand And Objectives. Itsfolio Diverse Styles Cater To Various Fields, Offering A Customizable Foundation For A Compelling Portfolio Website. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="steps-box">
                                <div class="img-holder">
                                    <img src="{{ asset('assets/front/img/home/steps/2.png') }}" class="img-fluid" alt="drag">
                                </div>
                                <h4 class="step-count">Step 2</h2>
                                <h3 class="title">DRAG & DROP</h3>
                                <p class="sub-title"> To Advance In Building Your ITSFOLIO Portfolio.It's Time To Focus On Crafting Captivating Content. Incorporate A Dynamic Mix Of Text,Image,And testimonial To Showcase  Your Professional Journey.This Will Showcase Your Skills And Position You As Ideal Candidate In Your Field. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="steps-box">
                                <div class="img-holder">
                                    <img src="{{ asset('assets/front/img/home/steps/3.png') }}" class="img-fluid" alt="publish">
                                </div>
                                <h4 class="step-count">Step 3</h4>
                                <h3 class="title">PUBLISH</h3>
                                <p class="sub-title">Boom, It Is Now The Perfect Moment To Showcase  Your Professional Narrative And Make It Known To The World. By Simply  Clicking A Button, You Can Lanuch Your Carefully Constructed ITSFOLIO Portfolio Website,Creating A Pathway To Countless Opportunites And Allowing Your Work To Eloquently Demonstrate Your Abilities. </p>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>        
        </div>        
    </section>


    <section class="saas-analysis package-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center title">Choose Your perfect package </h1>
                    <p class="text-center sub-title">Choose A Template For Your Portfolio Website That Grows With Your Business</p>
                </div>
            </div>
            <div class="row">
                @php
                    $packages = \App\Models\Package::where('status', '1')
                        ->where('term', 'monthly')
                        ->get();
                @endphp
                @foreach ($packages as $package)
                    @php
                        $pFeatures = json_decode($package->features);
                    @endphp

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="plan-highlighter">
                            
                            <h5><span>{{  $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}{{ $package->price == 0 ? '0' : $package->price }}{{ $package->price != 0 && $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}</span> / {{ __($package->term) }}</h5>
                            <small>{{ $package->price == 0 ? 'Free Plan' : 'Best for folks in advanced stages.' }}</small>
                        </div>
                        <div class="wrapper">
                            <div class="btn-wrapper">
                                <a href="{{ route('front.register.view', ['status' => 'regular', 'id' => $package->id]) }}" class="try-btn btn btn-block">TRY NOW </a>
                            </div>
                            <ul>
                                @foreach ($allPfeatures as $feature)
                                    <li class="{{ is_array($pFeatures) && in_array($feature, $pFeatures) ? 'checked' : 'unchecked' }}">
                                        @if(is_array($pFeatures) && in_array($feature, $pFeatures))
                                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-times text-black mr-1" aria-hidden="true"></i>
                                        @endif

                                        @if ($feature == 'vCard' && is_array($pFeatures) && in_array($feature, $pFeatures))
                                            @if ($package->number_of_vcards == 999999)
                                                {{ __('Unlimited') }} {{ __('vCards') }}
                                            @elseif(empty($package->number_of_vcards))
                                                0 {{ __('vCard') }}
                                            @else
                                                {{ $package->number_of_vcards }}
                                                {{ $package->number_of_vcards > 1 ? __('vCards') : __('vCard') }}
                                            @endif
                                            @continue
                                        @elseif($feature == 'vCard' && (is_array($pFeatures) && !in_array($feature, $pFeatures)))
                                            {{ __('vCards') }}
                                            @continue
                                        @endif
                                        {{ __("$feature") }}
                                        @if ($feature == 'Plugins')
                                            ({{ __('Google Analytics, Disqus, WhatsApp, Facebook Pixel, Tawk.to') }})
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div> 
                    </div> 
                @endforeach

            </div>
            <!-- <div class="row">
                <div class="col-md-4">
                    <div class="plan-highlighter">
                        <h5><span>$0</span> / Beginner</h5>
                        <small>Free Plan</small>
                    </div>
                    <div class="wrapper">
                        <div class="btn-wrapper">
                            <button type="button" class="try-btn btn btn-block">TRY NOW </button>
                        </div>
                        <ul>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Custom Domain</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Subdomain</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> QR Builder</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> VCards</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Online CV & Export </li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Follow & Unfollow</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Blog</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Portfolio</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Achivements</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Skill</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Service</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Experince</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Testimonial</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Appointment</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Google Analytics</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Disqus</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> WhatsApp</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Facebook Pixel</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Tawk.To</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="plan-highlighter">
                        <h5><span>$11</span> / Month</h5>
                        <small>Best for folks in advanced stages.</small>
                    </div>
                    <div class="wrapper">
                        <div class="btn-wrapper">
                            <button type="button" class="try-btn btn btn-block">TRY NOW </button>
                        </div>
                        <ul>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Custom Domain</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Subdomain</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> QR Builder</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> VCards</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Online CV & Export </li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Follow & Unfollow</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Blog</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Portfolio</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Achivements</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Skill</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Service</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Experince</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Testimonial</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Appointment</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Google Analytics</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Disqus</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> WhatsApp</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Facebook Pixel</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Tawk.To</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="plan-highlighter">
                        <h5><span>$19</span> / Month</h5>
                        <small>Best for folks in advanced stages</small>
                    </div>
                    <div class="wrapper">
                        <div class="btn-wrapper">
                            <button type="button" class="try-btn btn btn-block">TRY NOW </button>
                        </div>
                        <ul>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Custom Domain</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Subdomain</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> QR Builder</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> VCards</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Online CV & Export </li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Follow & Unfollow</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Blog</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Portfolio</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Achivements</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Skill</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Service</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Experince</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Testimonial</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Appointment</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Google Analytics</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Disqus</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> WhatsApp</li>
                            <li><i class="fa fa-times text-black mr-1" aria-hidden="true"></i> Facebook Pixel</li>
                            <li><i class="fa fa-check text-success" aria-hidden="true"></i> Tawk.To</li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </section>


    <section class="saas-analysis testimonial-wrapper">
        <div class="container-fluid">
            <img src="{{ asset('assets/front/img/home/testimonial/g-logo-left.png') }}" class="img-fluid left-img">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="title text-white">We Come Highly recommended</h1>
                            <p class="sub-title text-white">Itsfolio Has Been Instrumental In My Job Search. The Platform Is Easy To Use, And The Finished Product Expectations.Kudos To Support Team For Their Help </p>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="testimonial-slide">
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-info">
                                        <h5 class="slider-title">OLIVER W</h5>
                                    </div>
                                    <div class="testimonial-content">
                                        <p>Itsfolio Has Been Instrumental In My Job Search. The Platform Is Easy To Use, And The Finished Product Expectations.Kudos To Support Team For Their Help</p>
                                    </div>
                                </div>
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-info">
                                        <h5 class="slider-title">OLIVER W</h5>
                                    </div>
                                    <div class="testimonial-content">
                                        <p>Itsfolio Has Been Instrumental In My Job Search. The Platform Is Easy To Use, And The Finished Product Expectations.Kudos To Support Team For Their Help</p>
                                    </div>
                                </div>
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-info">
                                        <h5 class="slider-title">OLIVER W</h5>
                                    </div>
                                    <div class="testimonial-content">
                                        <p>Itsfolio Has Been Instrumental In My Job Search. The Platform Is Easy To Use, And The Finished Product Expectations.Kudos To Support Team For Their Help</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/front/img/home/testimonial/g-logo-right.png') }}" class="img-fluid right-img">
        </div>
    </section>


    <section class="saas-analysis connect-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title">Connect with all yours other platform to create a smooth experince.</h1>
                    <div class="feature-wrapper">
                        <img src="{{ asset('assets/front/img/home/connect/arrow.png') }}" class="img-fluid">
                        <p class="p-1">More Then 5+ Tools You Already Use</p>
                        <p class="p-2">Yes We Do Integrate With Twitter</p>
                    </div>
                    <button type="button" class="start-btn btn mt-5"> Get Started Now</button>
                </div>
                <div class="col-md-6">
                    <div class="img-wrapper">
                        <img src="{{ asset('assets/front/img/home/connect/social.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="saas-analysis category-wrapper">
        <div class="container">
            <div class="title-wrapper text-center mb-5 text-white">
                <h1 class="text-white">Streamline your work for your <br> maximum productivity</h1>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <ul>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Blogs">Blogs</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Tesgtimonials">Testimonials</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Appointments">Appointments</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="CV management">CV management</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Services">Services</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="QR Codes">QR Codes</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Skills">Skills</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Payment Gateways">Payment Gateways</li>
                        <li> <img src="{{ asset('assets/front/img/home/category/true.png') }}" alt="Achievements">Achievements</li>
                    </ul>
                </div>
                <div class="col-lg-5 img-wrap">
                    <img src="{{ asset('assets/front/img/home/category/cat1.png') }}" class="img-fluid cat1">
                    <img src="{{ asset('assets/front/img/home/category/arrow-img.png') }}" class="arrow-img">
                    <img src="{{ asset('assets/front/img/home/category/cat2.png') }}" class="img-fluid cat2">
                </div>
            </div>
        </div>
    </section>


    <section class="saas-analysis support-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="title text-center">Support that's here for you when <br> you need them</h4>
                    <p class="sub-title text-center">Our support team delivers first-class customer support around the clock. <br> we're here to answer any question and help every step of the way.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> 
                    <div class="support-box">
                        <div class="img-contain">
                            <img src="{{ asset('assets/front/img/home/support/phone.png') }}" class="img-fluid">
                        </div>
                        <div class="content ml-2">
                            <h6>Talk with Customer Service</h6>
                            <a href="tel:919911020168" target="_blank">+91 99110 20168</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="support-box">
                        <div class="img-contain">
                            <img src="{{ asset('assets/front/img/home/support/mail.png') }}" class="img-fluid">
                        </div>
                        <div class="content ml-2">
                            <h6>Email your question</h6>
                            <a href="mailto:support@itsfolio.com" target="_blank">support@itsfolio.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="support-inner-wrapper text-center">
                            <h4 class="heading text-center">Start working together <br> effeciently and beautifully</h1>
                            <h6 class="sub-heading text-center"> Our support team delivers first-class customer support around the clock. <br> we’re here to answer any question and help every step of the way.</h6>
                            <button class="start-btn btn mt-4">Get Started Now</button>
                            <p class="desclaimer-text mb-0">*Free Forever. No credit card.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
 