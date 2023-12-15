<div class="card">
    <div class="card-header">{{ __('Cash Transaction Form') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('create.cash.transaction') }}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('1 BGN') }}</label>
                <div class="col-md-6">
                    <input id="cash[1]"
                           type="number"
                           class="form-control
                           @error('cash.1') is-invalid @enderror"
                           name="cash[1]"
                           value="{{ old('cash.1', 0) }}" required>
                    @error('cash.1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('5 BGN') }}</label>
                <div class="col-md-6">
                    <input id="cash[5]"
                           type="number"
                           class="form-control
                           @error('cash.5') is-invalid @enderror"
                           name="cash[5]"
                           value="{{ old('cash.5', 0) }}" required>
                    @error('cash.5')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('10 BGN') }}</label>
                <div class="col-md-6">
                    <input id="cash[10]"
                           type="number"
                           class="form-control
                           @error('cash.10') is-invalid @enderror"
                           name="cash[10]"
                           value="{{ old('cash.10', 0) }}" required>
                    @error('cash.10')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('50 BGN') }}</label>
                <div class="col-md-6">
                    <input id="cash[50]"
                           type="number"
                           class="form-control
                           @error('cash.50') is-invalid @enderror"
                           name="cash[50]"
                           value="{{ old('cash.50', 0) }}" required>
                    @error('cash.50')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('100 BGN') }}</label>
                <div class="col-md-6">
                    <input id="cash[100]"
                           type="number"
                           class="form-control
                           @error('cash.100') is-invalid @enderror"
                           name="cash[100]"
                           value="{{ old('cash.100', 0) }}" required>
                    @error('cash.100')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            @error('cash')
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                </span>
                </div>
            </div>
            @enderror
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit Cash Transaction') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
