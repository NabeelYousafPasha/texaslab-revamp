<div x-data="patientForm" class="space-y-3">

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
                    placeholder="First Name of Patient"
                    class="form-input"
                    
                    value="{{ old('first_name', $patient->first_name ?? '') }}"
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
                    placeholder="Last Name of Patient"
                    class="form-input"
                    
                    value="{{ old('last_name', $patient->last_name ?? '') }}"
                />
                
                @error('last_name')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('email') has-error @enderror">
            <label 
                for="email"
                class="@error('email') text-danger @enderror"
            >
                Email
            </label>

            <div class="relative">
                <input 
                    id="email" 
                    name="email"
                    type="email"
                    placeholder="Email of Patient"
                    class="form-input"
                    
                    value="{{ old('email', $patient->email ?? '') }}"
                />
                
                @error('email')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('gender') has-error @enderror">
            <label 
                for="gender"
                class="@error('gender') text-danger @enderror"
            >
                Gender
            </label>

            <div class="relative">
                <select 
                    id="gender"
                    name="gender" 
                    class="select2"
                    placeholder="Choose Gender..."
                >
                    @foreach ($genders ?? [] as $genderValue => $genderName)
                        <option
                            class="form-radio" 
                            value="{{ $genderValue }}"
                            @selected($genderValue == old('gender'))
                            @selected($genderValue == ($patient->gender->value ?? ''))
                        />
                            <span class="text-white-dark">{{ $genderName }}</span>
                        </option>
                    @endforeach
                </select>
                
                @error('gender')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('dob') has-error @enderror">
            <label 
                for="dob"
                class="@error('dob') text-danger @enderror"
            >
                DOB
            </label>

            <div class="relative">
                <input 
                    id="dob" 
                    name="dob"
                    type="date"
                    placeholder="DOB of Patient"
                    class="form-input"
                    
                    value="{{ old('dob', $patient->dob ?? '') }}"
                />
                
                @error('dob')
                    <span>
                        <p class="text-danger mt-1">{{ $message }}</p>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-field @error('cell_phone') has-error @enderror">
            <label 
                for="cell_phone"
                class="@error('cell_phone') text-danger @enderror"
            >
                Cell Phone
            </label>

            <div class="relative">
                <input 
                    id="cell_phone" 
                    name="cell_phone"
                    type="text"
                    placeholder="Cell Phone of Patient"
                    class="form-input"
                    
                    value="{{ old('cell_phone', $patient->cell_phone ?? '') }}"
                />
                
                @error('cell_phone')
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
                    placeholder="Address of Patient"
                    class="form-input"
                    
                    value="{{ old('address', $patient->address ?? '') }}"
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
                    placeholder="State of Patient"
                    class="form-input"
                    
                    value="{{ old('state', $patient->state ?? '') }}"
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
                class="@error('city') text-danger @enderror"
            >
                City
            </label>

            <div class="relative">
                <input 
                    id="city" 
                    name="city"
                    type="text"
                    placeholder="City of Patient"
                    class="form-input"
                    
                    value="{{ old('city', $patient->city ?? '') }}"
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
                    placeholder="Zipcode of Patient"
                    class="form-input"
                    
                    value="{{ old('zipcode', $patient->zipcode ?? '') }}"
                />
                
                @error('zipcode')
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
            Alpine.data("patientForm", () => ({

                fields: {},
                
                init() {},
            }));
        });
    </script>
@endpush