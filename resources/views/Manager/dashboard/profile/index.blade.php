
@extends('Manager.included.header')


@section('content')





<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-xl-6">
            <div class="kt-portlet">
                <div class="kt-portlet__body">

                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--user-profile-4">
                        <div class="kt-widget__head">
                            <div class="kt-widget__media">
                                <img class="kt-widget__img kt-hidden-" src="https://f0.pngfuel.com/png/348/800/man-wearing-blue-shirt-illustration-png-clip-art-thumbnail.png" alt="image">
                                <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                    JD
                                </div>
                            </div>
                            <div class="kt-widget__content">
                                <div class="kt-widget__section">
                                    <a  class="kt-widget__username">
                                        {{ $user->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__body">
                            <form action="{{ route('updateProfile') }}" method="post">
                                @csrf
                            <label>إسم المستخدم</label>
                            <input placeholder="إسم المستخدم"  type="text" name="name" value="{{ $user->name  }}" class="form-control  " >
                            <br><br>
                            <label>البريد الإلكتروني</label>
                            <input placeholder="البريد الإلكتروني"  type="text" name="email" value="{{ $user->email  }}" class="form-control  " >
                            <br><br>
                            <label>كلمة المرور</label>
                            <input placeholder="كلمة المرور"  type="password" name="password" class="form-control  " >
                            <br><br>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary " value="تحديث">
                            </div>
                        </form>


                        </div>
                    </div>

                    <!--end::Widget -->
                </div>
            </div>
        </div>


        <div class="col-md-3"></div>

    </div>
</div>


@endsection

