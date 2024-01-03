<div x-data="testForm" class="space-y-3">
    <div class="form-field @error('name') has-error @enderror">
        <label for="name">Name</label>

        <div class="relative">
            <input 
                id="name" 
                name="name"
                type="text"
                placeholder="Name of Test"
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

    <div class="form-field @error('specimen') has-error @enderror">
        <label for="specimen">Specimen</label>

        <div class="relative">
            <input 
                id="specimen" 
                name="specimen"
                type="text"
                placeholder="Specimen"
                class="form-input"
                
                value="{{ old('specimen', $test->specimen ?? '') }}"
            />
            
            @error('specimen')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('labdaq_compendium') has-error @enderror">
        <label for="labdaq_compendium">Labdaq Compendium</label>

        <div class="relative">
            <input 
                id="labdaq_compendium" 
                name="labdaq_compendium"
                type="text"
                placeholder="Labdaq Compendium"
                class="form-input"
                
                value="{{ old('labdaq_compendium', $test->labdaq_compendium ?? '') }}"
            />
            
            @error('labdaq_compendium')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('labdaq_panel_name') has-error @enderror">
        <label for="labdaq_panel_name">Labdaq Panel Name</label>

        <div class="relative">
            <input 
                id="labdaq_panel_name" 
                name="labdaq_panel_name"
                type="text"
                placeholder="Labdaq Panel Name"
                class="form-input"
                
                value="{{ old('labdaq_panel_name', $test->labdaq_panel_name ?? '') }}"
            />
            
            @error('labdaq_panel_name')
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
                    x-ref="priceIsFree"
                    
                    x-on:click="hidePriceFields"
                    {{ old('is_free') == 1 ? 'checked' : '' }}

                    {{ isset($test) && (bool) $test->is_free == 1 ? 'checked' : '' }}
                />
                <span class="text-white-dark"">Free</span>
            </label>
            <label class="inline-flex mt-1 cursor-pointer">
                <input 
                    type="radio" 
                    name="is_free" 
                    class="form-radio" 
                    value="0"
                    x-ref="priceIsPaid"
                    
                    x-on:click="showPriceFields"
                    {{ old('is_free') != null && old('is_free') == 0 ? 'checked' : '' }}
                    
                    {{ isset($test) && (bool) $test->is_free == 0 ? 'checked' : '' }}
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

    <div x-show="renderPriceFields" x-transition x-cloak class="space-y-3">
        <div class="form-field @error('actual_price') has-error @enderror">
            <label for="actual_price">Actual Price</label>
        
            <div class="relative">
                <input 
                    id="actual_price" 
                    name="actual_price"
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

    <x-helpers.quill-editor 
        label="Description" 
        name="description_html" 
        value="{{ old('description_html', $test->description_html ?? '') }}" 
        placeholder="Test Description here..." 
    />

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

    <div class="form-field space-y-3 @error('icd_codes') has-error @enderror">
        <label for="icd_codes">ICD Codes</label>
    
        <div class="relative">
            <select 
                id="icd_codes"
                name="icd_codes[]" 
                class="selectize seachable-select"
                placeholder="Choose ICD Code(s)..."
                multiple="multiple"
            >
                @foreach ($icdCodes as $icdCodeId => $icdCode)
                    <option
                        class="form-radio" 
                        value="{{ $icdCodeId }}"
                        {{ in_array($icdCodeId, old('icdCodes') ?? []) ? 'selected' : '' }} 
                        {{ in_array($icdCodeId, $testIcdCodes ?? []) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark"">{{ $icdCode }}</span>
                    </label>
                @endforeach
            </select>

            @error('icd_codes')
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

    <div class="form-field @error('meta_title') has-error @enderror">
        <label for="meta_title">Meta Title</label>

        <div class="relative">
            <input 
                id="meta_title" 
                name="meta_title"
                type="text"
                placeholder="Meta Title"
                class="form-input"
                
                value="{{ old('meta_title', $test->meta_title ?? '') }}"
            />
            
            @error('meta_title')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('meta_description') has-error @enderror">
        <label for="meta_description">Meta Description</label>

        <div class="relative">
            <input 
                id="meta_description" 
                name="meta_description"
                type="text"
                placeholder="Meta Description"
                class="form-input"
                
                value="{{ old('meta_description', $test->meta_description ?? '') }}"
            />
            
            @error('meta_description')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
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

                if (this.$refs.priceIsPaid.checked) {
                    this.renderPriceFields = true;
                }
                
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