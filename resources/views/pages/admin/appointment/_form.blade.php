<div x-data="appointmentForm" class="space-y-3">

    <div class="grid grid-cols-2 gap-4 justify-between">

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
                            {{ ($locationId == old('location_id')) ? 'selected' : '' }}
                        />
                            <span class="text-white-dark">{{ $locationId .' - '. $locationName }}</span>
                        </option>
                    @endforeach
                </select>

                @error('location_id')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field space-y-3 @error('tests') has-error @enderror" 
        x-data="{
            locationTests: {{ $locationTests }}
        }">
            <label for="tests">Tests</label>
        
            <div class="relative">
                <select 
                    id="tests"
                    name="tests[]" 
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
                        </option>
                    @endforeach
                </select>

                @error('tests')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field space-y-3 @error('providers') has-error @enderror" 
        x-data="{
            locationProviders: {{ $locationProviders }}
        }">
            <label for="providers">Provider</label>
        
            <div class="relative">
                <select 
                    id="providers"
                    name="providers[]" 
                    class="select2"
                    placeholder="Choose Provider(s)..."
                    multiple="multiple"
                >
                    <option value="">Please Select a Location first</option>
                    @foreach ($locationProviders as $providerId => $providerName)
                        <option
                            class="form-radio" 
                            value="{{ $providerId }}"
                            {{ in_array($providerId, old('providers') ?? []) ? 'selected' : '' }} 
                        />
                            <span class="text-white-dark">{{ $providerId .' - '. $providerName }}</span>
                        </option>
                    @endforeach
                </select>

                @error('providers')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field space-y-3 @error('panels') has-error @enderror" 
        x-data="{
            locationTests: {{ $locationTests }}
        }">
            <label for="panels">Panels</label>
        
            <div class="relative">
                <select 
                    id="panels"
                    name="panels[]" 
                    class="select2"
                    placeholder="Choose Panel(s)..."
                    multiple="multiple"
                >
                    <option value="">Please Select a Location first</option>
                    @foreach ($locationPanels ?? [] as $panelId => $panelName)
                        <option
                            class="form-radio" 
                            value="{{ $panelId }}"
                            {{ in_array($panelId, old('panels') ?? []) ? 'selected' : '' }} 
                        />
                            <span class="text-white-dark">{{ $panelId .' - '. $panelName }}</span>
                        </option>
                    @endforeach
                </select>

                @error('panels')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('appointment_date') has-error @enderror">
            <label for="appointment_date">Appointment Date</label>

            <div class="relative">
                <input 
                    id="appointment_date" 
                    name="appointment_date"
                    type="date"
                    placeholder="Appointment Date"
                    class="form-input"
                    
                    value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}"
                />
                
                @error('appointment_date')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('appointment_time') has-error @enderror">
            <label for="appointment_time">Appointment Time</label>

            <div class="relative">
                <input 
                    id="appointment_time" 
                    name="appointment_time"
                    type="time"
                    placeholder="Appointment Time"
                    class="form-input"
                    
                    value="{{ old('appointment_time', $appointment->appointment_time ?? '') }}"
                />
                
                @error('appointment_time')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
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