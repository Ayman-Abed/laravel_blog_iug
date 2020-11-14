
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

                                تعديل بيانات المنشور

                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form autocomplete="off" id="form_item" class="kt-form ajax_form" action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="kt-portlet__body">


                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label> صورة</label>

                                    <div class="custom-file">
                                        <input   name="image" type="file" class="form-control-file image"  >
                                    </div>
                                    <img src="{{ $post->image }}"  class="img-fluid img-thumbnail image_preview"  width="100" height="100" >
                                </div>



                                <div class="form-group">
                                    <label>العنوان </label>

                                    <input value="{{ $post->title }}" type="text" name="title" class="form-control"
                                    placeholder="العنوان">
                                </div>

                                <div class="form-group">
                                    <label>التصنيف</label>
                                    <select class=" form-control" name="category_id" >
                                        <option value="" selected disabled>إختر التصنيف</option>
                                        @foreach ($categories as $category)
                                            <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                                 value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>الوسوم</label>
                                    <select class="form-control select2" name="tag_id[]" multiple>
                                            @foreach ($tags as $tag)
                                                <option
                                                @foreach ($post->tags as $post_tag)
                                                    {{ $tag->id == $post_tag->id ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="">حالة النشر</label>
                                    <div class="">
                                        <span class="kt-switch">
                                            <label>
                                            <input {{ $post->status == 1 ? 'checked' : '' }}  type="checkbox" value="1" name="status">
                                            <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="">سلايدر</label>
                                    <div class="">
                                        <span class="kt-switch">
                                            <label>
                                            <input {{ $post->slider == 1 ? 'checked' : '' }}  type="checkbox" value="1"  name="slider">
                                            <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>

                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">الوصف</label>
                                    <textarea id="summernote1" name="content" class="form-control"
                                    rows="5">{!! $post->content !!}</textarea>
                                </div>

                            </div>
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



