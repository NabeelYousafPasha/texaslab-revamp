<div x-data="panelForm" class="space-y-3">

    <div class="form-field @error('name') has-error @enderror">
        <label for="name">Name</label>

        <div class="relative">
            <input 
                id="name" 
                name="name"
                type="text"
                placeholder="Name of Panel"
                class="form-input"
                
                value="{{ old('name', $panel->name ?? '') }}"
            />
            
            @error('name')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('price') has-error @enderror">
        <label for="price">Price</label>
    
        <div class="relative">
            <input 
                id="price" 
                name="price"
                type="number"
                placeholder="Price"
                class="form-input"
                
                value="{{ old('price', $panel->price ?? 0) }}"
            />
            
            @error('price')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <x-helpers.quill-editor 
        label="Description" 
        name="description_html" 
        value="{{ old('description_html', $panel->description_html ?? '') }}" 
        placeholder="Panel Description here..." 
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
                        {{ $panel->status_id ?? '' == $statusId ? 'checked' : '' }}
                        
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
                    {{ $panel->is_renderabble ?? '' ? 'checked' : '' }}
                />
                <span class="text-white-dark"">Show this Panel on Homepage?</span>
            </label>
            
            @error('is_renderabble')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field space-y-3 @error('tests') has-error @enderror" x-data="
    {
        tests: {{ $tests }}
    }">
        <label for="tests">Tests</label>
    
        <div class="relative">
            <select 
                id="tests"
                name="tests[]" 
                class="selectize seachable-select"
                placeholder="Choose Test(s)..."
                multiple="multiple"
            >
                @foreach ($tests as $testId => $testName)
                    <option
                        class="form-radio" 
                        value="{{ $testId }}"
                        {{ in_array($testId, old('tests') ?? []) ? 'selected' : '' }} 
                        {{ in_array($testId, $panelTests ?? []) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark"">{{ $testId .' - '. $testName }}</span>
                    </label>
                @endforeach
            </select>

            @error('tests')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("panelForm", () => ({

            fields: {},
            
            init() {},
        }));
    });
</script>