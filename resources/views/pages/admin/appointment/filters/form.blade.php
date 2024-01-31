@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<div class="mt-3 mb-3">
    <x-helpers.form
        id="form__appointment_filter"
        name="form__appointment_filter"
        action="form__appointment_filter"

        spoofed-type="NULL"
    >
        <div class="space-y-5">

            <div class="flex sm:flex-row flex-col">
                <label 
                    for="id"
                    @error('id') text-danger @enderror
                    class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                >
                    ID
                </label>
        
                <div class="relative">
                    <input 
                        id="id" 
                        name="id"
                        type="text"
                        class="form-input flex-1"
                        
                        value="{{ old('id', $filter->id ?? '') }}"
                    />
                    
                    @error('name')
                        <span>
                            <p class="text-danger mt-1">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="flex sm:flex-row flex-col">
                <label 
                    for="first_name"
                    @error('first_name') text-danger @enderror
                    class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                >
                    First Name
                </label>
        
                <div class="relative">
                    <input 
                        id="first_name" 
                        name="first_name"
                        type="text"
                        class="form-input flex-1"
                        
                        value="{{ old('first_name', $filter->first_name ?? '') }}"
                    />
                    
                    @error('first_name')
                        <span>
                            <p class="text-danger mt-1">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="flex sm:flex-row flex-col">
                <label 
                    for="last_name"
                    @error('last_name') text-danger @enderror
                    class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                >
                    Last Name
                </label>
        
                <div class="relative">
                    <input 
                        id="last_name" 
                        name="last_name"
                        type="text"
                        class="form-input flex-1"
                        
                        value="{{ old('last_name', $filter->last_name ?? '') }}"
                    />
                    
                    @error('last_name')
                        <span>
                            <p class="text-danger mt-1">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="flex sm:flex-row flex-col">
                <label 
                    for="dob"
                    @error('dob') text-danger @enderror
                    class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                >
                    Date of Birth
                </label>
        
                <div class="relative">
                    <input 
                        id="dob" 
                        name="dob"
                        type="date"
                        class="form-input flex-1"
                        
                        value="{{ old('dob', $filter->dob ?? '') }}"
                    />
                    
                    @error('dob')
                        <span>
                            <p class="text-danger mt-1">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4 justify-between mt-3">
                <div class="flex sm:flex-row flex-col">
                    <label 
                        for="appointment_date_from"
                        @error('appointment_date_from') text-danger @enderror
                        class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                    >
                        FROM
                    </label>
            
                    <div class="relative">
                        <input 
                            id="appointment_date_from" 
                            name="appointment_date_from"
                            type="date"
                            class="form-input flex-1"
                            
                            value="{{ old('appointment_date_from', $filter->appointment_date_from ?? '') }}"
                        />
                        
                        @error('appointment_date_from')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex sm:flex-row flex-col">
                    <label 
                        for="appointment_date_to"
                        @error('appointment_date_to') text-danger @enderror
                        class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                    >
                        TO
                    </label>
            
                    <div class="relative">
                        <input 
                            id="appointment_date_to" 
                            name="appointment_date_to"
                            type="date"
                            class="form-input flex-1"
                            
                            value="{{ old('appointment_date_to', $filter->appointment_date_to ?? '') }}"
                        />
                        
                        @error('appointment_date_to')
                            <span>
                                <p class="text-danger mt-1">{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex sm:flex-row flex-col">
                <label 
                    for="locations"
                    @error('locations') text-danger @enderror
                    class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                >
                    Locations
                </label>
        
                <div class="relative flex-1">
                    <select 
                        id="locations"
                        name="locations[]" 
                        class="select2 flex-1"
                        placeholder="Choose Location(s)..."
                    >
                        @foreach ($locations ?? [] as $locationId => $locationName)
                            <option
                                class="form-radio" 
                                value="{{ $locationId }}"
                                @selected(in_array($locationId, old('locations') ?? []))
                                @selected(in_array($locationId, $filterLocations ?? []))
                            />
                                <span class="text-white-dark">{{ $locationId .' - '. $locationName }}</span>
                            </option>
                        @endforeach
                    </select>
        
                    @error('locations')
                        <span>
                            <p class="text-danger mt-1">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex sm:flex-row flex-col">
                <label 
                    for="test"
                    @error('test') text-danger @enderror
                    class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                >
                    Test
                </label>
        
                <div class="relative flex-1">
                    <select 
                        id="test"
                        name="test" 
                        class="select2 flex-1"
                        placeholder="Choose Test"
                    >
                        @foreach ($tests ?? [] as $testId => $testName)
                            <option
                                class="form-radio" 
                                value="{{ $testId }}"
                                @selected(($testId == old('test') ?? ''))
                                @selected($testId == $panelTest ?? ''))
                            />
                                <span class="text-white-dark">{{ $testId .' - '. $testName }}</span>
                            </option>
                        @endforeach
                    </select>
        
                    @error('test')
                        <span>
                            <p class="text-danger mt-1">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
            </div>
            
        </div>

        <button 
            type="submit" 
            class="btn btn-primary mt-6"
        >
            Submit
        </button>
    </x-helpers.form>
</div>

@push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2({ 
                    width: '100%', 
                    placeholder: "Select Option",
                    allowClear: true,
                });
            });
        </script>
    @endpush