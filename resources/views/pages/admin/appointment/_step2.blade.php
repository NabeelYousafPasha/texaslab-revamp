<div class="step1" x-data="" class="space-y-3">

    <div class="grid grid-cols-2 gap-4 justify-between">

        <div class="form-field space-y-3 @error('tests') has-error @enderror" 
        x-data="{
            locationTests: {{ $locationTests ?? '' }}
        }">
            <label 
                for="tests"
                class="@error('tests') text-danger @enderror"
            >
                Tests
            </label>
        
            <div class="relative">
                <select 
                    id="tests"
                    name="tests[]" 
                    class="select2"
                    placeholder="Choose Test(s)..."
                    multiple="multiple"
                >
                    <option value="">Please Select a Location first</option>
                    @foreach ($locationTests ?? [] as $testId => $testName)
                        <option
                            class="form-radio" 
                            value="{{ $testId }}"
                            @selected(in_array($testId, (old('tests') ?? [])))
                            @selected(in_array($testId, ($appointmentTests ?? [])))
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
            locationProviders: {{ $locationProviders ?? '' }}
        }">
            <label 
                for="providers"
                class="@error('providers') text-danger @enderror"
            >
                Provider
            </label>
        
            <div class="relative">
                <select 
                    id="providers"
                    name="providers[]" 
                    class="select2"
                    placeholder="Choose Provider(s)..."
                    multiple="multiple"
                >
                    <option value="">Please Select a Location first</option>
                    @foreach ($locationProviders ?? [] as $providerId => $providerName)
                        <option
                            class="form-radio" 
                            value="{{ $providerId }}"
                            @selected(in_array($providerId, (old('providers') ?? [])))
                            @selected(in_array($providerId, ($appointmentlocationProviders ?? [])))
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
            locationPanels: {{ $locationPanels ?? '' }}
        }">
            <label 
                for="panels"
                class="@error('panels') text-danger @enderror"
            >
                Panels
            </label>
        
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
                            @selected(in_array($panelId, (old('panels') ?? [])))
                            @selected(in_array($panelId, ($appointmentPanels ?? [])))
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

    </div>

</div>