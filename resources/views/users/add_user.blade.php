@extends('layouts.master')
@section('title')
    {{ trans('words.title') }} | {{ trans('words.addUsers') }}
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('words.addUsers') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('addUser'))
        <script>
            window.onload = function() {
                notif({
                    msg: 'User Added Successfully',
                    type: 'success',

                });
            }
        </script>
    @endif
    <!-- row opened -->
    <div style="margin-top:-15px " class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="main-content-label mg-b-5">
                                            {{ __('words.addNew') }}
                                        </div>
                                        <hr>
                                        {{-- start form --}}
                                        <form action="{{ route('storeUser') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="pd-30 pd-sm-40 bg-gray-200">
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-4">
                                                        <label class="form-label mg-b-0">{{ __('words.tit') }}</label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" name='name'
                                                            placeholder="{{ __('words.titPlace') }}" type="text">
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-4">
                                                        <label class="form-label mg-b-0">{{ __('words.email') }}</label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" name="email"
                                                            placeholder="{{ __('words.emailPlace') }}" type="text">
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-4">
                                                        <label class="form-label mg-b-0">{{ __('words.password') }}</label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" name="password"
                                                            placeholder="{{ __('words.passPlace') }}" type="text">
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-4">
                                                        <label
                                                            class="form-label mg-b-0">{{ __('words.userStatus') }}</label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" name="status" value="writer"
                                                            type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="row row-xs align-items-center mg-b-20">
                                                    <div class="col-md-4">
                                                        <label class="form-label mg-b-0">{{ __('words.photo') }}</label>
                                                    </div>
                                                    <div class="col-md-8 mg-t-5 mg-md-t-0">
                                                        <input class="form-control" name="image" type="file">
                                                    </div>
                                                </div>
                                                <button
                                                    class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('words.addUsers') }}
                                                </button>
                                            </div>
                                        </form>
                                        {{-- end form --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    <!-- Container closed -->
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
