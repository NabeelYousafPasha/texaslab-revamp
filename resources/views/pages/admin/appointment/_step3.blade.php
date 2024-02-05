<div x-data="step3Form">

    <div class="form-field @error('payment_via') has-error @enderror">
        <label for="payment_via">
            Payment Via
        </label>

        <div class="relative">
            <label class="inline-flex mt-1 cursor-pointer mr-2">
                <input 
                    type="radio" 
                    name="payment_via" 
                    class="form-radio" 
                    value="cash"
                    x-ref="paymentViaCash"
                    
                    x-on:click="hideInsuranceFields"
                    @checked(old('payment_via') == 'cash')
                />
                <span class="text-white-dark">Cash</span>
            </label>
            <label class="inline-flex mt-1 cursor-pointer mr-2">
                <input 
                    type="radio" 
                    name="payment_via" 
                    class="form-radio" 
                    value="insurance"
                    x-ref="paymentViaInsurance"
                    
                    x-on:click="showInsuranceFields"
                    @checked(old('payment_via') == 'insurance')
                />
                <span class="text-white-dark">Insurance</span>
            </label>

            @error('payment_via')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>


    <div 
        x-show="renderableInsuranceFields" 
        x-transition 
        x-cloak 
        class="space-y-3 mt-3"
    >
        <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">Insurance Details</h5>

        @includeIf('pages.admin.insurance._form')
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("step3Form", () => ({
                renderableInsuranceFields: false,

                fields: {},
                
                init() {
                    this.renderableInsuranceFields = false;

                    if (this.$refs.paymentViaInsurance.checked) {
                        this.renderableInsuranceFields = true;
                    }
                    
                },
                showInsuranceFields() {
                    this.renderableInsuranceFields = true;
                },
                hideInsuranceFields() {
                    this.renderableInsuranceFields = false;
                },
            }));
        });
    </script>
@endpush