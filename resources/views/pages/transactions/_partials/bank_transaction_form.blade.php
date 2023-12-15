<div class="card">
    <div class="card-header">{{ __('Bank Transaction Form') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('create.bank.transaction') }}">
        @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Transfer Date') }}</label>
                @php
                    $today = now()->format('Y-m-d');
                @endphp
                <div class="col-md-6">
                    <input id="transfer_date"
                           type="date"
                           min="{{ $today }}"
                           class="form-control
                           @error('transfer_date') is-invalid @enderror"
                           name="transfer_date"
                           value="{{ old('transfer_date', $today) }}" required>
                    @error('transfer_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Customer name') }}</label>
                <div class="col-md-6">
                    <input id="customer_name"
                           type="text"
                           class="form-control
                           @error('customer_name') is-invalid @enderror"
                           name="customer_name"
                           value="{{ old('customer_name') }}" required>
                    @error('customer_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Account number') }}</label>
                <div class="col-md-6">
                    <input id="account_number"
                           type="text"
                           class="form-control
                           @error('account_number') is-invalid @enderror"
                           name="account_number"
                           pattern="^[A-Za-z0-9]{6}$" title="Please enter exactly 6 alphanumeric characters."
                           value="{{ old('account_number') }}" required>
                    @error('account_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>
                <div class="col-md-6">
                    <input id="bank_amount"
                           type="text"
                           class="form-control
                           @error('bank_amount') is-invalid @enderror"
                           name="bank_amount"
                           pattern="^\d+(\.\d{1,2})?$"
                           title="Please enter a valid amount with up to 2 decimal places."
                           value="{{ old('bank_amount') }}" required>
                    @error('bank_amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit bank transaction') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
