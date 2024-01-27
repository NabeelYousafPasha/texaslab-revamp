<x-layout.default>
    
    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>
        <link rel="stylesheet" href="{{ Vite::asset('resources/css/flatpickr.min.css') }}">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <div x-data="location">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Locations</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">LOCATIONS</h5>
                </div>
            </div>
            
            <div class="mt-3 mb-3">
                <x-helpers.form
                    :id="$form['id']"
                    :name="$form['name']"
                    :action="$form['action']"

                    :spoofed-type="$form['_method'] ?? NULL"
                >
                    @includeIf('pages.admin.location._form')

                    <button 
                        type="submit" 
                        class="btn btn-primary mt-6"
                        id="submitButton"
                    >
                        Submit
                    </button>
                </x-helpers.form>
            </div>
        </div>
    </div>
    @php
        if(isset($locationData->locationTiming)){
            $locationTimingData = [
                'start' => optional($locationData->locationTiming->first())->start_time,
                'end' => optional($locationData->locationTiming->first())->end_time,
                'blockstart' => optional($locationData->locationTiming->first())->block_start_time,
                'blockend' => optional($locationData->locationTiming->first())->block_end_time,
            ];
        }else{
            $locationTimingData = [];
        }
        if(isset($locationData->locationTiming)){
            $locationDayTimingData = [
                'mondaystart' => optional($locationData->dayTimings->where('day_of_week', 'monday')->first())->start_time,
                'mondayend' => optional($locationData->dayTimings->where('day_of_week', 'monday')->first())->end_time,

                'tuesdaystart' => optional($locationData->dayTimings->where('day_of_week', 'tuesday')->first())->start_time,
                'tuesdayend' => optional($locationData->dayTimings->where('day_of_week', 'tuesday')->first())->end_time,

                'wednesdaystart' => optional($locationData->dayTimings->where('day_of_week', 'wednesday')->first())->start_time,
                'wednesdayend' => optional($locationData->dayTimings->where('day_of_week', 'wednesday')->first())->end_time,

                'thursdaystart' => optional($locationData->dayTimings->where('day_of_week', 'thursday')->first())->start_time,
                'thursdayend' => optional($locationData->dayTimings->where('day_of_week', 'thursday')->first())->end_time,

                'fridaystart' => optional($locationData->dayTimings->where('day_of_week', 'friday')->first())->start_time,
                'fridayend' => optional($locationData->dayTimings->where('day_of_week', 'friday')->first())->end_time,

                'saturdaystart' => optional($locationData->dayTimings->where('day_of_week', 'saturday')->first())->start_time,
                'saturdayend' => optional($locationData->dayTimings->where('day_of_week', 'saturday')->first())->end_time,

                'sundaystart' => optional($locationData->dayTimings->where('day_of_week', 'sunday')->first())->start_time,
                'sundayend' => optional($locationData->dayTimings->where('day_of_week', 'sunday')->first())->end_time,
            ];
        }else{
            $locationDayTimingData = [];
        }
    @endphp
    @push('scripts')
        <!-- script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("locationForm", () => ({
                    fields: {},
                    init() {
                        this.form = {};
                    }
                }));

                Alpine.data("form", () => ({
                    fields: @json($locationTimingData),
                    init() {
                        flatpickr(document.getElementById('start-time'), {
                            defaultDate: this.fields.start,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('end-time'), {
                            defaultDate: this.fields.end,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('block-start-time'), {
                            defaultDate: this.fields.blockstart,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('block-end-time'), {
                            defaultDate: this.fields.blockend,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                    }
                }));

                Alpine.data("appointmenttime", () => ({
                    fields: @json($locationDayTimingData),
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
                        flatpickr(document.getElementById('wednesday-start-time'), {
                            defaultDate: this.wednesdaystart,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('wednesday-end-time'), {
                            defaultDate: this.wednesdayend,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('thursday-start-time'), {
                            defaultDate: this.thursdaystart,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('thursday-end-time'), {
                            defaultDate: this.thursdayend,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('friday-start-time'), {
                            defaultDate: this.fridaystart,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('friday-end-time'), {
                            defaultDate: this.fridayend,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('saturday-start-time'), {
                            defaultDate: this.saturdaystart,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('saturday-end-time'), {
                            defaultDate: this.saturdayend,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('sunday-start-time'), {
                            defaultDate: this.sundaystart,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                        flatpickr(document.getElementById('sunday-end-time'), {
                            defaultDate: this.sundayend,
                            noCalendar: true,
                            enableTime: true,
                            dateFormat: 'H:i'
                        })
                    }
                }));
            });
        </script>

        <script src="/assets/js/quill.js"></script>
        <script src="/assets/js/nice-select2.js"></script>
        <script src="/assets/js/flatpickr.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {
                // default
                let els = document.querySelectorAll(".selectize");
                
                // seachable
                let options = {
                    searchable: true
                };
                
                els.forEach(function(select) {
                    NiceSelect.bind(select, options);
                });
                
            });
        </script>
    @endpush
</x-layout.default>
