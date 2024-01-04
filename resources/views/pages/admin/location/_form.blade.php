<div x-data="locationForm" class="space-y-3">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                                value="{{ old('name') }}"
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
                                x-init="() => { $watch('fields.phone', () => showError = false) }"
                                value="{{ old('phone') }}"
                            />
                            
                            @error('phone')
                                <span x-show="showError">
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
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
                                x-init="() => { $watch('fields.clia', () => showError = false) }"
                                value="{{ old('clia') }}"
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
                                x-init="() => { $watch('fields.sales_rep_code', () => showError = false) }"
                                value="{{ old('sales_rep_code') }}"
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
                            <select 
                                id="test_ids"
                                name="test_ids[]" 
                                class="selectize searchable-select"
                                placeholder="Choose Test(s)..."
                                multiple="multiple"
                                x-model="selectedTests"
                                x-bind:class="{ 'has-error': showError }"
                                x-init="() => { $watch('selectedTests', () => showError = false) }"
                            >
                                @foreach ($tests as $testId => $testName)
                                    <option
                                        value="{{ $testId }}"
                                        {{ in_array($testId, old('tests') ?? []) ? 'selected' : '' }}
                                    >
                                        {{ $testId }} - {{ $testName }}
                                    </option>
                                @endforeach
                            </select>
                        
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
                                id="panel_ids"
                                name="panel_ids[]" 
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
                            
                            value="{{ old('address') }}"
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
                            
                            value="{{ old('city') }}"
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
                            
                            value="{{ old('state') }}"
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
                            
                            value="{{ old('zipcode') }}"
                        />
                        
                        @error('zipcode')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <p class="mb-2"><b>Status</b></p>
                        <div class="mt-2" x-data="{ isChecked: false }">
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
                                x-model="fields.timeinterval"
                                name="time_interval"
                                type="number"
                                class="form-input"
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
                            />
                            @error('block-limit')
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
                            <div x-data="{ fields: { mondayStatus: false } }">
                                <label class="w-12 h-6 relative">
                                    <input
                                        type="checkbox"
                                        x-model="fields.mondayStatus"
                                        class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                        id="monday-status"
                                        name="monday-status"
                                    />
                                    <span
                                        for="monday-status" 
                                        x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !fields.mondayStatus, 'bg-primary': fields.mondayStatus }"
                                        class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                    ></span>
                                </label>
                                <input type="hidden" x-bind:value="fields.mondayStatus ? '1' : '0'" name="monday_status" />
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
                        <div x-data="{ fields: { tuesdayStatus: false } }" class="flex flex-wd-10">
                            <p class="mb-2"><b>Tuesday</b></p>
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="fields.tuesdayStatus"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="status"
                                    name="tuesday-status"
                                />
                                <span
                                    for="status"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !fields.tuesdayStatus, 'bg-primary': fields.tuesdayStatus }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                            </label>
                            <input type="hidden" x-bind:value="fields.tuesdayStatus ? '1' : '0'" name="tuesday_status" />
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
                        <div x-data="{ wedStatus: false }" class="flex flex-wd-10">
                            <p class="mb-2"><b>Wednesday</b></p>
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="fields.wedStatus"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="wed-status"
                                    name="wed-status"
                                />
                                <span
                                    for="wed-status"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !fields.wedStatus, 'bg-primary': fields.wedStatus }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                            </label>
                            
                            <input type="hidden" x-bind:value="wedStatus ? '1' : '0'" name="wednesday_status" />
                        </div>
                        
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="wed-start-time" 
                                x-model="fields.wedstart"
                                name="wed-start-time"
                                class="form-input" 
                            />
                            @error('wed-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="wed-end-time" 
                                x-model="fields.wedend"
                                name="wed-end-time"
                                class="form-input" 
                            />
                            @error('wed-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div x-data="{ thuStatus: false }" class="flex flex-wd-10">
                            <p class="mb-2"><b>Thursday</b></p>
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="thuStatus"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="thu-status"
                                    name="thu-status"
                                />
                                <span
                                    for="thu-status"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !thuStatus, 'bg-primary': thuStatus }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                            </label>
                            <input type="hidden" x-bind:value="thuStatus ? '1' : '0'" name="thursday_status" />
                        </div>
                                                                       
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="thu-start-time" 
                                x-model="fields.thustart"
                                name="thu-start-time"
                                class="form-input" 
                            />
                            @error('thu-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="thu-end-time" 
                                x-model="fields.thuend"
                                name="thu-end-time"
                                class="form-input" 
                            />
                            @error('thu-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div x-data="{ fields: { friStatus: false } }" class="flex flex-wd-10">
                            <p class="mb-2"><b>Friday</b></p>
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="fields.friStatus"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="fri-status"
                                    name="fri-status"
                                />
                                <span
                                    for="fri-status"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !fields.friStatus, 'bg-primary': fields.friStatus }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                            </label>
                            <input type="hidden" x-bind:value="fields.friStatus ? '1' : '0'" name="friday_status" />
                        </div>                            
                        
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="fri-start-time" 
                                x-model="fields.fristart"
                                name="fri-start-time"
                                class="form-input" 
                            />
                            @error('fri-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="fri-end-time" 
                                x-model="fields.friend"
                                name="fri-end-time"
                                class="form-input" 
                            />
                            @error('fri-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div x-data="{ fields: { satStatus: false } }" class="flex flex-wd-10">
                            <p class="mb-2"><b>Saturday</b></p>
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="fields.satStatus"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="sat-status"
                                    name="sat-status"
                                />
                                <span
                                    for="sat-status"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !fields.satStatus, 'bg-primary': fields.satStatus }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                            </label>
                            <input type="hidden" x-bind:value="fields.satStatus ? '1' : '0'" name="saturday_status" />
                        </div>
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="sat-start-time" 
                                x-model="fields.satstart"
                                name="sat-start-time"
                                class="form-input" 
                            />
                            @error('sat-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="sat-end-time" 
                                x-model="fields.satend"
                                name="sat-end-time"
                                class="form-input" 
                            />
                            @error('sat-end-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:flex justify-between gap-5 mt-3">
                        <div x-data="{ sunStatus: false }" class="flex flex-wd-10">
                            <p class="mb-2"><b>Sunday</b></p>
                            <label class="w-12 h-6 relative">
                                <input
                                    type="checkbox"
                                    x-model="fields.sunStatus"
                                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                    id="sun-status"
                                    name="sun-status"
                                />
                                <span
                                    for="sun-status"
                                    x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !sunStatus, 'bg-primary': sunStatus }"
                                    class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                ></span>
                            </label>
                            <input type="hidden" x-bind:value="sunStatus ? '1' : '0'" name="sunday_status" />
                        </div>                                                                  
                        
                        <div class="flex flex-column">
                            <label><b>Start time</b></label>
                            <input 
                                id="sun-start-time" 
                                x-model="fields.sunstart"
                                name="sun-start-time"
                                class="form-input" 
                            />
                            @error('sun-start-time')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-column">
                            <label><b>End time</b></label>
                            <input 
                                id="sun-end-time" 
                                x-model="fields.sunend"
                                name="sun-end-time"
                                class="form-input" 
                            />
                            @error('sun-end-time')
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
                                :value="fields.quill_description"
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


<!-- script -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("form", () => ({
            init() {
                flatpickr(document.getElementById('start-time'), {
                    defaultDate: this.start,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('end-time'), {
                    defaultDate: this.end,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('block-start-time'), {
                    defaultDate: this.blockstart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('block-end-time'), {
                    defaultDate: this.blockend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
            }
        }));
        Alpine.data("appointmenttime", () => ({
            init() {
                flatpickr(document.getElementById('monday-start-time'), {
                    defaultDate: this.mondaystart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('monday-end-time'), {
                    defaultDate: this.mondayend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('tuesday-start-time'), {
                    defaultDate: this.tuesdaystart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('tuesday-end-time'), {
                    defaultDate: this.tuesdayend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('wed-start-time'), {
                    defaultDate: this.wedstart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('wed-end-time'), {
                    defaultDate: this.wedend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('thu-start-time'), {
                    defaultDate: this.thustart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('thu-end-time'), {
                    defaultDate: this.thuend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('fri-start-time'), {
                    defaultDate: this.fristart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('fri-end-time'), {
                    defaultDate: this.friend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('sat-start-time'), {
                    defaultDate: this.satstart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('sat-end-time'), {
                    defaultDate: this.satend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('sun-start-time'), {
                    defaultDate: this.sunstart,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
                flatpickr(document.getElementById('sun-end-time'), {
                    defaultDate: this.sunend,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
            }

        }));
    });
</script>

<script>
    document.addEventListener("alpine:init", () => {


        Alpine.data("locationForm", () => ({
            fields: {},
            init() {
                    this.form = {};
            }
        }));
       
    });
</script>