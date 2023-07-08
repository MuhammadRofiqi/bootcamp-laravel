@extends('layouts.main')
@section('title', 'Tambah Mahasiswa')

@section('style-on-this-page-only')

    <link href="{{ url('assets/metronic/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('contain')
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <!--begin::Header-->
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder text-dark">Tambah Mahasiswa</span>
                    <span class="text-muted mt-1 fw-bold fs-7"></span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Add customer-->
                    <!--end::Add customer-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-3">
                @if ($errors->any())
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
                            <span>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </span>
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
                <!--begin:Form-->
                <form id="kt_insert_mahasiswa" class="form" action="{{ route('mahasiswa.create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nim</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-sm" placeholder="NIM" name="nim"
                                value="{{ old('nim') }}" required />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-sm" placeholder="Nama" name="nama"
                                value="{{ old('nama') }}" required />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Jurusan</span>
                            </label>
                            <!--end::Label-->
                            <select class="form-select-solid form-control form-control-sm" data-control="select2"
                                data-hide-search="false" data-placeholder="Pilih Jurusan" name="id_jurusan"
                                id="kt_select_jurusan" required>
                                <option value="">Pilih jurusan</option>
                                <option value="1">Informatika</option>
                                <option value="2">Teknologi Informasi</option>
                                <option value="3">Rekayasa Perangkat Lunak</option>
                                <option value="4">Sistem Informasi</option>
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Semester</span>
                            </label>
                            <!--end::Label-->
                            <input type="number" min="1" class="form-control form-control-sm"
                                placeholder="Semester" name="semester" value="{{ old('semester') }}" required />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">No. Telefon</span>
                            </label>
                            <!--end::Label-->
                            <input type="number" min="1" minlength="12" class="form-control form-control-sm"
                                placeholder="No. Telefon" name="no_tlfn" value="{{ old('no_tlfn') }}" required />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Tgl. Lahir</span>
                            </label>
                            <!--end::Label-->
                            <input type="date" class="form-control form-control-sm" placeholder="Tgl. Lahir"
                                name="tgl_lahir" value="{{ old('tgl_lahir') }}" required />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Jenis Kelamin</span>
                            </label>
                            <!--end::Label-->
                            <select class="form-select-solid form-control form-control-sm" data-control="select2"
                                data-hide-search="true" data-placeholder="Pilih Jenis Kelamin" name="jk"
                                id="kt_select_jk" required>
                                <option value="">Pilih jurusan</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Email</span>
                            </label>
                            <!--end::Label-->
                            <input type="email" class="form-control form-control-sm" placeholder="Email"
                                name="email" value="{{ old('email') }}" required />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Tahun Masuk</span>
                            </label>
                            <!--end::Label-->
                            <input type="date" class="form-control form-control-sm" placeholder="Tahun Masuk"
                                name="tahun_masuk" value="{{ old('tahun_masuk') }}" required />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Alamat</span>
                            </label>
                            <!--end::Label-->
                            <textarea id="alamat" name="alamat" class="form-control form-control-sm" placeholder="Alamat"
                                data-kt-autosize="true"></textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_insert_cancel" class="btn btn-warning btn-sm">Batal</button>
                        <button type="submit" id="kt_insert_submit" class="btn btn-primary btn-sm">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please Wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Body-->
        </div>
    </div>
@endsection
@push('scripts')
    <script text="text/javascript">
        "use strict";
        var KTModalNewTarget = function() {
            var t, e, n, a, i;
            return {
                init: function() {
                    (
                        a = document.querySelector("#kt_insert_mahasiswa"),
                        t = document.getElementById("kt_insert_submit"),
                        e = document.getElementById("kt_insert_cancel"),
                        n = FormValidation.formValidation(a, {
                            fields: {
                                nim: {
                                    validators: {
                                        notEmpty: {
                                            message: "Nim Harus Diisi"
                                        },
                                        stringLength: {
                                            max: 16,
                                            message: "Nim Maksimal 16 Karakter"
                                        }
                                    }
                                },
                                nama: {
                                    validators: {
                                        notEmpty: {
                                            message: "Nama Harus Diisi"
                                        },
                                        stringLength: {
                                            // options: {
                                            max: 50,
                                            message: "Nama 50 Karakter"
                                            // }
                                        }
                                    }
                                },
                                semester: {
                                    validators: {
                                        notEmpty: {
                                            message: "Semester Harus Diisi"
                                        },
                                        integer: {
                                            message: 'Semester Harus Angka',
                                        },
                                        between: {
                                            min: 1,
                                            max: 14,
                                            message: 'Semester Harus Diantara 1-14',
                                        },
                                    }
                                },
                                no_tlfn: {
                                    validators: {
                                        notEmpty: {
                                            message: "No. Telfon Harus Diisi"
                                        },
                                        stringLength: {
                                            // options: {
                                            min: 12,
                                            message: "No. Telfon Minimal 12 Karakter"
                                            // }
                                        }
                                    }
                                },
                                tgl_lahir: {
                                    validators: {
                                        notEmpty: {
                                            message: "Tanggal Lahir Harus Diisi"
                                        }
                                    }
                                },
                                tahun_masuk: {
                                    validators: {
                                        notEmpty: {
                                            message: "Tahun Harus Diisi"
                                        }
                                    }
                                },
                                email: {
                                    validators: {
                                        notEmpty: {
                                            message: "Email Harus Diisi"
                                        },
                                        emailAddress: {
                                            message: 'Masukkan Alamat Email Yang Benar',
                                        }
                                    }
                                },
                                alamat: {
                                    validators: {
                                        notEmpty: {
                                            message: "Alamat Harus Diisi"
                                        }
                                    }
                                },
                                id_jurusan: {
                                    validators: {
                                        notEmpty: {
                                            message: "Jurusan Harus Diisi"
                                        }
                                    }
                                },
                                jk: {
                                    validators: {
                                        notEmpty: {
                                            message: "Jenis Kelamin Harus Diisi"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".row",
                                    // eleInvalidClass: "",
                                    // eleValidClass: ""
                                })
                            }
                        }),
                        t.addEventListener("click", (function(e) {
                            e.preventDefault(), n && n.validate().then((function(e) {
                                console.log("validated!"), "Valid" == e ? (t.setAttribute(
                                        "data-kt-indicator", "on"), t.disabled = !0,
                                    setTimeout((function() {
                                        t.removeAttribute("data-kt-indicator"), t
                                            .disabled = !1, Swal.fire({
                                                text: "Formulir telah berhasil dikirim!",
                                                icon: "success",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, mengerti!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                }
                                            }).then((function(t) {
                                                a.submit()
                                                t.isConfirmed && o.hide()
                                            }))
                                    }), 2e3)) : Swal.fire({
                                    text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, mengerti!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })
                            }))
                        })),
                        e.addEventListener("click", (function(t) {
                            t.preventDefault(), Swal.fire({
                                text: "Apakah Anda yakin ingin membatalkan?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Ya, batalkan!",
                                cancelButtonText: "Tidak, kembali",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light"
                                }
                            }).then((function(t) {

                                t.value ?
                                    (a.reset(), window.location.href =
                                        "{{ route('mahasiswa.index') }}") :
                                    "cancel" === t.dismiss && Swal.fire({
                                        text: "Formulir Anda belum dibatalkan!.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, mengerti!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    })
                            }))
                        })))
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTModalNewTarget.init()
        }));
    </script>
@endpush
