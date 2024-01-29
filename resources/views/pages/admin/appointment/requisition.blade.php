<x-layout.default>
    
    <div x-data="appointmentRequisition">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Appointments</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                APPOINTMENTS
                            </a>
                        </li>
                        <li class="before:content-['/'] before:px-1.5">
                            <a href="javascript:;" class="text-black dark:text-white-light hover:text-black/70 dark:hover:text-white-light/70">
                                Requisition
                            </a>
                        </li>
                    </ol>
                </div>
                <div class="float-right">
                </div>
            </div>
            
            <div class="mt-3">
                <div class="grid grid-cols-2 gap-4 justify-between mt-3">
                    <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 space-y-3">
                        <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
                            Appointment Details
                        </h5>

                        <div class="grid grid-cols-2 gap-4 justify-between mt-3">

                            <div class="form-field @error('appointment_date') has-error @enderror">
                                <label 
                                    for="appointment_date"
                                    class="@error('appointment_date') text-danger @enderror"
                                >
                                    Appointment Date
                                </label>
                    
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
                                <label 
                                    for="appointment_time"
                                    class="@error('appointment_time') text-danger @enderror"
                                >
                                    Appointment Time
                                </label>
                    
                                <div class="relative">
                                    <input 
                                        id="appointment_time" 
                                        name="appointment_time"
                                        type="time"
                                        placeholder="Appointment Time"
                                        class="form-input"
                                        
                                        value="{{ old('appointment_time', $appointment->appointment_timeslot ?? '') }}"
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

                    <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 space-y-3">
                        <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
                            Location Details
                        </h5>

                        <div class="grid grid-cols-2 gap-4 justify-between mt-3">
                            <div class="form-field @error('name') has-error @enderror">
                                <label 
                                    for="name"
                                    class="@error('name') text-danger @enderror"
                                >
                                    Location Name
                                </label>
                    
                                <div class="relative">
                                    <input 
                                        id="name" 
                                        name="name"
                                        type="text"
                                        placeholder="Location Name"
                                        class="form-input"
                                        
                                        value="{{ old('name', $appointmentLocation->name ?? '') }}"
                                    />
                                    
                                    @error('name')
                                        <span>
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-field @error('phone') has-error @enderror">
                                <label 
                                    for="phone"
                                    class="@error('phone') text-danger @enderror"
                                >
                                    Location Phone
                                </label>
                    
                                <div class="relative">
                                    <input 
                                        id="phone" 
                                        name="phone"
                                        type="text"
                                        placeholder="Appointment Time"
                                        class="form-input"
                                        
                                        value="{{ old('phone', $appointmentLocation->phone ?? '') }}"
                                    />
                                    
                                    @error('phone')
                                        <span>
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-field @error('address') has-error @enderror">
                            <label 
                                for="address"
                                class="@error('address') text-danger @enderror"
                            >
                                Location Address
                            </label>
                
                            <div class="relative">
                                <input 
                                    id="address" 
                                    name="address"
                                    type="text"
                                    placeholder="Location Address"
                                    class="form-input"
                                    
                                    value="{{ old('address', $appointmentLocation->address ?? '') }}"
                                />
                                
                                @error('address')
                                    <span>
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 space-y-3">
                        <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
                            Provider Details
                        </h5>

                        <div class="grid grid-cols-2 gap-4 justify-between">
                            <div class="form-field @error('first_name') has-error @enderror">
                                <label 
                                    for="first_name"
                                    class="@error('first_name') text-danger @enderror"
                                >
                                    First Name
                                </label>
                        
                                <div class="relative">
                                    <input 
                                        id="first_name" 
                                        name="first_name"
                                        type="text"
                                        placeholder="First Name"
                                        class="form-input"
                                        
                                        value="{{ old('first_name', $appointmentLocationProvider->first_name ?? '') }}"
                                    />
                                    
                                    @error('first_name')
                                        <span>
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-field @error('last_name') has-error @enderror">
                                <label 
                                    for="last_name"
                                    class="@error('last_name') text-danger @enderror"
                                >
                                    Last Name
                                </label>
                        
                                <div class="relative">
                                    <input 
                                        id="last_name" 
                                        name="last_name"
                                        type="text"
                                        placeholder="Last Name"
                                        class="form-input"
                                        
                                        value="{{ old('last_name', $appointmentLocationProvider->last_name ?? '') }}"
                                    />
                                    
                                    @error('last_name')
                                        <span>
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-field @error('npi') has-error @enderror">
                            <label 
                                for="npi"
                                class="@error('npi') text-danger @enderror"
                            >
                                NPI (National Provider Identifier)
                            </label>
                    
                            <div class="relative">
                                <input 
                                    id="npi" 
                                    name="npi"
                                    type="text"
                                    placeholder="NPI (National Provider Identifier)"
                                    class="form-input"
                                    
                                    value="{{ old('npi', $appointmentLocationProvider->npi ?? '') }}"
                                />
                                
                                @error('npi')
                                    <span>
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 justify-between mt-3">
                    <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 space-y-3">
                        <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">
                            Test(s)
                        </h5>

                        <div class="grid grid-cols-2 gap-4 justify-between">
                            @foreach ($appointmentTests ?? [] as $test)
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
                            
                                <div class="form-field space-y-3 @error('test_reference_option') has-error @enderror">
                                    <label for="test_reference_option">Reference Option</label>
                                
                                    <div class="relative">
                                        @foreach ($testReferenceOptions ?? [] as $testReferenceOptionCode => $testReferenceOptionName)
                                            <label class="inline-flex mt-1 cursor-pointer">
                                                <input 
                                                    type="radio" 
                                                    id="test_reference_option_{{ $testReferenceOptionCode }}"
                                                    name="test_reference_option[{{ $test->id }}]" 
                                                    class="form-radio" 
                                                    value="{{ $testReferenceOptionCode }}"

                                                    {{ old('test_reference_option') == $testReferenceOptionCode ? 'checked' : '' }}
                                                />
                                                <span class="text-white-dark">{{ $testReferenceOptionName }}</span>
                                            </label>
                                        @endforeach

                                        @error('test_reference_option')
                                            <span>
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                            @endforeach
                        </div>                        
                    </div>
                </div>
            </div>
            
        </div>

        <div class="panel mt-6">
            <div class="flex w-full">
                <div class="flex items-center justify-center w-1/2">
                    <a 
                        href="{{ route('admin.appointments.requisition.print', ['appointment' => $appointment,]) }}" 
                        x-tooltip="Requisition Print"
                        class="btn btn-primary rounded-full"
                    >
                        Print Requisition
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("appointmentRequisition", () => ({
                    init() {}
                }));
            });
        </script>
    @endpush
</x-layout.default>
