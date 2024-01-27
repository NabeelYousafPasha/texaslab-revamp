<x-layout.default>

    @push('stylesheets')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    <div x-data="panels">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Patients</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                PATIENTS
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
                    @includeIf('pages.admin.patient._form')

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
                Alpine.data("panels", () => ({
                    form: null,
                    init() {
                        this.form = {};
                    }
                }));
            });
        </script>
    @endpush
</x-layout.default>
