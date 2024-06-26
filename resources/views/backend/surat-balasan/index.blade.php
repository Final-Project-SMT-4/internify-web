@extends('layouts.template')

@push('title')
    {{ $title }}
@endpush

@push('card-header')
    {{ $header }}
@endpush

@include('backend.surat-balasan.modal.detail')
@include('backend.surat-balasan.modal.upload')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama Ketua</th>
                            <th class="text-center">Tempat Magang</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item?->kelompok?->ketua?->no_identitas ?? '-' }}</td>
                                <td class="text-center">{{ $item?->kelompok?->ketua?->name ?? '-' }}</td>
                                <td class="text-center">
                                    @if ($item->tempatMagang)
                                        {{ strtoupper($item->tempatMagang->nama_tempat) }}
                                    @elseif($item?->tempat_magang)
                                        {{ strtoupper($item->tempat_magang) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item?->surat_pengantar)
                                        Sudah Upload
                                    @else
                                        Belum Upload
                                    @endif    
                                </td>
                                <td class="text-center d-flex justify-content-center">
                                    {{-- <div class="form-inline text-center"> --}}
                                        <a href="#">
                                            <button data-toggle="modal" data-target="#exampleModal{{ $item->id }}" data-prodi="{{ $item->prodi->nama_prodi ?? '-' }}" data-golongan="{{ $item->golongan }}" data-email="{{ $item->email }}" data-angkatan="{{ $item->angkatan }}" type="button" id="PopoverCustomT-1" class="btn btn-warning btn-md btn-show-modal" data-toggle="tooltip" title="Detail" data-placement="top"><span class="fa fa-eye"></span></button>    
                                        </a>
                                        <a href="#" class="mx-2">
                                            <button data-toggle="modal" data-target="#modalUpload" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-md btn-upload" data-id="{{ $item->id }}" data-toggle="tooltip" title="Tindak Lanjut" data-placement="top"><span class="fa fa-pen"></span></button>
                                        </a>
                                    {{-- </div> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak Ada Data Tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(".btn-show-modal").on('click', function() {
            var angkatan = $(this).data('angkatan');
            var golongan = $(this).data('golongan');
            var prodi = $(this).data('prodi');
            var email = $(this).data('email');
            console.log(angkatan);

            $("#angkatan-modal").val(angkatan);
            $("#golongan-modal").val(golongan);
            $("#prodi-modal").val(prodi);
            $("#email-modal").val(email);
        })

        $(".btn-upload").on('click', function () {
            var id = $(this).data('id')
            $("#id-upload").val(id)
        })

        $(".btn-tolak").on('click', function () {
            var id = $(this).data('id')
            console.log(`dec: ${id}`);
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda Yakin Menolak Akun Ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#decline-${id}`).submit()
                }
            });
        })

        $(document).ready( function () {
            $('#table').DataTable({
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });
        });
    </script>
@endpush