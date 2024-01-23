<div class="step1" class="space-y-3">

    <div class="form-field space-y-3 @error('location_id') has-error @enderror" 
    x-data="{
        locations: {{ $locations ?? '' }}
    }">
        <label 
            for="location_id"
            class="@error('location_id') text-danger @enderror"
        >
            Location
        </label>
    
        <div class="relative">
            <select 
                id="location_id"
                name="location_id" 
                class="select2"
                placeholder="Choose Location"
                @required(true)
            >
                <option value="">Please Select a Location first</option>
                @foreach ($locations ?? [] as $locationId => $locationName)
                    <option
                        class="form-radio" 
                        value="{{ $locationId }}"
                        @selected($locationId == old('location_id'))
                        @selected($locationId == $currentAppointment->location_id ?? '')
                    />
                        <span class="text-white-dark">{{ $locationId .' - '. $locationName }}</span>
                    </option>
                @endforeach
            </select>

            @error('location_id')
                <span>
                    <p class="text-danger mt-1">{{ $message }}</p>
                </span>
            @enderror
        </div>
    </div>

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
                    
                    value="{{ old('appointment_date', $currentAppointment->appointment_date ?? '') }}"
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
                    
                    value="{{ old('appointment_time', $currentAppointment->appointment_time ?? '') }}"
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