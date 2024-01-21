<div x-data="patientInsuranceForm" class="space-y-3">

    <div class="form-field @error('name') has-error @enderror">
        <label 
            for="name" 
            class="@error('name') text-danger @enderror"
        >
            Name
        </label>

        <div class="relative">
            <input 
                id="name" 
                name="name"
                type="text"
                placeholder="Name"
                class="form-input"
                
                value="{{ old('name', $patientInsurance->name ?? '') }}"
            />
            
            @error('name')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-4 justify-between">

        <div class="form-field space-y-3 @error('responsible_relationship') has-error @enderror">
            <label 
                for="responsible_relationship"
                class="@error('responsible_relationship') text-danger @enderror"
            >
                Relationship with Responsible Party
            </label>
        
            <div class="relative">
                <select 
                    id="responsible_relationship"
                    name="responsible_relationship" 
                    class="select2"
                    placeholder="Choose Relationship with Responsible Party..."
                >
                    @foreach ($insuranceResponsibleRelationsips ?? [] as $responsibleRelationsipCode => $responsibleRelationsipValue)
                        <option
                            class="form-radio" 
                            value="{{ $responsibleRelationsipCode }}"
                            {{ ($responsibleRelationsipCode == old('responsible_relationship')) ? 'selected' : '' }} 
                        />
                            <span class="text-white-dark">{{ $responsibleRelationsipValue }}</span>
                        </option>
                    @endforeach
                </select>
    
                @error('responsible_relationship')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('subscriber_member_id') has-error @enderror">
            <label 
                for="subscriber_member_id" 
                class="@error('subscriber_member_id') text-danger @enderror"
            >
                Subscriber Member ID
            </label>

            <div class="relative">
                <input 
                    id="subscriber_member_id" 
                    name="subscriber_member_id"
                    type="text"
                    placeholder="Subscriber Member ID"
                    class="form-input"
                    
                    value="{{ old('subscriber_member_id', $patientInsurance->subscriber_member_id ?? '') }}"
                />
                
                @error('subscriber_member_id')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('carrier_code') has-error @enderror">
            <label 
                for="carrier_code" 
                class="@error('carrier_code') text-danger @enderror"
            >
                Carrier Code
            </label>

            <div class="relative">
                <input 
                    id="carrier_code" 
                    name="carrier_code"
                    type="text"
                    placeholder="Carrier Code"
                    class="form-input"
                    
                    value="{{ old('carrier_code', $patientInsurance->carrier_code ?? '') }}"
                />
                
                @error('carrier_code')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="form-field @error('address') has-error @enderror">
            <label 
                for="address"
                class="@error('address') text-danger @enderror"
            >
                Address
            </label>

            <div class="relative">
                <input 
                    id="address" 
                    name="address"
                    type="text"
                    placeholder="Address"
                    class="form-input"
                    
                    value="{{ old('address', $patientInsurance->address ?? '') }}"
                />
                
                @error('address')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('state') has-error @enderror">
            <label 
                for="state"
                class="@error('state') text-danger @enderror"
            >
                State
            </label>

            <div class="relative">
                <input 
                    id="state" 
                    name="state"
                    type="text"
                    placeholder="State"
                    class="form-input"
                    
                    value="{{ old('state', $patientInsurance->state ?? '') }}"
                />
                
                @error('state')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('city') has-error @enderror">
            <label 
                for="city"
                class="@error('state') text-danger @enderror"
            >
                City
            </label>

            <div class="relative">
                <input 
                    id="city" 
                    name="city"
                    type="text"
                    placeholder="City"
                    class="form-input"
                    
                    value="{{ old('city', $patientInsurance->city ?? '') }}"
                />
                
                @error('city')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('zipcode') has-error @enderror">
            <label 
                for="zipcode"
                class="@error('zipcode') text-danger @enderror"
            >
                Zipcode
            </label>

            <div class="relative">
                <input 
                    id="zipcode" 
                    name="zipcode"
                    type="text"
                    placeholder="Zipcode"
                    class="form-input"
                    
                    value="{{ old('zipcode', $patientInsurance->zipcode ?? '') }}"
                />
                
                @error('zipcode')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('employer_no') has-error @enderror">
            <label 
                for="employer_no"
                class="@error('employer_no') text-danger @enderror"
            >
                Employer No
            </label>

            <div class="relative">
                <input 
                    id="employer_no" 
                    name="employer_no"
                    type="text"
                    placeholder="Employer No"
                    class="form-input"
                    
                    value="{{ old('employer_no', $patientInsurance->employer_no ?? '') }}"
                />
                
                @error('employer_no')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('ssn') has-error @enderror">
            <label 
                for="ssn"
                class="@error('ssn') text-danger @enderror"
            >
                Insured SSN # (If Not Patient)
            </label>

            <div class="relative">
                <input 
                    id="ssn" 
                    name="ssn"
                    type="text"
                    placeholder="Social Security number (SSN)"
                    class="form-input"
                    
                    value="{{ old('ssn', $patientInsurance->ssn ?? '') }}"
                />
                
                @error('ssn')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('is_worker_compensated') has-error @enderror">
            <label 
                for="is_worker_compensated"
                class="@error('is_worker_compensated') text-danger @enderror"
            >
                Worker Compensation
            </label>

            <label class="w-12 h-6 relative">
                <input 
                    id="is_worker_compensated" 
                    name="is_worker_compensated"
                    type="checkbox" 
                    value="1"
                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                    @checked(old('is_worker_compensated'))
                >
                <span 
                    for="is_worker_compensated" 
                    class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"
                ></span>
            </label>
                
            @error('is_worker_compensated')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>

        <div class="form-field space-y-3 @error('insurance_plans') has-error @enderror" x-data="
        {
            insurancePlans: {{ $insurancePlans ?? '' }}
        }">
            <label 
                for="insurance_plans"
                class="@error('insurance_plans') text-danger @enderror"
            >
                Insurance Plans
            </label>
        
            <div class="relative">
                @foreach ($insurancePlans ?? [] as $planId => $planName)
                    <label class="inline-flex">
                        <input 
                            id="insurance_plan_{{ $planId }}"
                            type="checkbox" 
                            name="insurance_plans[]"
                            value="{{ $planId }}"
                            class="form-checkbox outline-primary" 
                            @checked(in_array($planId, old('insurance_plans', [])))
                        />
                        <span class="mr-5">{{ $planName }}</span>
                    </label>
                @endforeach

                @error('insurance_plans')
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
            Alpine.data("patientInsuranceForm", () => ({

                fields: {},
                
                init() {},
            }));
        });
    </script>
@endpush