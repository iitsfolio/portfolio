<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>{{ $bs->website_title }}</title>
    <link rel="icon" href="{{ asset('assets/front/img/' . $bs->favicon) }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/forget.css') }}">
</head>


<body>
    @if (Session::has('admin_lang'))
        @php
            app()->setLocale(Session::get('admin_lang'));
            $admin_lang = Session::get('admin_lang');
            $cd = str_replace('admin_', '', $admin_lang);
            $default = \App\Models\Language::where('code', $cd)->first();
        @endphp
    @else
        @php
            $default = \App\Models\Language::where('is_default', 1)->first();
            app()->setLocale('admin_' . $default->code);
        @endphp
    @endif
    <div class="login-page">
        <div class="text-center mb-4">
            <img class="login-logo" src="{{ asset('assets/front/img/' . $bs->logo) }}" alt="">
        </div>
        <div class="form">
            @if (session()->has('success'))
                <div class="alert alert-success fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif
            <form class="login-form" action="{{ route('admin.forget.mail') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="{{ __('Enter email address') }}" />
                @if ($errors->has('email'))
                    <p class="text-danger text-left">{{ $errors->first('email') }}</p>
                @endif
                <button type="submit">{{ __('Send Mail') }}</button>
            </form>

            <p class="back-link">
                <a href="{{ route('admin.login') }}">&lt;&lt; {{ __('Back') }}</a>
            </p>
        </div>
    </div>


    <!-- jquery js -->
    <script src="{{ asset('assets/front/js/jquery-3.3.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

</body>

</html>
