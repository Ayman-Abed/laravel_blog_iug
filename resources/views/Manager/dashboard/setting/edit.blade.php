@extends('Manager.included.header')


@section('content')


    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">


            <div class="col-md-12">


                @if ($errors->count() > 0)
                    @foreach ($errors->all() as $error)

                        <div class="alert alert-dismissible fade show" style="background-color:#e43b62;color:white"
                             role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>تنبيه : </strong> {{ $error }}.
                        </div>
                @endforeach

            @endif




            <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                تعديل البيانات

                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="{{ route('setting.update', $setting->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <br><br><br>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> الشعار</label>

                                    <div></div>
                                    <div class="custom-file">

                                        <input name="logo" type="file" class="form-control-file image">
                                        <br>
                                        <img src="{{ asset($setting->logo) }}"
                                             class="img-fluid img-thumbnail image_preview" width="100" height="100">
                                        <br>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>  الشعار المصغر</label>

                                    <div></div>
                                    <div class="custom-file">

                                        <input name="miniLogo" type="file" class="form-control-file image2">
                                        <br>
                                        <img src="{{ asset($setting->miniLogo) }}"
                                             class="img-fluid img-thumbnail image_preview2" width="100"
                                             height="100">
                                        <br>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        <br><br><br>


                        <div class="row">
                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <div class="kt-portlet__body">

                                        <div class="form-group">
                                            <label>إسم المدونة </label>
                                            <input value="{{ $setting->blog_name }}" type="text" name="blog_name"  class="form-control" aria-describedby="emailHelp"
                                            placeholder="إسم المدونة">
                                        </div>




                                    <div class="form-group">
                                        <label>العنوان</label>

                                        <input type="text" value="{{ $setting->address }}"
                                                name="address" class="form-control"
                                                placeholder="العنوان">
                                    </div>



                                    <div class="form-group">
                                        <label>إنستقرام </label>

                                        <input value="{{ $setting->instagram }}" type="text" name="instagram"
                                                class="form-control" aria-describedby="emailHelp"
                                                placeholder="إنستقرام">
                                    </div>


                                    <div class="form-group">
                                        <label>لينكد إن </label>

                                        <input value="{{ $setting->linkedin }}" type="text" name="linkedin"
                                               class="form-control" aria-describedby="emailHelp"
                                               placeholder="لينكد إن">
                                    </div>

                                    <div class="form-group">
                                        <label>البريد الإلكتروني </label>

                                        <input value="{{ $setting->email }}" type="text" name="email"
                                               class="form-control"
                                               aria-describedby="emailHelp" placeholder="البريد الإلكتروني">
                                    </div>




                                </div>


                            </div>

                            <div class="col-md-3">
                                <div class="kt-portlet__body">

                                        <div class="form-group">
                                            <label>الوصف </label>
                                            <input value="{{ $setting->description }}"
                                            type="text" name="description"  class="form-control" aria-describedby="emailHelp"
                                            placeholder="الوصف">
                                        </div>


                                    <div class="form-group">
                                        <label>فيس بوك </label>

                                        <input value="{{ $setting->facebook }}" type="text" name="facebook"
                                               class="form-control" aria-describedby="emailHelp"
                                               placeholder="فيس بوك">
                                    </div>

                                    <div class="form-group">
                                        <label>تويثر </label>

                                        <input value="{{ $setting->twitter }}" type="text" name="twitter"
                                               class="form-control" aria-describedby="emailHelp"
                                               placeholder="تويثر">
                                    </div>


                                    <div class="form-group">
                                        <label>واتس أب</label>

                                        <input value="{{ $setting->whatsapp }}" type="text" name="whatsapp"
                                               class="form-control" aria-describedby="emailHelp"
                                               placeholder="واتس أب">
                                    </div>


                                    <div class="form-group">
                                        <label>رقم الجوال</label>

                                        <input value="{{ $setting->phone }}" type="text" name="phone"
                                               class="form-control"
                                               aria-describedby="emailHelp" placeholder="رقم الجوال">
                                    </div>

                                </div>


                            </div>

                            <div class="col-md-3"></div>

                        </div>


                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="kt-form__actions">
                                    <button type="submit" class="btn btn-primary">تحديث</button>
                                    <a href="{{ route('dashbaord') }}">
                                        <button type="button" class="btn btn-secondary">
                                            إالغاء
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>


                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->


                <!--end::Portlet-->
            </div>


        </div>
    </div>

@endsection
