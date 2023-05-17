@extends('layouts.master')
@section('title')
    {{ trans('words.title') }} | {{ trans('words.settings') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div style="margin-bottom: 5px;margin-top: 10px" class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('words.settings') }}</h4>
            </div>

        </div>
        {{-- <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div> --}}
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

    <form action="{{ route('settingUpdate', $setting) }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- open row 1 -->
        <div class="row row-sm">
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-body pt-0">

                        {{-- logo --}}
                        <div>
                            <label for="logo" style="width: 70%; height:70%;margin-top:10px;color: rgb(50,50,50);"
                                class="card-title mb-1">
                                {{-- {{ __('words.logo') }} --}}
                                <img src="{{ asset($setting->logo) }}" alt="" style="width: 50px; height:50px;">
                            </label>
                        </div>
                        <input type="file" name="logo" class="form-control" id="logo" autofocus>


                        {{-- facebook --}}
                        <label for="facebook" style="margin-top:10px;color: rgb(50,50,50) "
                            class="card-title mb-1">{{ __('words.facebook') }}</label>
                        <input type="text" name="facebook" class="form-control" id="facebook"
                            value="{{ $setting->facebook }}" placeholder="{{ trans('words.facePlace') }}">


                        {{-- phone --}}
                        <label for="phone" style="margin-top:10px;color: rgb(50,50,50) "
                            class="card-title mb-1">{{ __('words.phone') }}</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            value="{{ $setting->phone }}" placeholder="{{ trans('words.phonePlace') }}">

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                <div class="card  box-shadow-0 ">
                    <div class="card-body pt-0">

                        {{-- favicon --}}
                        <div>
                            <label for="favicon" style="width: 70%; height:70%;margin-top:10px;color: rgb(50,50,50) "
                                class="card-title mb-1">
                                {{-- {{ __('words.favicon') }} --}}
                                <img src="{{ asset($setting->favicon) }}" alt="" style="width: 50px; height:50px;">
                            </label>
                        </div>
                        <input type="file" name="favicon" class="form-control" id="favicon">


                        {{-- instgram --}}
                        <label for="instgram" style="margin-top:10px;color: rgb(50,50,50) "
                            class="card-title mb-1">{{ __('words.instgram') }}</label>
                        <input type="text" name="instagram" class="form-control" id="instgram"
                            value="{{ $setting->instagram }}" placeholder="{{ trans('words.instaPlace') }}">


                        {{-- email --}}
                        <label for="email" style="margin-top:10px;color: rgb(50,50,50) "
                            class="card-title mb-1">{{ __('words.email') }}</label>
                        <input type="text" name="email" class="form-control" id="email"
                            value="{{ $setting->email }}" placeholder="{{ trans('words.emailPlace') }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- close row 1 -->

        <!-- open row 2 -->
        <div class="row" style="margin-top:-15px ">
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="my-auto">
                    <div style="margin-bottom: 5px" class="d-flex">
                        <h4 class="content-title mb-0 my-auto">{{ trans('words.translation') }}</h4>
                    </div>
                </div>
                <!-- start tabs -->
                <div class="card">
                    <div class="card-body">
                        <div class="example">
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
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">
                                        @foreach (config('app.languages') as $key => $lang)
                                            <div class="tab-pane @if ($loop->index == 0) active @endif"
                                                id="{{ $key }}">

                                                {{-- title --}}
                                                <label for="title" style="margin-top:10px;color: rgb(50,50,50) "
                                                    class="card-title mb-1">{{ __('words.tit') }}
                                                </label>
                                                {{-- the name must be array to take more than one langauges --}}
                                                <input type="text" name="{{ $key }}[title]"
                                                    class="form-control" id="title"
                                                    value="{{ $setting->translate($key)->title }}"
                                                    placeholder="{{ trans('words.titPlace') }}">



                                                {{-- content --}}
                                                <label for="content" style="margin-top:10px;color: rgb(50,50,50) "
                                                    class="card-title mb-1">{{ __('words.content') }}
                                                </label>
                                                {{-- the name must be array to take more than one langauges --}}
                                                <textarea cols="60%" rows="10%" class="form-control" name="{{ $key }}[content]" id="content"
                                                    placeholder="{{ __('words.contentPlace') }}">{{ $setting->translate($key)->content }}
                                                </textarea>



                                                {{-- address --}}
                                                <label for="address" style="margin-top:10px;color: rgb(50,50,50) "
                                                    class="card-title mb-1">{{ __('words.addr') }}
                                                </label>
                                                {{-- the name must be array to take more than one langauges --}}
                                                <input type="text" name="{{ $key }}[address]"
                                                    class="form-control" id="address"
                                                    value="{{ $setting->translate($key)->address }}"
                                                    placeholder="{{ trans('words.addrPlace') }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px;margin-right:30px;" class="row row-xs wd-xl-80p">
                        <div class="col-sm-2 col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>

                </div>
                <!-- end tabs -->
            </div>

        </div>
        <!-- colse row 2 -->
    </form>
@endsection
