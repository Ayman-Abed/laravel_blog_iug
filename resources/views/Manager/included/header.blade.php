<!DOCTYPE html>
<html lang="ar" dir="rtl">

<!-- begin::Head -->

<head>


    @php

        $setting = App\Setting::first();
    @endphp


	<!--end::Base Path -->
    <meta charset="utf-8" />


    @if (isset($setting))
        <title>{{ $setting->blog_name }}</title>
    @endif


	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta name="csrf-token" content="{{ csrf_token() }}">




	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>



	@if (isset($setting))
	<link rel="shortcut icon" href="{{ asset ($setting->miniLogo)}}" />
	@endif


    {{-- for add currant local for header --}}





<link href="{{ asset('dashboard/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"
    type="text/css" />


<link href="{{ asset('dashboard/assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dashboard/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet"
    type="text/css" />

<link href="{{ asset('dashboard/assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />

<link href="{{ asset('dashboard/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('dashboard/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet"
    type="text/css" />



<link href="{{ asset('dashboard/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dashboard/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />

{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('dashboard/assets/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<link href="{{ asset('dashboard/assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />




<link href="{{ asset('dashboard/assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />

<link href="{{ asset('dashboard/assets/css/demo6/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

<style>
       /* search Go float left from center */
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left;
    }

</style>





<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">



<style>
    body{

        font-size: 14px
    }

    .kt-header__brand{
        background-color: white;
    }



</style>

<script src="https://kit.fontawesome.com/c888a3fd76.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<link href="{{ asset('dashboard/assets/css/demo6/pages/general/invoices/invoice-1.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>



<!-- end::Head -->

<!-- begin::Body -->

<body
	class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
            @if (isset($setting))
                <a href="{{ route('dashbaord') }}">
                    <img src="{{ $setting->logo }}" alt="">
                </a>
            @endif

		</div>
		<div class="kt-header-mobile__toolbar">
			<div class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left"
				id="kt_aside_mobile_toggler"><span></span></div>
			<div class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></div>
			<div class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
					class="flaticon-more"></i></div>
		</div>
	</div>
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
				id="kt_aside">

				<!-- begin:: Aside Menu -->
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
						data-ktmenu-dropdown-timeout="500">
						<ul class="kt-menu__nav ">

                            <li class="kt-menu__item  {{ Request::routeIs('dashbaord') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('dashbaord') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-icon flaticon-dashboard"></i>
                                    <span class="kt-menu__link-text">لوحة التحكم</span>
                                </a>
                            </li>

                            <li class="kt-menu__item  {{ Request::routeIs('user.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('user.index') }}" class="kt-menu__link "><i
                                        class="kt-menu__link-icon flaticon-users-1">
                                    </i>
                                    <span class="kt-menu__link-text">المستخدمين</span>
                                </a>
                            </li>


                            <li class="kt-menu__item  {{ Request::routeIs('category.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('category.index') }}" class="kt-menu__link "><i
                                        class="kt-menu__link-icon flaticon-squares">
                                    </i>
                                    <span class="kt-menu__link-text">التصنيفات</span>
                                </a>
                            </li>

                            <li class="kt-menu__item  {{ Request::routeIs('tag.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('tag.index') }}" class="kt-menu__link "><i
                                        class="kt-menu__link-icon fa fa-tag">
                                    </i>
                                    <span class="kt-menu__link-text">الوسوم</span>
                                </a>
                            </li>

                            <li class="kt-menu__item  {{ Request::routeIs('post.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('post.index') }}" class="kt-menu__link "><i
                                        class="kt-menu__link-icon fa fa-file">
                                    </i>
                                    <span class="kt-menu__link-text">المنشورات</span>
                                </a>
                            </li>



                            <li class="kt-menu__item  {{ Request::routeIs('setting.index') ? 'kt-menu__item--active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('setting.edit', 1) }}" class="kt-menu__link "><i
                                        class="kt-menu__link-icon flaticon2-settings">
                                    </i>
                                    <span class="kt-menu__link-text">الإعدادات</span>
                                </a>
                            </li>


						</ul>
					</div>
                </div>



				<!-- end:: Aside Menu -->
            </div>


			<!-- end:: Aside -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">

					<!-- begin:: Aside -->
					<div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
						<div class="kt-header__brand-logo">
                            @if (isset($setting))
                                <a href="{{ route('dashbaord') }}">
                                    <img src="{{ $setting->logo }}" width="70px" height="70px" alt="">
                                </a>
                            @endif
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- end:: Title -->


					<!-- begin: Header Menu -->
					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
							class="la la-close"></i></button>
					<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
						<div id="kt_header_menu"
							class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
							<ul class="kt-menu__nav ">

								<li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                    <a href="{{ route('dashbaord') }}" class="kt-menu__link ">
                                        <span class="kt-menu__link-text">
                                           لوحة التحكم
                                        </span>
                                    </a>
                                </li>

                                <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">
                                    <a href="{{ route('UI.index') }}" class="kt-menu__link ">
                                        <span class="kt-menu__link-text">
                                           الصفحة الرئيسية
                                        </span>
                                    </a>
                                </li>


							</ul>
						</div>
					</div>

					<!-- end: Header Menu -->

					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">


						<!--end: Search -->






                            <!--begin: User bar -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
                                    <span class="kt-hidden kt-header__topbar-username">Nick</span>
                                    <span class="kt-header__topbar-icon kt-hidden-"><i
                                            class="flaticon2-user-outline-symbol"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">



                                    <!--end: Head -->

                                    <!--begin: Navigation -->
                                    <div class="kt-notification">

                                        <div class="kt-notification__custom kt-space-between">
                                            <a href="{{ route('userProfile') }}">
                                                <span class="badge badge-primary">
                                                        {{ auth()->user()->name }}
                                                </span>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" style="background-color: #ee6161;color:white"
                                                class="btn  btn-sm" >تسجيل خروج</button>
                                            </form>
                                        </div>
                                    </div>

                                    <!--end: Navigation -->
                                </div>
                            </div>

						<!--end: User bar -->


						<!--end: Quick panel toggler -->
					</div>

					<!-- end:: Header Topbar -->
				</div>

				<!-- end:: Header -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">



                    @yield('content')


				</div>




















				<!-- begin:: Footer -->
				<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
					<div class="kt-footer__copyright">
						<script>document.write(new Date().getFullYear());</script>&nbsp;&copy;&nbsp;
                            @if (isset($setting))
                               {{ $setting->blog_name }}
                            @endif

					</div>

				</div>

				<!-- end:: Footer -->
			</div>
		</div>
	</div>

	<!-- end:: Page -->





	<!-- end::Quick Panel -->

	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="flaticon2-up"></i>
	</div>

	<!-- end::Scrolltop -->


	<!-- end::Sticky Toolbar -->







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
	<script src="{{ asset('dashboard/assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
	{{-- <script src="{{ asset('dashboard/assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script> --}}

	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	<script src="{{ asset('dashboard/assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"
		type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"
		type="text/javascript"></script>

	<script src="{{ asset('dashboard/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"
		type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}"
		type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}"
		type="text/javascript"></script>

	<script src="{{ asset('dashboard/assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
	<script src="{{ asset('dashboard/assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>

	<!--end:: Global Optional Vendors -->

	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="{{ asset('dashboard/assets/js/demo6/scripts.bundle.js')}}" type="text/javascript"></script>



	<!--begin::Page Scripts(used by this page) -->



     <!-- DataTables -->
     <script src="{{ asset('dashboard/assets/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{ asset('dashboard/assets/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
     <script src="{{ asset('dashboard/assets/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
     <script src="{{ asset('dashboard/assets/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>



{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<script src="{{ asset('dashboard/assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>





<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}



<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

    $(document).ready(function() {
        $('#summernote1').summernote({
            tabsize: 2,
            height: 300
        });
    });



    $(document).ready(function() {
        $('#summernote2').summernote({
            tabsize: 2,
            height: 300
        });
    });

</script>




<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
        color: black;
    }

</style>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


</script>

<script>
    $(".image").change(function() {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('.image_preview').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    $(".image2").change(function() {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('.image_preview2').attr('src', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);
        }
});






</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datepicker({
            autoclose : true,
            todayHighlight: true,
            orientation: "bottom left",
            format: 'yyyy-mm-dd'
        });
    });
</script>


<script type="text/javascript">
    $(function () {
        $('#datepiker').datepicker({
            format: "mm-yyyy",
            startView: "year",
            minViewMode: "months",
            orientation: "bottom right",

        });
    });
</script>




<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datepicker({
            autoclose : true,
            todayHighlight: true,
            orientation: "bottom left",
            format: 'yyyy-mm-dd'
        });
    });
</script>





@stack('scripts')


	<!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>
