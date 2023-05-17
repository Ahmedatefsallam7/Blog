@extends('layouts.master')
@section('title')
    {{ trans('words.title') }} | {{ trans('words.allCategory') }}
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
                <h4 class="content-title mb-0 my-auto">{{ __('words.allCategory') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($categories)
        @if (session()->has('addCategory'))
            <script>
                window.onload = function() {
                    notif({
                        msg: 'Category Added Successfully',
                        type: 'success',

                    });
                }
            </script>
        @endif
        @if (session()->has('update'))
            <script>
                window.onload = function() {
                    notif({
                        msg: 'Category Updated Successfully',
                        type: 'success',

                    });
                }
            </script>
        @endif

        @if (session()->has('delete'))
            <script>
                window.onload = function() {
                    notif({
                        msg: 'Category Deleted Successfully',
                        type: 'error',

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
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0">{{ __('words.categ') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ __('words.tit') }}</th>
                                        <th class="wd-20p border-bottom-0">{{ __('words.categTitle') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ __('words.action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $count = 0; @endphp
                                    @foreach ($categories as $item)
                                        @php $count++; @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td><img src="{{ asset($item->image) }}" class="rounded-circle avatar-md mr-2">
                                            </td>
                                            <td>{{ $item->translate(app()->getLocale())->title }}</td>
                                            <td>
                                                @if ($item->parent == 0)
                                                    Main category
                                                @else
                                                    {{ $item->translate(app()->getLocale())->title }}
                                                @endif
                                            </td>
                                            @can('viewAny', $setting)
                                                <td>
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-id="{{ $item->id }}" data-imag="{{ $item->image }}"
                                                        data-title="{{ $item->title }}" data-section="{{ $item->parent }}"
                                                        data-toggle="modal" href="#exampleModal2" title="edit category"><i
                                                            class="las la-pen"></i>{{ trans('words.editUser') }}</a>

                                                    <a class="modal-effect btn btn-sm btn-danger"
                                                        data-effect="effect-rotate-bottom" data-id="{{ $item->id }}"
                                                        data-toggle="modal" href="#modaldemo9" title="delete category"><i
                                                            class="las la-trash"></i>{{ trans('words.delete') }}</a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
        <!-- /row -->
        <!-- Container closed -->
        <!-- main-content closed -->

        <!-- edit modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{ __('words.editcat') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('updateCateg') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{-- $item->id --}}">

                                <label for="img" class="col-form-label">{{ __('words.categ') }} </label>
                                <input class="form-control" name="image" id="image" type="file">

                                <label for="title" class="col-form-label">{{ __('words.tit') }} </label>
                                <input class="form-control" name="title" id="title" type="text">

                                <label for="section" class="col-form-label">{{ __('words.section') }} </label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="0">parent section</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->title }}
                                        </option>
                                        <hr>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('words.submit') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('words.cancel') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
        <!-- end edit modal -->

        <!-- delete modal -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ __('words.deleteCateg') }}</h6><button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('deleteCateg') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{ __('words.msg2') }} </p>
                            <input type="hidden" name="id" id="id" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('words.cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('words.delete') }}</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    @endif
    <!-- end delete modal -->
@endsection

<!-- end delete modal -->
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

    {{-- delete modal --}}
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            // var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            // modal.find('.modal-body #name').val(name);
        })
    </script>

    {{-- edit modal --}}
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var image = button.data('image')
            var title = button.data('title')
            var parent = button.data('parent')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #parent').val(parent);

        })
    </script>
@endsection
