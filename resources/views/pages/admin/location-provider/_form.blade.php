<div x-data="locationProviderForm" class="space-y-3">
    
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
                    
                    value="{{ old('first_name', $locationProvider->first_name ?? '') }}"
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
                    
                    value="{{ old('last_name', $locationProvider->last_name ?? '') }}"
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
                
                value="{{ old('npi', $locationProvider->npi ?? '') }}"
            />
            
            @error('npi')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

</div>