<div x-data="appointmentForm" class="space-y-3">

    <div class="form-field @error('insurance.name') has-error @enderror">
        <label 
            for="insurance['name']" 
            class="@error('insurance.name') text-danger @enderror"
        >
            Insurance Name
        </label>

        <div class="relative">
            <input 
                id="insurance['name']" 
                name="insurance['name']"
                type="text"
                placeholder="Insurance Name"
                class="form-input"
                
                value="{{ old('insurance.name') }}"
            />
            
            @error('insurance.name')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.relationship') has-error @enderror">
        <label 
            for="insurance['relationship']" 
            class="@error('insurance.relationship') text-danger @enderror"
        >
            Patient's Relationship to Responsible Party
        </label>

        <div class="relative">
            <select 
                id="insurance['relationship']"
                name="insurance['relationship']" 
                class="select2"
                placeholder="Choose Patient's Relationship to Responsible Party"
            >
                @foreach ($genders ?? [] as $genderValue => $genderName)
                    <option
                        class="form-radio" 
                        value="{{ $genderValue }}"
                        {{ ($genderValue == old('gender')) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark">{{ $genderName }}</span>
                    </option>
                @endforeach
            </select>
            
            @error('insurance.relationship')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.policy') has-error @enderror">
        <label 
            for="insurance['policy']" 
            class="@error('insurance.policy') text-danger @enderror"
        >
            Insurance Policy
        </label>

        <div class="relative">
            <input 
                id="insurance['policy']" 
                name="insurance['policy']"
                type="text"
                placeholder="Insurance Policy"
                class="form-input"
                
                value="{{ old('insurance.policy') }}"
            />
            
            @error('insurance.policy')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.group') has-error @enderror">
        <label 
            for="insurance['group']" 
            class="@error('insurance.group') text-danger @enderror"
        >
            Insurance Group
        </label>

        <div class="relative">
            <input 
                id="insurance['group']" 
                name="insurance['group']"
                type="text"
                placeholder="Insurance Group"
                class="form-input"
                
                value="{{ old('insurance.group') }}"
            />
            
            @error('insurance.group')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.member_id') has-error @enderror">
        <label 
            for="insurance['member_id']" 
            class="@error('insurance.member_id') text-danger @enderror"
        >
            Insurance Subscriber Member Id
        </label>

        <div class="relative">
            <input 
                id="insurance['member_id']" 
                name="insurance['member_id']"
                type="text"
                placeholder="Insurance Subscriber Member Id"
                class="form-input"
                
                value="{{ old('insurance.member_id') }}"
            />
            
            @error('insurance.member_id')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.carrier_code') has-error @enderror">
        <label 
            for="insurance['carrier_code']" 
            class="@error('insurance.carrier_code') text-danger @enderror"
        >
            Insurance Carrier Code
        </label>

        <div class="relative">
            <input 
                id="insurance['carrier_code']" 
                name="insurance['carrier_code']"
                type="text"
                placeholder="Insurance Subscriber Member Id"
                class="form-input"
                
                value="{{ old('insurance.carrier_code') }}"
            />
            
            @error('insurance.carrier_code')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.address') has-error @enderror">
        <label 
            for="insurance['address']" 
            class="@error('insurance.address') text-danger @enderror"
        >
            Insurance Address
        </label>

        <div class="relative">
            <input 
                id="insurance['address']" 
                name="insurance['address']"
                type="text"
                placeholder="Insurance Address"
                class="form-input"
                
                value="{{ old('insurance.address') }}"
            />
            
            @error('insurance.address')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.state') has-error @enderror">
        <label 
            for="insurance['state']"
            class="@error('insurance.state') text-danger @enderror"
        >
            State
        </label>

        <div class="relative">
            <input 
                id="insurance['state']" 
                name="insurance['state']"
                type="text"
                placeholder="Insurance State"
                class="form-input"
                
                value="{{ old('insurance.state') }}"
            />
            
            @error('insurance.state')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.city') has-error @enderror">
        <label 
            for="insurance['city']"
            class="@error('insurance.city') text-danger @enderror"
        >
            City
        </label>

        <div class="relative">
            <input 
                id="insurance['city']" 
                name="insurance['city']"
                type="text"
                placeholder="Insurance City"
                class="form-input"
                
                value="{{ old('insurance.city') }}"
            />
            
            @error('insurance.city')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.zip_code') has-error @enderror">
        <label 
            for="insurance['zip_code']"
            class="@error('insurance.zip_code') text-danger @enderror"
        >
            Zip Code
        </label>

        <div class="relative">
            <input 
                id="insurance['zip_code']" 
                name="insurance['zip_code']"
                type="text"
                placeholder="Insurance Zip Code"
                class="form-input"
                
                value="{{ old('insurance.zip_code') }}"
            />
            
            @error('insurance.zip_code')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.employer') has-error @enderror">
        <label 
            for="insurance['employer']"
            class="@error('insurance.employer') text-danger @enderror"
        >
            Employer
        </label>

        <div class="relative">
            <input 
                id="insurance['employer']" 
                name="insurance['employer']"
                type="text"
                placeholder="Insurance Employer"
                class="form-input"
                
                value="{{ old('insurance.employer') }}"
            />
            
            @error('insurance.employer')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.insured_ss') has-error @enderror">
        <label 
            for="insurance['insured_ss']"
            class="@error('insurance.insured_ss') text-danger @enderror"
        >
            Insured SS #
        </label>

        <div class="relative">
            <input 
                id="insurance['insured_ss']" 
                name="insurance['insured_ss']"
                type="text"
                placeholder="Insurance Insured SS #"
                class="form-input"
                
                value="{{ old('insurance.insured_ss') }}"
            />
            
            @error('insurance.insured_ss')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-field @error('insurance.worker_copm') has-error @enderror">
        <label 
            for="insurance['worker_copm']" 
            class="@error('insurance.worker_copm') text-danger @enderror"
        >
            Worker's Copm
        </label>

        <div class="relative">
            <select 
                id="insurance['worker_copm']"
                name="insurance['worker_copm']" 
                class="select2"
                placeholder="Worker's Copm"
            >
                @foreach ($genders ?? [] as $genderValue => $genderName)
                    <option
                        class="form-radio" 
                        value="{{ $genderValue }}"
                        {{ ($genderValue == old('gender')) ? 'selected' : '' }} 
                    />
                        <span class="text-white-dark">{{ $genderName }}</span>
                    </option>
                @endforeach
            </select>
            
            @error('insurance.worker_copm')
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