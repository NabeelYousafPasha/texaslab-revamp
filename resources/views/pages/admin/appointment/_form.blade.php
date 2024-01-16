<div x-data="appointmentForm" class="space-y-3">

    <div class="form-field space-y-3 @error('location_id') has-error @enderror" 
    x-data="{
        locations: {{ $locations }}
    }">
        <label for="location_id">Location</label>
    
        <div class="relative">
            <select 
                id="location_id"
                name="location_id" 
                class="select2"
                placeholder="Choose Location"
                @required(true)
            >
                <option value="">Please Select a Location first</option>
                @foreach ($locations as $locationId => $locationName)
                    <option
                        class="form-radio" 
                        value="{{ $locationId }}"
                        {{ in_array($locationId, old('tests') ?? []) ? 'selected' : '' }}
                    />
                        <span class="text-white-dark">{{ $locationId .' - '. $locationName }}</span>
                    </label>
                @endforeach
            </select>

            @error('location_id')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field space-y-3 @error('appointment_tests') has-error @enderror" 
    x-data="{
        locationTests: {{ $locationTests }}
    }">
        <label for="tests">Tests</label>
    
        <div class="relative">
            <select 
                id="appointment_tests"
                name="appointment_tests[]" 
                class="select2"
                placeholder="Choose Test(s)..."
                multiple="multiple"
            >
                <option value="">Please Select a Location first</option>
                @foreach ($locationTests as $testId => $testName)
                    <option
                        class="form-radio" 
                        value="{{ $testId }}"
                        {{ in_array($testId, old('tests') ?? []) ? 'selected' : '' }} 
                        {{ in_array($testId, $panelTests ?? []) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark">{{ $testId .' - '. $testName }}</span>
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

    <div class="form-field space-y-3 @error('appointment_location_providers') has-error @enderror" 
    x-data="{
        locationProviders: {{ $locationProviders }}
    }">
        <label for="appointment_location_providers">Provider</label>
    
        <div class="relative">
            <select 
                id="appointment_location_providers"
                name="appointment_location_providers[]" 
                class="select2"
                placeholder="Choose Provider(s)..."
                multiple="multiple"
            >
                <option value="">Please Select a Location first</option>
                @foreach ($locationProviders as $providerId => $providerName)
                    <option
                        class="form-radio" 
                        value="{{ $providerId }}"
                        {{ in_array($providerId, old('appointment_location_providers') ?? []) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark">{{ $providerId .' - '. $providerName }}</span>
                    </label>
                @endforeach
            </select>

            @error('appointment_location_providers')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field space-y-3 @error('appointment_panels') has-error @enderror" 
    x-data="{
        locationTests: {{ $locationTests }}
    }">
        <label for="appointment_panels">Panels</label>
    
        <div class="relative">
            <select 
                id="appointment_panels"
                name="appointment_panels[]" 
                class="select2"
                placeholder="Choose Panel(s)..."
                multiple="multiple"
            >
                <option value="">Please Select a Location first</option>
                @foreach ($locationPanels ?? [] as $panelId => $panelName)
                    <option
                        class="form-radio" 
                        value="{{ $panelId }}"
                        {{ in_array($panelId, old('appointment_panels') ?? []) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark">{{ $panelId .' - '. $panelName }}</span>
                    </label>
                @endforeach
            </select>

            @error('appointment_panels')
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

@push('scripts')
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("appointmentForm", () => ({

            fields: {},
            
            init() {},
        }));
    });
</script>
@endpush