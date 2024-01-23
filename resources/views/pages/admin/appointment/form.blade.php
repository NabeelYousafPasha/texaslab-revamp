<x-layout.default>

    @push('stylesheets')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    <div x-data="appointments">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Appointments</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">APPOINTMENTS</h5>
                </div>
            </div>
            
            <div class="mt-3 mb-3">
                <x-helpers.form
                    :id="$form['id']"
                    :name="$form['name']"
                    :action="$form['action']"

                    :spoofed-type="$form['_method'] ?? NULL"
                >

                <div class="mb-5" x-data="{ tab: '{{ $step }}' }">
                    <div>
                        <ul class="flex flex-wrap mt-3 mb-5 border-b border-white-light dark:border-[#191e3a]">
                            <li>
                                <a 
                                    href="javascript:;"
                                    class="p-5 py-3 -mb-[1px] flex items-center relative before:transition-all before:duration-700 before:absolute hover:text-secondary before:bottom-0 before:w-0 before:left-0 before:right-0 before:m-auto before:h-[1px] before:bg-secondary hover:before:w-full"
                                    :class="{ 'before:!w-full text-secondary': tab === 'step1' }"
                                    @click="tab='step1'"
                                >
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                        <circle cx="12" cy="6" r="4"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <ellipse opacity="0.5" cx="12" cy="17" rx="7"
                                            ry="4" stroke="currentColor" stroke-width="1.5" />
                                    </svg>

                                    Schedule Appointment
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="javascript:;"
                                    class="p-5 py-3 -mb-[1px] flex items-center relative before:transition-all before:duration-700 hover:text-secondary before:absolute before:w-0 before:bottom-0 before:left-0 before:right-0 before:m-auto before:h-[1px] before:bg-secondary hover:before:w-full"
                                    :class="{ 'before:!w-full text-secondary': tab === 'step2' }"
                                    @click="tab='step2'"
                                >
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2"
                                    >
                                        <path opacity="0.5"
                                            d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>

                                    Appointment Details
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="javascript:;"
                                    class="p-5 py-3 -mb-[1px] flex items-center relative before:transition-all before:duration-700 hover:text-secondary before:absolute before:w-0 before:bottom-0 before:left-0 before:right-0 before:m-auto before:h-[1px] before:bg-secondary hover:before:w-full"
                                    :class="{ 'before:!w-full text-secondary': tab === 'step3' }"
                                    @click="tab='step3'"
                                >

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                        <path
                                            d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5894L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651M4.00289 5.74561C3.96765 5.12559 4.25823 4.56668 4.69185 4.13552L6.26145 2.57483C7.13596 1.70529 8.61028 1.83992 9.37326 2.85908L10.6342 4.54348C11.2507 5.36691 11.1841 6.49484 10.4775 7.19738L10.1907 7.48257"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M18.6763 18.9651C17.0469 19.117 13.0622 18.9492 8.8154 14.7266C4.81076 10.7447 4.09308 7.33182 4.00293 5.74561"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M16.1007 13.3589C16.1007 13.3589 15.0181 14.4353 12.0631 11.4971C9.10807 8.55886 10.1907 7.48242 10.1907 7.48242"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>

                                    Insurance Details
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="flex-1 text-sm ">
                        <template x-if="tab === 'step1'">
                            <div>
                                <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">            
                                    @includeIf('pages.admin.appointment._step1')
                                </div>

                                <div class="mb-4"></div>

                                <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                                    <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">Patient Details</h5>
                                    
                                    @includeIf('pages.admin.patient._form')
                                </div>
                            </div>
                        </template>
                        <template x-if="tab === 'step2'">
                            <div>
                                <div class="w-full bg-white rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">            
                                    @includeIf('pages.admin.appointment._step2')
                                </div>

                                <div class="mb-4"></div>
                            </div>
                        </template>
                        <template x-if="tab === 'step3'">
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </template>
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
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $('.select2').select2({ 
                width: '100%', 
                placeholder: "Select Option",
                allowClear: true
            });

            document.addEventListener("alpine:init", () => {
                Alpine.data("appointments", () => ({
                    form: null,
                    init() {
                        this.form = {};
                    }
                }));
            });
        </script>
    @endpush
</x-layout.default>
