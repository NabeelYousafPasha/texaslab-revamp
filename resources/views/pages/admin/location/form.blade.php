<x-layout.default>
    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/flatpickr.min.css') }}">
    

    <div x-data="location">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Location</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">LOCATION</h5>
                </div>
            </div>
            
            <div class="mt-3 mb-3">
                <x-helpers.form
                    :id="$form['id']"
                    :name="$form['name']"
                    :action="$form['action']"

                    :spoofed-type="$form['_method'] ?? NULL"
                >
                    @csrf
                    @includeIf('pages.admin.location._form')

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
</x-layout.default>
