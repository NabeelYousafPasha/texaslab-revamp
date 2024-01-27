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
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                LOCATIONS
                            </a>
                        </li>
                    </ol>
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
