@extends('front.layout')

@section('pagename')
    - {{ __('Test 2') }}
@endsection

@section('meta-description', !empty($seo) ? $seo->home_meta_description : '')
@section('meta-keywords', !empty($seo) ? $seo->home_meta_keywords : '')
@section('content')
<section class="breadcrumbs-section bg_cover lazy entered loaded" style="background-image: url(&quot;https://exocial.manageprojects.in/assets/front/img/60ea8dcf724d7.jpg&quot;);">
    <div class="container">
        <div class="row">
             <div class="col-lg-12">
                <div class="breadcrumbs-content text-center">
                    <h1>All Profiles</h1>
                    <ul class="breadcrumbs-link">
                       <li><a href="https://profilo.xyz">Home</a></li>
                       <li class="active">Profiles</li>
                     </ul>
                </div>
             </div>
        </div>
    </div>
</section>

<section class="saas-featured-users search-wrapper">
    <div class="container">
        <div class="search-filter">
            <form action="{{ route('front.user.view') }}">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="search-box"> 
                            <input type="text" class="form_control" placeholder="Search by first name, last name, username" name="search" value="{{ request()->input('search') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="search-box">
                            <input type="text" class="form_control" placeholder="Search by designation" name="designation" value="{{ request()->input('designation') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="search-box">
                            <input type="text" class="form_control" placeholder="Search by city / country" name="location" value="{{ request()->input('location') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="search-box">
                            <button type="submit" class="submit-btn w-100"> {{ $keywords['submit'] ?? __('Submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>         
        </div>
     </div>
</section>
                   
<section class="saas-blog profile-wrapper">
    <div class="container">
        <form>
            <div class="row">
            @if (count($users) == 0)
                    <div class="bg-light text-center py-5 d-block w-100">
                        <h3>NO PROFILE FOUND</h3>
                    </div>
                @else

                    @foreach ($users as $user)
                        <div class="col-md-4">
                            <div class="profile-box">
                                <div class="profile-title">
                                    @if (isset($user->photo))
                                        <img class="lazy loaded rounded-circle img-fluid" data-src="{{ asset('assets/front/img/user/' . $user->photo) }}"
                                            alt="">
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
                                        <li><a href="{{ detailsUrl($user) }}" class="profile-btn"><i class="fas fa-eye"></i> View Profile</a></li>
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
                                            <li><a href="{{ $social->url }}" class="facebook" target="_blank">
                                                <i class="{{ $social->icon }}"></i></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
                  

                <div class="col-md-12">
                    <div class="text-center d-flex justify-content-center">  
                    {{ $users->appends(['search' => request()->input('search'), 'designation' => request()->input('designation'), 'location' => request()->input('location')])->links() }}
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
           

@endsection


































































































