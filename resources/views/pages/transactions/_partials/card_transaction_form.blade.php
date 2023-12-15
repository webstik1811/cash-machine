<div class="card">
    <div class="card-header">{{ __('Card Transaction Form') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('create.card.transaction') }}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Card number') }}*</label>
                <div class="col-md-6">
                    <input id="card_number"
                           type="text"
                           class="form-control
                           @error('card_number') is-invalid @enderror"
                           name="card_number"
                           pattern="^4\d{15}$"
                           title="Card number must start with 4 and be 16 digits in length."
                           value="{{ old('card_number') }}" required>
                    @error('card_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Expiration Date') }}*</label>
                <div class="col-md-6">
                    <input id="expiration_date"
                           type="text"
                           class="form-control
                           @error('expiration_date') is-invalid @enderror"
                           name="expiration_date"
                           placeholder="__/20__"
                           value="{{ old('expiration_date') }}" required>
                    @error('expiration_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Cardholder') }}*</label>
                <div class="col-md-6">
                    <input id="cardholder"
                           type="text"
                           class="form-control
                           @error('cardholder') is-invalid @enderror"
                           name="cardholder"
                           value="{{ old('cardholder') }}" required>
                    @error('cardholder')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('CVV') }}*</label>
                <div class="col-md-6">
                    <input id="cvv"
                           type="text"
                           class="form-control
                           @error('cvv') is-invalid @enderror"
                           name="cvv"
                           pattern="^\d{3}$"
                           title="CVV must be 3 digits in length."
                           value="{{ old('cvv') }}" required>
                    @error('cvv')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}*</label>
                <div class="col-md-6">
                    <input id="amount"
                           type="text"
                           class="form-control
                           @error('amount') is-invalid @enderror"
                           name="amount"
                           pattern="^\d+(\.\d{1,2})?$"
                           title="Please enter a valid amount with up to 2 decimal places."
                           value="{{ old('amount') }}" required>
                    @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit Card Transaction') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  $(document).ready(function(){
    $('#expiration_date').mask("99/2099", {placeholder: "__/20__"});
  })
</script>
