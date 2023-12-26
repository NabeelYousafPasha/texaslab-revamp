<x-layout.default>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <div x-data="panels">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Panels</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">PANELS</h5>
                </div>
            </div>
            
            <div class="mt-3 mb-3">
                <x-helpers.form
                    id="create_form__panel"
                    name="create_form__panel"
                    :action="route('admin.panels.store')"
                >
                    @includeIf('pages.admin.panel._form')

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

    <script src="/assets/js/quill.js"></script>
    <script src="/assets/js/nice-select2.js"></script>
    <script>

        // default
        let els = document.querySelectorAll(".selectize");
        
        // seachable
        let options = {
            searchable: true
        };
        
        els.forEach(function(select) {
            NiceSelect.bind(select, options);
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
</x-layout.default>
