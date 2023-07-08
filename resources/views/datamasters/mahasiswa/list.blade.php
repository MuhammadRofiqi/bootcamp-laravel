@extends('layouts.main')
@section('title', 'List Mahasiswa')

@section('style-on-this-page-only')

    <link href="{{ url('assets/metronic/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('contain')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark">List Mahasiswa</span>
                    <span class="text-muted mt-1 fw-bold fs-7">30 Mahasiswa</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Add customer-->
                    <a href="{{ route('mahasiswa.insert') }}" id="btn_add" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus-circle me-3 fs-7"></i> Tambah Mahasiswa</a>
                    <!--end::Add customer-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-3">
                @if (session()->has('success'))
                    <div
                        class="alert alert-success border border-dashed border-success d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-success">This is an alert</h4>
                            <span>{{ session()->get('success') }}</span>
                        </div>
                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </button>
                        <!--end::Close-->
                    </div>
                @endif
                @if (session()->has('fail'))
                    <div class="alert alert-danger border border-dashed border-danger d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                    rx="10" fill="currentColor" />
                                <rect x="11" y="14" width="7" height="2" rx="1"
                                    transform="rotate(-90 11 14)" fill="currentColor" />
                                <rect x="11" y="17" width="2" height="2" rx="1"
                                    transform="rotate(-90 11 17)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger">This is an alert</h4>
                            <span>{{ session()->get('fail') }}</span>
                        </div>
                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-danger">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </button>
                        <!--end::Close-->
                    </div>
                @endif
                <table id="kt_list_mahasiswa" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>No. Tlfn</th>
                            <th>Tgl Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($map_function as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['nim'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['id_jurusan'] }}</td>
                                <td>{{ $item['no_tlfn'] }}</td>
                                <td>{{ $item['tgl_lahir'] }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($map_function as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->id_jurusan }}</td>
                                <td>{{ $item->no_tlfn }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td></td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ url('assets/metronic/js/datatables.bundle.js') }}"></script>
    <script src="{{ url('assets/metronic/js/customeDatatablePdf.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'throw';

            // $('#kt_list_mahasiswa').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'excel',
            //         'print'
            //     ],
            //     processing: true,
            //     serverSide: true,
            //     ajax: {
            //         url: '{{ route('mahasiswa.datatable') }}',
            //         type: "get",
            //     },
            //     columnDefs: [{
            //         className: "text-start text-gray-900 fs-6 ",
            //         targets: "_all"
            //     }, ],
            //     columns: [{
            //             data: 'DT_RowIndex'
            //         },
            //         {
            //             data: 'nim'
            //         },
            //         {
            //             data: 'nama'
            //         },
            //         {
            //             data: 'id_jurusan'
            //         },
            //         {
            //             data: 'no_tlfn'
            //         },
            //         {
            //             data: 'tgl_lahir'
            //         },
            //         {
            //             data: 'nim',
            //             render: function(data, type, row) {
            //                 var url = '{{ route('mahasiswa.detail', ':nim') }}';
            //                 url = url.replace(':nim', data);
            //                 check =
            //                     '<a href="' + url + '">Detail</a>';
            //                 return check;
            //             }
            //         }
            //     ]
            // });
        });
    </script>
@endpush
