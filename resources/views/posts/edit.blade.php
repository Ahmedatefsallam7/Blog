@extends('layouts.master')
@section('title')
    {{ trans('words.title') }} | {{ trans('words.editPost') }}
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
                <h4 class="content-title mb-0 my-auto">{{ __('words.editPost') }}</h4>
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
    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: 'Post Updated Successfully',
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
                                        <!-- start form -->
                                        <form action="{{ route('updatePost', $post->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <div class="pd-30 pd-sm-40 bg-gray-200">
                                                <!-- start tabs -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="example">
                                                            <!-- postImage  -->
                                                            <div class="row row-xs align-items-center mg-b-20">
                                                                <div class="col-md-0">
                                                                    <label
                                                                        class="form-label mg-b-0">{{ __('words.imgposts') }}</label>
                                                                </div>
                                                                <div class="col-md-20 mg-t-5 mg-md-t-0">
                                                                    <input class="form-control" name='postImg'
                                                                        type="file">
                                                                </div>
                                                            </div>
                                                            <!-- end postImage -->

                                                            <!-- categImage  -->
                                                            <div class="row row-xs align-items-center mg-b-20">
                                                                <div class="col-md-0">
                                                                    <label
                                                                        class="form-label mg-b-0">{{ __('words.categimg') }}</label>
                                                                </div>
                                                                <div class="col-md-20 mg-t-5 mg-md-t-0">
                                                                    <input class="form-control" name='categImg'
                                                                        type="file">
                                                                </div>
                                                            </div>
                                                            <!-- end categImage -->

                                                            <!-- category -->
                                                            <div class="row row-xs align-items-center mg-b-0">
                                                                <div class="col-md-252">
                                                                    <label
                                                                        class="form-label mg-b-0">{{ __('words.catg') }}</label>
                                                                </div>
                                                                <div class="col-md-5 mg-t-5 mg-md-t-0">
                                                                    <select name="categories_id" id=""
                                                                        class="form-control">
                                                                        @foreach ($categories as $item)
                                                                            <option @selected($post->categories_id == $item->id)
                                                                                value="{{ $item->id }}">
                                                                                {{ $item->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--end category -->

                                                            <!-- translate -->
                                                            <hr style="background-color: rgb(13, 8, 8)">
                                                            <div class="panel panel-primary tabs-style-1">
                                                                <div class=" tab-menu-heading">
                                                                    <div class="tabs-menu1">
                                                                        <!-- Tabs -->
                                                                        <ul class="nav panel-tabs main-nav-line">
                                                                            @foreach (config('app.languages') as $key => $lang)
                                                                                <li class="nav-item">
                                                                                    <a href="#{{ $key }}"
                                                                                        class="nav-link @if ($loop->index == 0) active @endif"
                                                                                        data-toggle="tab">{{ $lang }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>

                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                                                    <div class="tab-content">
                                                                        @foreach (config('app.languages') as $key => $lang)
                                                                            <div class="tab-pane @if ($loop->index == 0) active @endif"
                                                                                id="{{ $key }}">
                                                                                <!-- *********************** -->
                                                                                <div>
                                                                                    <!-- title -->
                                                                                    <label for="title"
                                                                                        style="margin-top:10px;color: rgb(50,50,50) "
                                                                                        class="card-title mb-1">{{ __('words.tit') }}
                                                                                    </label>
                                                                                    <!-- the name must be array to take more than one langauges -->
                                                                                    <input type="text"
                                                                                        name="{{ $key }}[title]"
                                                                                        class="form-control" id="title"
                                                                                        value="{{ $post->translate($key)->title }}">
                                                                                </div>
                                                                                <br>
                                                                                <!-- smallDesc -->
                                                                                <div>
                                                                                    <label for="content"
                                                                                        style="margin-top:10px;color: rgb(50,50,50) "
                                                                                        class="card-title mb-1">{{ __('words.smallDesc') }}
                                                                                    </label>
                                                                                    <!-- the name must be array to take more than one langauges -->
                                                                                    <textarea cols="60%" rows="6%" class="form-control" name="{{ $key }}[smallDescription]"
                                                                                        id="smallDesc" placeholder="{{ __('words.contentPlace') }}">{{ $post->translate($key)->smallDescription }}</textarea>
                                                                                </div>
                                                                                <br>
                                                                                <!-- content -->
                                                                                <div>
                                                                                    <label for="content"
                                                                                        style="margin-top:10px;color: rgb(50,50,50) "
                                                                                        class="card-title mb-1">{{ __('words.content') }}
                                                                                    </label>
                                                                                    <!-- the name must be array to take more than one langauges -->
                                                                                    <textarea cols="60%" rows="10%" class="form-control" name="{{ $key }}[content]" id="content"
                                                                                        placeholder="{{ __('words.contentPlace') }}">{{ $post->translate($key)->content }}</textarea>
                                                                                </div>
                                                                                <br>
                                                                                <!-- tags -->
                                                                                <div>
                                                                                    <label for="content"
                                                                                        style="margin-top:10px;color: rgb(50,50,50) "
                                                                                        class="card-title mb-1">{{ __('words.tags') }}
                                                                                    </label>
                                                                                    <!-- the name must be array to take more than one langauges -->
                                                                                    <textarea cols="60%" rows="2%" class="form-control" name="{{ $key }}[tags]" id="tags"
                                                                                        placeholder="{{ __('words.contentPlace') }}">{{ $post->translate($key)->tags }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="margin-bottom: 10px;margin-right:30px;"
                                                        class="row row-xs wd-xl-80p">
                                                        <div class="col-sm-2 col-md-2">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-block">{{ trans('words.submit') }}</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end tabs -->
                                            </div>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
