<div x-data="panelForm" class="space-y-3">
    <div class="form-field @error('name') has-error @enderror">
        <label for="name">Name</label>

        <div class="relative">
            <input 
                id="name" 
                name="name"
                x-model="fields.name"
                type="text"
                placeholder="Name of test"
                class="form-input"
                
                value="{{ old('name') }}"
            />
            
            @error('name')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('actual_price') has-error @enderror">
        <label for="actual_price">Price</label>
    
        <div class="relative">
            <input 
                id="actual_price" 
                name="actual_price"
                x-model="fields.actual_price"
                type="number"
                placeholder="Actual Price"
                class="form-input"
                
                value="{{ old('actual_price') }}"
            />
            
            @error('actual_price')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('description_html') has-error @enderror">
        <label for="description_html">Description</label>

        <div class="relative">
            <div 
                {{-- id="quill"  --}}
                x-ref="quillEditor"
                x-init="
                    quill = new Quill($refs.quillEditor, {theme: 'snow'});
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
                x-model="fields.description_html"
                class="hidden" 
                type="hidden"
                value="{{ old('description_html') }}"
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
                        x-model="fields.status_id"
                        class="form-radio" 
                        value="{{ $statusId }}"
                        {{ old('status_id') == $statusId ? 'checked' : '' }}
                        
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
                    x-model.boolean="fields.is_renderabble"
                    type="checkbox" 
                    value="true"
                    class="form-checkbox" 
                    {{ old('is_renderabble') == true ? 'checked' : '' }}
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

</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("panelForm", () => ({

            fields: {
                name: '',
                price: 0,
                quill_description: '',
            },
            
            init() {
            },
        }));
    });
</script>