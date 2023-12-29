<div x-data="testForm" class="space-y-3">
    <div class="form-field @error('name') has-error @enderror">
        <label for="name">Name</label>

        <div class="relative">
            <input 
                id="name" 
                name="name"
                type="text"
                placeholder="Name of test"
                class="form-input"
                
                value="{{ old('name', $test->name ?? '') }}"
            />
            
            @error('name')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('is_free') has-error @enderror">
        <label for="is_free">Price</label>
        <div class="relative">
            <label class="inline-flex mt-1 cursor-pointer">
                <input 
                    type="radio" 
                    name="is_free" 
                    class="form-radio" 
                    value="1"
                    
                    x-on:click="hidePriceFields"
                    {{ old('is_free') == 1 ? 'checked' : '' }}
                    {{ $test->is_free ?? '' == 1 ? 'checked' : '' }}
                />
                <span class="text-white-dark"">Free</span>
            </label>
            <label class="inline-flex mt-1 cursor-pointer">
                <input 
                    type="radio" 
                    name="is_free" 
                    class="form-radio" 
                    value="0"
                    
                    x-on:click="showPriceFields"
                    {{ old('is_free') != null && old('is_free') == 0 ? 'checked' : '' }}
                    {{ $test->is_free ?? '' == 0 ? 'checked' : '' }}
                />
                <span class="text-white-dark"">Paid</span>
            </label>

            @error('is_free')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div x-show="renderPriceFields" x-transition class="space-y-3">
        <div class="form-field @error('actual_price') has-error @enderror">
            <label for="actual_price">Actual Price</label>
        
            <div class="relative">
                <input 
                    id="actual_price" 
                    name="actual_price"
                    x-model="fields.actual_price"
                    type="number"
                    placeholder="Actual Price"
                    class="form-input"
                    
                    value="{{ old('actual_price', $test->actual_price ?? 0) }}"
                />
                
                @error('actual_price')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('offered_price') has-error @enderror">
            <label for="offered_price">Offered Price</label>
        
            <div class="relative">
                <input 
                    id="offered_price" 
                    name="offered_price"
                    x-model="fields.offered_price"
                    type="number"
                    placeholder="Offered Price"
                    class="form-input"
                    
                    value="{{ old('offered_price', $test->offered_price ?? 0) }}"
                />
                
                @error('offered_price')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('competitor_price') has-error @enderror">
            <label for="competitor_price">Competitor Price</label>
        
            <div class="relative">
                <input 
                    id="competitor_price" 
                    name="competitor_price"
                    x-model="fields.competitor_price"
                    type="number"
                    placeholder="Competitor Price"
                    class="form-input"
                    
                    value="{{ old('competitor_price', $test->competitor_price ?? 0) }}"
                />
                
                @error('competitor_price')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-field @error('description_html') has-error @enderror">
        <label for="description_html">Description</label>

        <div class="relative">
            <div 
                {{-- id="quill"  --}}
                x-ref="quillEditor"
                x-init="
                    quill = new Quill($refs.quillEditor, {theme: 'snow', placeholder: 'Description...',});
                    quill.on('text-change', function () {
                        $dispatch('input', quill.root.innerHTML);
                        $refs.description_html.value = quill.root.innerHTML;
                    });
                "
                x-model.debounce.500ms="fields.quill_description"
            ></div>

            <input 
                id="description_html"
                x-ref="description_html"
                name="description_html"
                class="hidden" 
                type="hidden"
                value="{{ old('description_html', $test->description_html ?? '') }}"
            >
            
            @error('description_html')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field space-y-3 @error('status_id') has-error @enderror" x-data="
    {
        statuses: {{ $statuses }}
    }">
        <label for="status_id">Status</label>
    
        <div class="relative">
            @foreach ($statuses as $statusId => $statusName)
                <label class="inline-flex mt-1 cursor-pointer">
                    <input 
                        type="radio" 
                        id="status_id_{{ $statusId }}"
                        name="status_id" 
                        class="form-radio" 
                        value="{{ $statusId }}"
                        {{ old('status_id') == $statusId ? 'checked' : '' }}
                        {{ $test->status_id ?? '' == $statusId ? 'checked' : '' }}
                        
                    />
                    <span class="text-white-dark"">{{ $statusName }}</span>
                </label>
            @endforeach

            @error('status_id')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('featured_at') has-error @enderror">
        <label for="featured_at">Feature</label>

        <div class="relative">
            <label class="inline-flex items-center mt-1 cursor-pointer">
                <input 
                    id="featured_at" 
                    name="featured_at"
                    type="checkbox" 
                    value="true"
                    class="form-checkbox" 
                    {{ old('featured_at') == true ? 'checked' : '' }}
                    {{ $test->featured_at ?? '' ? 'checked' : '' }}
                />
                <span class="text-white-dark"">Feature this Test?</span>
            </label>
            
            @error('featured_at')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('is_renderabble') has-error @enderror">
        <label for="is_renderabble">Show on Homepage</label>

        <div class="relative">
            <label class="inline-flex items-center mt-1 cursor-pointer">
                <input 
                    id="is_renderabble" 
                    name="is_renderabble"
                    type="checkbox" 
                    value="true"
                    class="form-checkbox" 
                    {{ old('is_renderabble') == true ? 'checked' : '' }}
                    {{ $test->is_renderabble ?? '' ? 'checked' : '' }}
                />
                <span class="text-white-dark"">Show this Test on Homepage?</span>
            </label>
            
            @error('is_renderabble')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div x-data="
        {
            test_result_kpis: {{ $resultKpis }}
        }
    " class="space-y-3">
        @foreach ($resultKpis as $resultKpiId => $resultKpiName)
            <div class="form-field {{ $errors->has('test_result_kpis.'.$resultKpiId) ? 'has-error' : '' }}">
                <label for="test_result_kpis_{{ $resultKpiId }}">{{ $resultKpiName }}</label>

                <div class="relative">
                    <input 
                        id="test_result_kpis_{{ $resultKpiId }}" 
                        name="test_result_kpis[{{ $resultKpiId }}]"
                        type="text"
                        placeholder="{{ $resultKpiName }}"
                        class="form-input"
                        value="{{ old('test_result_kpis')[$resultKpiId] ?? "" }}"
                    />
                    
                    @if($errors->has('test_result_kpis.'.$resultKpiId))
                        <span>
                            <p class="text-danger mt-1">{{ $errors->first('test_result_kpis.'.$resultKpiId) }}</p>
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("testForm", () => ({
            renderPriceFields: false,

            fields: {
                actual_price: 0,
                offered_price: 0,
                competitor_price: 0,
            },
            
            init() {
                this.renderPriceFields = false;
            },
            showPriceFields() {
                this.renderPriceFields = true;
            },
            hidePriceFields() {
                this.renderPriceFields = false;
                this.resetPriceFields();
            },
            resetPriceFields() {
                this.fields.actual_price = 0;
                this.fields.offered_price = 0;
                this.fields.competitor_price = 0;
            },
        }));
    });
</script>