@extends('layouts.master')
@section('title')
    {{ trans('words.title') }} | {{ trans('words.users') }}
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
                <h4 class="content-title mb-0 my-auto">{{ __('words.users') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('deleteUser'))
        <script>
            window.onload = function() {
                notif({
                    msg: 'User Deleted Successfully',
                    type: 'success',

                });
            }
        </script>
    @endif
    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: 'User Updated Successfully',
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
                                    <th class="wd-15p border-bottom-0">{{ trans('words.tit') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ trans('words.email') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('words.status') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('words.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                                @foreach ($users as $user)
                                    @php $count++; @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            @if ($user->status == 'admin')
                                                <span style="border-radius: 3px" class="bg-success">Admin</span>
                                            @elseif ($user->status == 'writer')
                                                <span style="border-radius: 3px" class="bg-warning">Writer</span>
                                            @else
                                                <span style="border-radius: 3px" class="bg-danger">Not Active</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                data-email="{{ $user->email }}" data-status="{{ $user->status }}"
                                                data-toggle="modal" href="#exampleModal2" title="edit user"><i
                                                    class="las la-pen"></i>{{ trans('words.editUser') }}</a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-rotate-bottom"
                                                data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                                data-toggle="modal" href="#modaldemo9" title="delete user"><i
                                                    class="las la-trash"></i>{{ trans('words.delete') }}</a>
                                        </td>
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
                        {{ __('words.edtUsers') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('updateUser', $user->id) }}" method="post" autocomplete="off">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <label for="name" class="col-form-label">{{ __('words.tit') }} </label>
                            <input class="form-control" name="name" id="name" type="text"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('words.email') }} </label>
                            <input class="form-control" name="email" id="email" type="text"
                                value="{{ $user->email }}">
                        </div>
                        @can('viewAny', $user)
                            <div class="form-group">
                                <label for="status" class="col-form-label">{{ trans('words.userStatus') }} </label>
                                <select class="form-control select2" name="status" id="status">
                                    <option selected disabled>select status</option>
                                    <option value="admin">Admin</option>
                                    <option value="writer">Writer</option>
                                    <option value="">Not Active</option>
                                </select>
                            </div>
                        @endcan
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ __('words.submit') }}</button>
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('words.cancel') }}</button>
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
                    <h6 class="modal-title">{{ __('words.deleteUser') }}</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('deleteUser', $user->id) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{ __('words.msg') }} </p>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text"
                            value="{{ $user->name }}" readonly>
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
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>

    {{-- edit modal --}}
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #status').val(status);
        })
    </script>
@endsection
