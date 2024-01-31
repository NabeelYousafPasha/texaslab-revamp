@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<div class="mt-3 mb-3">
    <x-helpers.form
        id="form__appointment_filter"
        name="form__appointment_filter"
        action="{{ route('admin.appointments.filter') }}"

        method="GET"
    >
            <input 
                type="hidden"
                name="filter"
                value="true"
            >

            <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                {{-- <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">Patient Fiilter</h5> --}}

                <div class="space-y-5">
                    <div class="flex sm:flex-row flex-col">
                        <label 
                            for="id"
                            @error('id') text-danger @enderror
                            class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                        >
                            ID
                        </label>
                
                        <div class="relative flex-1">
                            <input 
                                id="id" 
                                name="id"
                                type="text"
                                class="form-input flex-1"
                                
                                value="{{ old('id', $filters['id'] ?? '') }}"
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
                
                        <div class="relative flex-1">
                            <input 
                                id="first_name" 
                                name="first_name"
                                type="text"
                                class="form-input flex-1"
                                
                                value="{{ old('first_name', $filters['first_name'] ?? '') }}"
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
                
                        <div class="relative flex-1">
                            <input 
                                id="last_name" 
                                name="last_name"
                                type="text"
                                class="form-input flex-1"
                                
                                value="{{ old('last_name', $filters['last_name'] ?? '') }}"
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
                
                        <div class="relative flex-1">
                            <input 
                                id="dob" 
                                name="dob"
                                type="date"
                                class="form-input flex-1"
                                
                                value="{{ old('dob', $filters['dob'] ?? '') }}"
                            />
                            
                            @error('dob')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3"></div>
            
            <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                {{-- <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">Range</h5> --}}

                <div class="space-y-5">
                    <div class="flex sm:flex-row flex-col">
                        <label 
                            for="from"
                            @error('from') text-danger @enderror
                            class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                        >
                            FROM
                        </label>
                
                        <div class="relative flex-1">
                            <input 
                                id="from" 
                                name="from"
                                type="date"
                                class="form-input flex-1"
                                
                                value="{{ old('from', $filter['from'] ?? '') }}"
                            />
                            
                            @error('from')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="flex sm:flex-row flex-col">
                        <label 
                            for="to"
                            @error('to') text-danger @enderror
                            class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                        >
                            TO
                        </label>
                
                        <div class="relative flex-1">
                            <input 
                                id="to" 
                                name="to"
                                type="date"
                                class="form-input flex-1"
                                
                                value="{{ old('to', $filters['to'] ?? '') }}"
                            />
                            
                            @error('to')
                                <span>
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3"></div>
            
            <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                {{-- <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">Location & Tests</h5> --}}

                <div class="space-y-5">            

                    <div class="flex sm:flex-row flex-col">
                        <label 
                            for="locations"
                            @error('locations') text-danger @enderror
                            class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2"
                        >
                            Locations
                        </label>
                
                        <div class="relative flex-1">
                            <input
                                type="hidden"
                                name="locations"
                                value=""
                            >
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
                                        @selected(in_array($locationId, (old('locations') ?? [])))
                                        @selected(in_array($locationId, ($filters['locations'] ?? [])))
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
                                <option value="">No Option</option>
                                @foreach ($tests ?? [] as $testId => $testName)
                                    <option
                                        class="form-radio" 
                                        value="{{ $testId }}"
                                        @selected($testId == (old('test') ?? ''))
                                        @selected($testId == ($filters['test'] ?? ''))
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
            </div>
        </div>


        <div class="flex justify-end items-center mt-8">
            <button 
                for="form__appointment_filter"
                type="submit" 
                class="btn btn-primary ltr:ml-4 rtl:mr-4"
            >
                Search
            </button>
        </div>

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