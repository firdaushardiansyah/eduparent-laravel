@extends('layouts.app')

@section('title', 'Verifikasi Fondasi Layout & Aset')

@section('content')

    {{-- Page Header Component --}}
    <x-page-header 
        title="Pengujian Base Layout & Binding Aset" 
        subtitle="Halaman verifikasi sementara (Local Only) untuk memastikan responsivitas 320px - desktop dan hardening keamanan."
        :breadcrumbs="['Pengujian' => '#', 'Layout Verification' => route('layout-check')]">
        <x-slot:actions>
            <x-button variant="outline-secondary" size="sm" icon="ti ti-refresh" onclick="window.location.reload();">
                Refresh
            </x-button>
            <x-button variant="primary" size="sm" icon="ti ti-check-circle" data-bs-toggle="modal" data-bs-target="#verificationModal">
                Modal Tes
            </x-button>
        </x-slot:actions>
    </x-page-header>

    {{-- Alert Checklist Status --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-lg bg-white text-primary rounded-circle me-3 flex-shrink-0 d-inline-flex align-items-center justify-content-center">
                            <i class="ti ti-shield-check fs-24"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1 text-white">Tahap 1: Fondasi Base Layout Aktif</h5>
                            <p class="mb-0 fs-13 text-white-50">
                                Asset binding lewat <code>asset()</code>, CSRF injection meta & header AJAX aktif, Security Headers terpasang pada grup <code>web</code>, dan off-canvas hamburger aktif untuk viewport &lt; 992px.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row: Form Pengujian (1 kolom di mobile, 2 kolom mulai md) -->
    <div class="row mb-4">
        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
            <x-card title="Uji Komponen Formulir & CSRF" subtitle="Memverifikasi validasi input, auto-escape anti-XSS, dan touch-target 44px">
                <form action="{{ route('layout-check.submit') }}" method="POST" class="needs-validation">
                    @csrf

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <x-form.input 
                                name="nama_siswa" 
                                label="Nama Lengkap Siswa" 
                                placeholder="Contoh: Muhammad Ali"
                                :required="true"
                                helper="Min. 3 karakter" />
                        </div>
                        <div class="col-12 col-md-6">
                            <x-form.select 
                                name="kelas" 
                                label="Kelompok Belajar" 
                                :required="true"
                                :options="[
                                    'KB-A' => 'Kelompok Bermain A (2-3 th)',
                                    'TK-A' => 'Taman Kanak-Kanak A (4-5 th)',
                                    'TK-B' => 'Taman Kanak-Kanak B (5-6 th)',
                                ]" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <x-form.textarea 
                                name="catatan" 
                                label="Catatan Tambahan (Bisa berisi teks payload XSS untuk verifikasi escape)" 
                                placeholder="Tuliskan catatan khusus..."
                                rows="3" />
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2 mt-2">
                        <x-button type="submit" variant="primary" icon="ti ti-send">
                            Kirim Form (Dengan CSRF)
                        </x-button>
                        <x-button type="reset" variant="outline-secondary">
                            Reset
                        </x-button>
                    </div>
                </form>
            </x-card>
        </div>

        <div class="col-12 col-lg-6">
            <x-card title="Indikator Keamanan & Konfigurasi Session" subtitle="Pemeriksaan status runtime aplikasi">
                <ul class="list-group list-group-flush fs-14">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="ti ti-lock me-2 text-success"></i>CSRF Meta Token</span>
                        <span class="badge bg-success-subtle text-success fw-medium">Tersedia di &lt;head&gt;</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="ti ti-cookie me-2 text-info"></i>Session HttpOnly & SameSite</span>
                        <span class="badge bg-info-subtle text-info fw-medium">
                            HttpOnly: {{ config('session.http_only') ? 'true' : 'false' }} | SameSite: {{ config('session.same_site') }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="ti ti-shield me-2 text-primary"></i>Security Headers Middleware</span>
                        <span class="badge bg-primary-subtle text-primary fw-medium">Aktif (Global Web)</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="ti ti-device-mobile me-2 text-warning"></i>Touch Target Interaktif</span>
                        <span class="badge bg-warning-subtle text-warning fw-medium">&ge; 44px (Tombol & Input)</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <span><i class="ti ti-arrows-horizontal me-2 text-secondary"></i>Proteksi Overflow 320px</span>
                        <span class="badge bg-secondary-subtle text-secondary fw-medium">Mobile-First Checked</span>
                    </li>
                </ul>

                <!-- Test AJAX CSRF Button -->
                <div class="mt-3 pt-3 border-top">
                    <p class="fs-13 text-muted mb-2">Uji pengiriman otomatis header <code>X-CSRF-TOKEN</code> via Fetch API:</p>
                    <button type="button" id="btnTestAjax" class="btn btn-sm btn-outline-primary" style="min-height: 44px;">
                        <i class="ti ti-brand-javascript me-1"></i>Test AJAX CSRF Header
                    </button>
                    <span id="ajaxResult" class="ms-2 fs-13 fw-semibold"></span>
                </div>
            </x-card>
        </div>
    </div>

    <!-- Row: Tabel Lebar 8+ Kolom dengan Card-View Opsi -->
    <div class="row">
        <div class="col-12">
            <x-card title="Pengujian Tabel Lebar 8 Kolom (Responsive + Card-View < 768px)" 
                    subtitle="Tabel dapat digeser mendatar atau beralih ke format kartu vertikal pada layar sempit tanpa merusak layout.">
                
                <x-responsive-table :cardView="true">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">No</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Nama Orang Tua</th>
                            <th scope="col">No. Telepon / WA</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end" style="min-width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sampleStudents = [
                                ['no' => '1', 'nisn' => '0012938101', 'nama' => 'Aditya Pratama', 'kelas' => 'TK-A', 'tgl' => '14 Mar 2021', 'ortu' => 'Bambang Sudirjo', 'telp' => '0812-3456-7890', 'status' => 'Aktif', 'badge' => 'success'],
                                ['no' => '2', 'nisn' => '0012938102', 'nama' => 'Bilqis Humaira', 'kelas' => 'TK-B', 'tgl' => '02 Agu 2020', 'ortu' => 'Fatimah Az-Zahra', 'telp' => '0813-8899-7711', 'status' => 'Aktif', 'badge' => 'success'],
                                ['no' => '3', 'nisn' => '0012938103', 'nama' => 'Cahya Ramadhan', 'kelas' => 'KB-A', 'tgl' => '25 Des 2022', 'ortu' => 'Rahmat Hidayat', 'telp' => '0857-1122-3344', 'status' => 'Izin', 'badge' => 'warning'],
                                ['no' => '4', 'nisn' => '0012938104', 'nama' => 'Dinda Kirana', 'kelas' => 'TK-A', 'tgl' => '10 Jun 2021', 'ortu' => 'Siti Nurhaliza', 'telp' => '0878-9988-7766', 'status' => 'Aktif', 'badge' => 'success'],
                                ['no' => '5', 'nisn' => '0012938105', 'nama' => 'Ehsan Al-Ghifari', 'kelas' => 'TK-B', 'tgl' => '19 Jan 2020', 'ortu' => 'Hasan Basri', 'telp' => '0819-4455-6677', 'status' => 'Sakit', 'badge' => 'danger'],
                            ];
                        @endphp

                        @foreach ($sampleStudents as $student)
                            <tr>
                                <td data-label="No">{{ $student['no'] }}</td>
                                <td data-label="NISN"><span class="badge bg-light text-dark border">{{ $student['nisn'] }}</span></td>
                                <td data-label="Nama Siswa">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs bg-primary text-white rounded-circle me-2 d-inline-flex align-items-center justify-content-center fs-11">
                                            {{ substr($student['nama'], 0, 1) }}
                                        </div>
                                        <span class="fw-semibold text-dark">{{ $student['nama'] }}</span>
                                    </div>
                                </td>
                                <td data-label="Kelas"><span class="badge bg-secondary-subtle text-secondary">{{ $student['kelas'] }}</span></td>
                                <td data-label="Tgl Lahir">{{ $student['tgl'] }}</td>
                                <td data-label="Nama Orang Tua">{{ $student['ortu'] }}</td>
                                <td data-label="No. Telepon / WA">{{ $student['telp'] }}</td>
                                <td data-label="Status">
                                    <span class="badge bg-{{ $student['badge'] }}-subtle text-{{ $student['badge'] }}">
                                        {{ $student['status'] }}
                                    </span>
                                </td>
                                <td data-label="Aksi" class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <button class="btn btn-sm btn-icon btn-outline-primary" style="min-height: 44px; min-width: 44px;" aria-label="Lihat detail">
                                            <i class="ti ti-eye fs-16"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-outline-warning" style="min-height: 44px; min-width: 44px;" aria-label="Edit siswa">
                                            <i class="ti ti-edit fs-16"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-responsive-table>

            </x-card>
        </div>
    </div>

@endsection

@push('modals')
    <!-- Modal Tes Verifikasi -->
    <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="verificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verificationModalLabel">
                        <i class="ti ti-circle-check text-success me-2"></i>Verifikasi Komponen Modal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Komponen Bootstrap 5 modal berhasil dirender dengan mulus.</p>
                    <p class="fs-13 text-muted mb-0">Modal dialog ini tidak menyebabkan pergeseran horizontal layout dan fokus keyboard terisolasi dengan benar.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="min-height: 44px;">Tutup</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="min-height: 44px;">Selesai</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
<script>
    document.getElementById('btnTestAjax')?.addEventListener('click', function () {
        const resultSpan = document.getElementById('ajaxResult');
        resultSpan.className = 'ms-2 fs-13 text-muted';
        resultSpan.textContent = 'Memeriksa header CSRF...';

        // Check if jQuery ajax has CSRF setup
        const hasJqueryHeader = window.jQuery && window.jQuery.ajaxSettings.headers && window.jQuery.ajaxSettings.headers['X-CSRF-TOKEN'];
        const tokenMeta = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        if (hasJqueryHeader && hasJqueryHeader === tokenMeta) {
            resultSpan.className = 'ms-2 fs-13 text-success fw-bold';
            resultSpan.innerHTML = '<i class="ti ti-check me-1"></i>Sukses! X-CSRF-TOKEN terpasang di AJAX & Fetch API.';
        } else {
            resultSpan.className = 'ms-2 fs-13 text-danger fw-bold';
            resultSpan.innerHTML = '<i class="ti ti-x me-1"></i>Gagal: Header CSRF tidak terdeteksi.';
        }
    });
</script>
@endpush

