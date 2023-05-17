@extends('layouts.master')
@section('title')
    {{ trans('words.title') }} | {{ trans('words.posts') }}
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
                <h4 class="content-title mb-0 my-auto">{{ __('words.posts') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: 'Post Deleted Successfully',
                    type: 'error',

                });
            }
        </script>
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
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-20p border-bottom-0">{{ __('words.imgposts') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('words.postTitle') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('words.categImg') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('words.categTitle') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('words.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach ($posts as $post)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>
                                            <img src="{{ asset($post->image) }}" class="rounded-circle avatar-md mr-2">
                                        </td>
                                        <td>{{ $post->translate(app()->getLocale())->title }}</td>
                                        <td>
                                            <img src="{{ asset($post->category->image) }}"
                                                class="rounded-circle avatar-md mr-2">
                                        </td>
                                        <td>
                                            {{ $post->category->translate(app()->getLocale())->title }}
                                        </td>
                                        @can('update', $post)
                                            <td>
                                                <a class="modal-effect btn btn-sm btn-info"
                                                    href="{{ route('editPost', $post->id) }}" title="edit post"><i
                                                        class="las la-pen"></i>{{ trans('words.editUser') }}</a>

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-rotate-bottom"
                                                    data-id="{{ $post->id }}" data-image="{{ $post->image }}"
                                                    data-title="{{ $post->translate(app()->getLocale())->title }}"
                                                    data-categImg="{{ $post->category->image }}" data-toggle="modal"
                                                    data-title2="{{ $post->category->translate(app()->getLocale())->title }}"
                                                    data-toggle="modal" href="#modaldemo9" title="delete post"><i
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

    <!-- delete modal -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('words.deletePost') }}</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('deletePost') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{ __('words.msg3') }} </p>
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
    <!-- end delete modal -->
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

    {{-- delete modal --}}
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection
