@extends('Manager.included.header')


@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        الإعدادات
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">


                {{-- For success To add user --}}
                @if (session()->has('addMassage'))

                    <div class="alert alert-dismissible fade show" style="background-color:#3ec77c;color:white"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>تنبيه : </strong> {{ session()->get('addMassage') }}.
                    </div>
            @endif


            <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded"
                     id="local_data">


                    <div class="card-body">
                        <table class="datatable table table-bordered table-striped text-center ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الشعار</th>
                                <th>إسم المدونة</th>
                                <th>رقم الهاتف</th>
                                <th>الإجرائات</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>


                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        @push('scripts')


            {{-- For make Delete model --}}
            <script type="text/javascript">
                function deleteData(id) {
                    var id = id;
                    var url = '';
                    url = url.replace(':id', id);
                    $("#deleteForm").attr('action', url);
                }

                function formSubmit() {
                    $("#deleteForm").submit();
                }

            </script>
            {{-- For Make yajara Datatable --}}
            <script type="text/javascript">
                $(function () {

                    var table = $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('setting.getsettingData') }}",
                        language: {
                                url: "{{asset('dashboard/assets/arabic.json')}}"
                            },
                        columns: [{
                        data: 'id',
                        name: 'id'
                        },
                            {
                                data: 'logo',
                                name: 'logo'
                            },
                            {
                                data: 'blog_name',
                                name: 'blog_name'
                            },
                            {
                                data: 'phone',
                                name: 'phone'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ]

                    });

                });

            </script>
    @endpush
@endsection
