
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!-- begin::Head -->
<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    {{-- <base href="../../../../"> --}}

    @php
    // For Get Setting item
        $setting = App\Setting::first();
    @endphp



    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>تسجيل الدخول</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->

    <link href="{{ asset('dashboard/assets/css/demo1/pages/general/login/login-1.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('dashboard/assets/css/demo6/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />



    <script src="https://kit.fontawesome.com/c888a3fd76.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div
                class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

                <!--begin::Aside-->
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
                    style="background-color: #125cca ">
                    <div class="kt-grid__item">

                        <i class="fa fa-user-tie fa-5x text-white"></i>


                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            @if (isset($setting))

                            <h1 class="kt-login__title"> {{$setting->blog_name}}</h1>
                            @endif
                            <h4 class="kt-login__subtitle"></h4>
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright">
                            @if (isset($setting))
                                {{$setting->blog_name}}
                            @endif

                            </div>

                        </div>
                    </div>
                </div>

                <!--begin::Aside-->

                <!--begin::Content-->
                <div
                    class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                    <!--begin::Head-->


                    <!--end::Head-->

                    <!--begin::Body-->
                    <div class="kt-login__body">
                            <!--begin::Signin-->
                            <div class="kt-login__form">
                                <div class="kt-login__title">
                                    <i class="fa fa-user-tie fa-5x text-primary"></i>
                                    <br>
                                    <br>
                                    <h3>تسجيل الدخول</h3>

                                </div>
                                @if ($errors->count() > 0)
                                    @foreach ($errors->all() as $error)

                                        <div class="alert alert-dismissible fade show" style="background-color:#e43b62;color:white" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>تنبيه : </strong> {{ $error }}.
                                        </div>
                                    @endforeach

                                @endif


                                <!--begin::Form-->
                                <form id="form_login" class="kt-form" action="{{ route('login') }}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="البريد الإلكتروني" name="email"
                                            autocomplete="off">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="كلمة المرور" name="password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <!--begin::Action-->
                                    <div class="kt-login__actions">
                                        <button type="submit"
                                            class="btn btn-primary btn-block ">تسجيل الدخول</button>
                                    </div>
                                </form>



                            </div>



                    </div>

                </div>

            </div>
        </div>
    </div>
	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#22b9ff",
					"light": "#ffffff",
					"dark": "#282a3c",
					"primary": "#2488f1",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#df1b4c"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
    </script>




    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('dashboard/assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('dashboard/assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{ asset('dashboard/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"
        type="text/javascript"></script>
    <script src="{{ asset('dashboard/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"
        type="text/javascript"></script>
    <script src="{{ asset('dashboard/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"
        type="text/javascript"></script>


    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('dashboard/assets/js/demo1/scripts.bundle.js')}}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('dashboard/assets/js/demo1/pages/login/login-1.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->





</body>

<!-- end::Body -->

</html>

