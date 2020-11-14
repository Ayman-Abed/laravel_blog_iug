
@extends('Manager.included.header')


@section('content')


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-md-12">
            @include('Manager.included.notfication')
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">

                                إضافة وسم

                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form autocomplete="off" id="form_item" class="kt-form ajax_form" action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="kt-portlet__body">


                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label>الإسم </label>

                                    <input value="{{ old('name') }}" type="text" name="name" class="form-control"
                                    placeholder="الإسم">
                                </div>


                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>

                        </div>




                        <br><br><br>

                        <div class="kt-form__actions text-center">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            <a href="{{ route('tag.index') }}">
                                <button type="button" class="btn btn-secondary">
                                    إالغاء
                                </button>
                            </a>
                        </div>






                    </div>

                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->


            <!--end::Portlet-->
        </div>

    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! $validator->selector('#form_item') !!}


@endpush

@endsection



