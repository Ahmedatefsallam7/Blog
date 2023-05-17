<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <strong style="margin: 20%;font-size: 25px;color:rgb(113, 166, 210) ;" title="مدونة اخباريه">
            {{ __('words.title') }}
        </strong>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset($setting->logo) }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">

            {{-- start dashboard --}}
            {{-- <li style="font-size: 15px" class="side-item side-item-category">{{ trans('words.dashboard') }}</li> --}}
            <li class="slide">
                <span class="side-menu__item"><i style="margin: 5px" class="la la-home tx-30"></i><a
                        href="{{ url('/dashboard') }}"
                        class="side-menu__label tx-15">{{ trans('words.dashboard') }}</a></span>
            </li>
            {{-- end dashboard --}}


            {{-- start categories --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><i
                        style="margin: 5px" class="las la-shopping-cart tx-30"></i><span
                        class="side-menu__label tx-15">{{ trans('words.catg') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    {{-- categories --}}
                    <li class="slide">
                        <span class="side-menu__item"><i style="margin: 20px" class="las la-shopping-cart tx-30"></i><a
                                style="margin: -15px"
                                href="{{ route('allCategories') }}">{{ trans('words.catg') }}</a></span>
                    </li>
                    {{-- categories --}}

                    {{-- add categories --}}
                    @can('viewAny', $setting)
                        <li class="slide">
                            <span class="side-menu__item"><i style="margin: 20px" class="las la-shopping-cart tx-30"></i><a
                                    style="margin: -15px"
                                    href="{{ route('createCategory') }}">{{ trans('words.addCategory') }}</a></span>
                        </li>
                    @endcan
                    {{-- add categories --}}

                </ul>
            </li>
            {{-- end categories --}}


            {{-- start users --}}
            {{-- @can('viewAny', $users) --}}
            @can('viewAny', $setting)
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><i
                            style="margin: 5px" class="mdi mdi-account-multiple tx-30"></i><span
                            class="side-menu__label tx-15">{{ trans('words.users') }}</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                        {{-- users --}}
                        <li class="slide">
                            <span class="side-menu__item"><i style="margin: 20px"
                                    class="mdi mdi-account-multiple tx-30"></i><a style="margin: -15px"
                                    href="{{ route('allUsers') }}">{{ trans('words.users') }}</a></span>
                        </li>
                        {{-- users --}}

                        {{-- add users --}}
                        <li class="slide">
                            <span class="side-menu__item"><i style="margin: 20px" class="mdi mdi-account-plus tx-30"></i><a
                                    style="margin: -15px"
                                    href="{{ route('createUser') }}">{{ trans('words.addUsers') }}</a></span>
                        </li>
                        {{-- add users --}}

                    </ul>
                </li>
            @endcan
            {{-- @endcan --}}
            {{-- end users --}}

            {{-- start posts --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><i
                        style="margin: 5px" class="la la-envelope tx-30"></i><span
                        class="side-menu__label tx-15">{{ trans('words.posts') }}</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">

                    {{-- posts --}}
                    <li class="slide">
                        <span class="side-menu__item"><i style="margin: 20px" class="la la-envelope tx-30"></i><a
                                style="margin: -15px"
                                href="{{ route('posts') }}">{{ trans('words.posts') }}</a></span>
                    </li>
                    {{-- posts --}}

                    {{-- add posts --}}
                    <li class="slide">
                        <span class="side-menu__item"><i style="margin: 20px" class="typcn typcn-edit tx-30"></i><a
                                style="margin: -15px"
                                href="{{ route('addpost') }}">{{ trans('words.addPost') }}</a></span>
                    </li>
                    {{-- add posts --}}

                </ul>
            </li>
            {{-- end posts --}}

            {{-- start settings --}}
            {{-- <li style="font-size: 15px" class="side-item side-item-category">{{ trans('words.settings') }}</li> --}}
            @can('viewAny', $setting)
                <li class="slide ">
                    <a class="side-menu__item" href="{{ route('settings') }}"> <i style="margin: 5px"
                            class="la la-cog tx-30"> </i> <span
                            class="side-menu__label tx-15">{{ __('words.settings') }}</span></a>
                </li>
            @endcan

            {{-- end settings --}}


        </ul>
    </div>
</aside>
<!-- main-sidebar -->
