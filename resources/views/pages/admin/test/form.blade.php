<x-layout.default>

    @push('stylesheets')
        {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
        <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/nice-select2.css') }}" />
    @endpush

    <div x-data="tests">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Tests</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">TESTS</h5>
                </div>
            </div>
            
            <div class="mt-3 mb-3">

                <x-helpers.form
                    :id="$form['id']"
                    :name="$form['name']"
                    :action="$form['action']"

                    :spoofed-type="$form['_method'] ?? NULL"
                >   
                    @includeIf('pages.admin.test._form')

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
        {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script> --}}
        <script src="/assets/js/quill.js"></script>
        <script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
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
                Alpine.data("tests", () => ({
                    form: null,
                    init() {
                        this.form = {};
                    }
                }));
            });
        </script>
    @endpush
</x-layout.default>
