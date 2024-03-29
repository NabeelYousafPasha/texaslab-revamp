<div x-data="locationForm" class="space-y-3">
    
    <div class="mb-5" x-data="{tab: 'basicinfo'}">
        <div class="mt-1">
            <ul class="nav nav-tabs" id="myTabs">
              <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#basicinfo">Basic Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab2" data-toggle="tab" href="#timings">Timings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab3" data-toggle="tab" href="#appointment-dates">Appointment Dates</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab3" data-toggle="tab" href="#terms-condition">Terms & Conditions</a>
              </li>
            </ul>
            <div class="tab-content mt-4">
              <div class="tab-pane fade show active" id="basicinfo">
                <div class="active mt-2" x-data="{ isChecked: false, selectedTests: {{ json_encode(old('tests') ?? []) }}, tests: {{ json_encode($tests) }}, selectedPanels: {{ json_encode(old('panels') ?? []) }}, panels: {{ json_encode($panels) }} }">
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5">
                        <div x-data="{ showError: @error('name') true @else false @enderror }" class="wd-49 form-field" x-init="() => { $watch('fields.name', () => showError = false) }">
                            <input
                                x-model="fields.name"
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Location Name"
                                x-bind:class="{ 'form-input': true, 'border-red-500': showError }"
                                class="form-input"
                                x-on:input="fields.name = $event.target.value"
                                x-init="fields.name = '{{ old('name', isset($locationData) ? addslashes($locationData->name) : '') }}'"
                            />
                        
                            @error('name')
                                <span x-show="showError">
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                                               

                        <div x-data="{ showError: @error('phone') true @else false @enderror }" class="wd-49 form-field">
                            <input
                                id="phone"
                                name="phone"
                                x-model="fields.phone"
                                type="text"
                                placeholder="Phone"
                                x-bind:class="{ 'form-input': true, 'border-red-500': showError }"
                                x-init="() => { 
                                    fields.phone = '{{ old('phone', isset($locationData) ? $locationData->phone : '') }}'; 
                                    $watch('fields.phone', () => showError = false);
                                }"
                                x-on:input="showError = false"
                            />
                        
                            @if(isset($locationData))
                                @error('phone')
                                    <span x-show="showError">
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    </span>
                                @enderror
                            @endif
                        </div>                        

                    </div>

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div x-data="{ showError: @error('clia') true @else false @enderror }" class="wd-49 form-field">
                            <input
                                id="clia"
                                name="clia"
                                type="text"
                                placeholder="CLIA"
                                x-model="fields.clia"
                                x-bind:class="{ 'form-input': true, 'border-red-500': showError }"
                                x-init="() => { 
                                    fields.clia = {{ old('clia', isset($locationData) ? $locationData->clia : '') }} 
                                    $watch('fields.clia', () => showError = false);
                                }"
                            />

                            
                            @error('clia')
                                <span x-show="showError">
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    
                        <div x-data="{ showError: @error('sales_rep_code') true @else false @enderror }" class="wd-49 form-field">
                            <input
                                id="sales_rep_code"
                                name="sales_rep_code"
                                type="text"
                                x-model="fields.sales_rep_code"
                                placeholder="Sales Rep Code"
                                x-bind:class="{ 'form-input': true, 'border-red-500': showError }"
                                x-init="() => { 
                                    fields.sales_rep_code = {{ old('sales_rep_code', isset($locationData) ? $locationData->sales_rep_code : '') }}
                                    $watch('fields.sales_rep_code', () => showError = false);
                                }"
                            />
                    
                            @error('sales_rep_code')
                                <span x-show="showError">
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3 form-field space-y-3 @error('tests') has-error @enderror" x-data="{ tests: {{ $tests }} }">
                        <label for="tests"><b>Tests</b></label>  
                        <div x-data="{ showError: @error('tests') true @else false @enderror }" class="relative">
                            <div class="select-test">
                                <select 
                                    id="tests"
                                    name="tests[]" 
                                    class="selectize searchable-select"
                                    placeholder="Choose Test(s)..."
                                    multiple="multiple"
                                    x-model="selectedTests"
                                    x-bind:class="{ 'has-error': showError }"
                                    x-init="() => { $watch('selectedTests', () => showError = false) }"
                                >
                                @php
                                    if(isset($locationData)){
                                        $locationTests = $locationData->locationTests->pluck('test_id')->toArray();
                                    }
                                @endphp
                                    @foreach ($tests as $testId => $testName)
                                        <option
                                            value="{{ $testId }}"
                                            @if(!empty($locationTests))
                                                @if(in_array($testId,$locationTests))
                                                    selected
                                                @endif
                                            @endif
                                        >
                                            {{ $testId }} - {{ $testName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            

                            @error('tests')
                                <span x-show="showError">
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                                              
                    </div>   

                    <div class="mt-3 form-field space-y-3 @error('panels') has-error @enderror" x-data="{ panels: {{ $panels }} }">
                        <label for="panels"><b>Panels</b></label>
                        <div x-data="{ showError: @error('panels') true @else false @enderror }" class="relative">
                            <select 
                                id="panels"
                                name="panels[]" 
                                class="selectize searchable-select"
                                placeholder="Choose Panel(s)..."
                                multiple="multiple"
                                x-model="selectedPanels"
                                x-bind:class="{ 'has-error': showError }"
                                x-init="() => { $watch('selectedPanels', () => showError = false) }"
                            >
                                @foreach ($panels as $panelId => $panelName)
                                    <option
                                        value="{{ $panelId }}"
                                        {{ in_array($panelId, old('panels') ?? []) ? 'selected' : '' }}
                                    >
                                        {{ $panelId }} - {{ $panelName }}
                                    </option>
                                @endforeach
                            </select>
                        
                            @error('panels')
                                <span x-show="showError">
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <input 
                            id="address" 
                            name="address"
                            type="text"
                            x-model="fields.address"
                            placeholder="Address"
                            class="form-input"
                            x-bind:value="fields.address"
                            x-init="() => { 
                                fields.address = '{{ old('address', isset($locationData) ? $locationData->address : '') }}'
                                $watch('fields.address', () => showError = false);
                            }"
                        />

    
                        @error('address')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror

                        <input 
                            id="city" 
                            name="city"
                            x-model="fields.city"
                            type="text"
                            placeholder="City"
                            class="form-input"
                            x-bind:value="fields.city"
                            x-init="() => { 
                                fields.city = '{{ old('city', isset($locationData) ? $locationData->city : '') }}'
                                $watch('fields.city', () => showError = false);
                            }"
                        />


                        @error('city')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <input 
                            id="state" 
                            name="state"
                            type="text"
                            x-model="fields.state"
                            placeholder="State"
                            class="form-input"
                            x-init="() => { 
                                fields.state = '{{ old('state', isset($locationData) ? $locationData->state : '') }}' 
                                $watch('fields.state', () => showError = false);
                            }"
                        />


                        
                        @error('state')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror

                        <input 
                            id="zipcode" 
                            name="zipcode"
                            type="text"
                            x-model="fields.zipcode"
                            placeholder="ZipCode"
                            class="form-input"
                            x-init="() => 
                                { fields.zipcode = 
                                    fields.zipcode = {{ old('zipcode', isset($locationData) ? $locationData->zipcode : '')}}
                                    $watch('fields.zipcode', () => showError = false) 
                                }"
                        />
                        
                        @error('zipcode')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <p class="mb-2"><b>Status</b></p>
                        <div class="mt-2" x-data="{ isChecked: {{ isset($locationData) && $locationData->status == 1 ? 'true' : 'false' }} }">
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="isChecked"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="custom_switch_checkbox4"
                                />
                                <span
                                    for="custom_switch_checkbox4"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="status" />
                            </label>
                        </div>                                             
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="timings">
                <div class="location-timing" x-data="form">
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-column">
                            <label><b>Start Time</b></label>
                            <input
                                x-model="fields.start"
                                id="start-time"
                                name="start_time"
                                class="form-input"
                            />
                            @error('start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
            
                        <div class="flex flex-column">
                            <label><b>End Time</b></label>
                            <input
                                x-model="fields.end"
                                id="end-time"
                                name="end_time"
                                class="form-input"
                            />
                            @error('end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-column">
                            <label><b>Block Start Time</b></label>
                            <input
                                x-model="fields.blockstart"
                                id="block-start-time"
                                name="block_start_time"
                                class="form-input"
                            />
                            @error('block-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
            
                        <div class="flex flex-column">
                            <label><b>Block End Time</b></label>
                            <input
                                x-model="fields.blockend"
                                id="block-end-time"
                                name="block_end_time"
                                class="form-input"
                            />
                            @error('block-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-column">
                            <label><b>Time Interval</b></label>
                            <input 
                                id="time-interval" 
                                name="time_interval"
                                type="text"
                                x-model="fields.timeinterval"
                                placeholder="Time interval"
                                class="form-input"
                                x-init="() => { 
                                    fields.timeinterval = '{{ old('time_interval', isset($locationData->locationTiming) && $locationData->locationTiming->first() && $locationData->locationTiming->first()->time_interval !== null ? $locationData->locationTiming->first()->time_interval : '') }}';
                                    $watch('fields.time_interval', () => showError = false);
                                }"
                            />

                            @error('time-interval')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
            
                        <div class="flex flex-column">
                            <label><b>Block Limit</b></label>
                            <input
                                id="block-limit"
                                name="block_limit"
                                type="number"
                                x-model="fields.blocklimit"
                                class="form-input"
                                x-init="() => { 
                                    fields.blocklimit = '{{ old('block_limit', isset($locationData->locationTiming) && $locationData->locationTiming->first() && $locationData->locationTiming->first()->block_limit !== null ? $locationData->locationTiming->first()->block_limit : '') }}';
                                    $watch('fields.block_limit', () => showError = false);
                                }"
                            />
                            @error('block_limit')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="appointment-dates">
                <div class="appointment-times" x-data="appointmenttime">
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>Monday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && $locationData->dayTimings->where('day_of_week', 'monday')->isNotEmpty() && $locationData->dayTimings->where('day_of_week', 'monday')->first()->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="monday-status"
                                        name="monday-status"
                                    />
                                    <span
                                        for="monday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="monday_status" />
                            </div>                                                                           
                        </div>
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="monday-start-time" 
                                x-model="fields.mondaystart"
                                name="monday-start-time"
                                class="form-input" 
                            />
                            @error('monday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="monday-end-time" 
                                x-model="fields.mondayend"
                                name="monday-end-time"
                                class="form-input" 
                            />
                            @error('monday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 
                    
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>Tuesday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && $locationData->dayTimings->where('day_of_week', 'tuesday')->isNotEmpty() && $locationData->dayTimings->where('day_of_week', 'tuesday')->first()->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="tuesday-status"
                                        name="tuesday-status"
                                    />
                                    <span
                                        for="tuesday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="tuesday_status" />
                            </div>                                                                           
                        </div>                      
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="tuesday-start-time" 
                                x-model="fields.tuesdaystart"
                                name="tuesday-start-time"
                                class="form-input" 
                            />
                            @error('tuesday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="tuesday-end-time" 
                                x-model="fields.tuesdayend"
                                name="tuesday-end-time"
                                class="form-input" 
                            />
                            @error('tuesday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>Wednesday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && $locationData->dayTimings->where('day_of_week', 'wednesday')->isNotEmpty() && $locationData->dayTimings->where('day_of_week', 'wednesday')->first()->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="wednesday-status"
                                        name="wednesday-status"
                                    />
                                    <span
                                        for="wednesday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="wednesday_status" />
                            </div>                                                                           
                        </div>
                        
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="wednesday-start-time" 
                                x-model="fields.wednesdaystart"
                                name="wednesday-start-time"
                                class="form-input" 
                            />
                            @error('wednesday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="wednesday-end-time" 
                                x-model="fields.wednesdayend"
                                name="wednesday-end-time"
                                class="form-input" 
                            />
                            @error('wednesday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>Thursday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && $locationData->dayTimings->where('day_of_week', 'thursday')->isNotEmpty() && $locationData->dayTimings->where('day_of_week', 'thursday')->first()->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="thursday-status"
                                        name="thursday-status"
                                    />
                                    <span
                                        for="thursday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="thursday_status" />
                            </div>                                                                           
                        </div>
                                                                       
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="thursday-start-time" 
                                x-model="fields.thursdaystart"
                                name="thursday-start-time"
                                class="form-input" 
                            />
                            @error('thursday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="thursday-end-time" 
                                x-model="fields.thursdayend"
                                name="thursday-end-time"
                                class="form-input" 
                            />
                            @error('thursday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>Friday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && optional($locationData->dayTimings->where('day_of_week', 'friday')->first())->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="friday-status"
                                        name="friday-status"
                                    />
                                    <span
                                        for="friday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="friday_status" />
                            </div>                                                                           
                        </div>                          
                        
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="friday-start-time" 
                                x-model="fields.fridaystart"
                                name="friday-start-time"
                                class="form-input" 
                            />
                            @error('friday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="friday-end-time" 
                                x-model="fields.fridayend"
                                name="friday-end-time"
                                class="form-input" 
                            />
                            @error('friday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>Saturday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && optional($locationData->dayTimings->where('day_of_week', 'saturday')->first())->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="saturday-status"
                                        name="saturday-status"
                                    />
                                    <span
                                        for="saturday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="saturday_status" />
                            </div>                                                                           
                        </div>
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="saturday-start-time" 
                                x-model="fields.saturdaystart"
                                name="saturday-start-time"
                                class="form-input" 
                            />
                            @error('saturday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="saturday-end-time" 
                                x-model="fields.saturdayend"
                                name="saturday-end-time"
                                class="form-input" 
                            />
                            @error('saturday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div class="flex flex-wd-10">
                            <p class="mb-2"><b>sunday</b></p>
                            <div class="mt-2" x-data="{ isChecked: {{ isset($locationData->dayTimings) && optional($locationData->dayTimings->where('day_of_week', 'sunday')->first())->status == 1 ? 'true' : 'false' }} }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="isChecked"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="sunday-status"
                                        name="sunday-status"
                                    />
                                    <span
                                        for="sunday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="sunday_status" />
                            </div>                                                                           
                        </div>                                                              
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="sunday-start-time" 
                                x-model="fields.sundaystart"
                                name="sunday-start-time"
                                class="form-input" 
                            />
                            @error('sunday-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="sunday-end-time" 
                                x-model="fields.sundayend"
                                name="sunday-end-time"
                                class="form-input" 
                            />
                            @error('sunday-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
              </div>
              <div class="tab-pane fade" id="terms-condition">
                <div>
                    <div class="form-field @error('terms_and_conditions') has-error @enderror">
                        <div class="relative">
                            <div 
                                x-ref="quillEditor"
                                x-init="
                                    quill = new Quill($refs.quillEditor, { theme: 'snow' });
                                    quill.on('text-change', function () {
                                        $dispatch('input', quill.root.innerHTML);
                                        $refs.terms_and_conditions.value = quill.root.innerHTML;
                                    });
                                "
                                x-model.debounce.500ms="fields.quill_description"
                            ></div>
                
                            <input 
                            id="terms_and_conditions"
                            x-ref="terms_and_conditions"
                            name="terms_and_conditions"
                            x-model="fields.terms_and_conditions"
                            class="hidden" 
                            type="hidden"
                        >

                            
                            @error('term_conditions')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>