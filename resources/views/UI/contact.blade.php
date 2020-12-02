@extends('UI.layout')
@section('title-page')
    Contact
@endsection
@section('content')

    <style>
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 103%;
            color: #f23a2e;
        }
        .toast-message{
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="section-title mb-5">
                        <h2>Contact Us</h2>
                    </div>
                    <form id="contact_form" method="post" action="{{ route('UI.contact') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="eaddress">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tel">Mobile Number</label>
                                <input type="text" id="mobile" name="mobile" class="form-control form-control-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>

                    </form>
                </div>

            </div>


        </div>
    </div>


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! $validator->selector('#contact_form') !!}

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}



@endpush


@endsection


