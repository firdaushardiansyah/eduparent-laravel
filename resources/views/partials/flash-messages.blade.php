{{-- Flash Messages & Validation Errors (All auto-escaped with {{ }} for anti-XSS) --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
        <i class="ti ti-circle-check fs-20 me-2 flex-shrink-0"></i>
        <div class="flex-grow-1">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
        <i class="ti ti-alert-triangle fs-20 me-2 flex-shrink-0"></i>
        <div class="flex-grow-1">
            {{ session('error') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
        <i class="ti ti-alert-circle fs-20 me-2 flex-shrink-0"></i>
        <div class="flex-grow-1">
            {{ session('warning') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('info') || session('status'))
    <div class="alert alert-info alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
        <i class="ti ti-info-circle fs-20 me-2 flex-shrink-0"></i>
        <div class="flex-grow-1">
            {{ session('info') ?? session('status') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center mb-2">
            <i class="ti ti-circle-x fs-20 me-2 flex-shrink-0"></i>
            <strong class="fs-15">Terdapat kesalahan pada input formulir:</strong>
        </div>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

