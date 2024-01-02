<x-layout.default>

    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/nice-select2.css') }}" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/uppy/1.16.1/uppy.min.css" rel="stylesheet" />

        <style>
        .uppy-StatusBar {
            background-color: #f7fafc;
        }
        .uppy-StatusBar:before,
        .uppy-StatusBar-progress {
            height: 3px;
        }
        </style>
        
    @endpush

    <div x-data="users">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Users</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">USERS</h5>
                </div>
            </div>
            
            <div class="mt-3 mb-3">
                <x-helpers.form
                    :id="$form['id']"
                    :name="$form['name']"
                    :action="$form['action']"

                    :spoofed-type="$form['_method'] ?? NULL"
                    :enctype="$form['enctype'] ?? NULL"
                >
                    @includeIf('pages.admin.user._form')

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
        <script src="/assets/js/nice-select2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uppy/1.16.1/uppy.min.js"></script>
        <script src="/assets/js/file-upload-with-preview.iife.js"></script>
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

            new FileUploadWithPreview.FileUploadWithPreview('myFirstImage', {
                images: {
                    baseImage: '',
                    backgroundImage: '',
                },
            });

            document.addEventListener("alpine:init", () => {
                Alpine.data("users", () => ({
                    form: null,
                    init() {
                        this.form = {};
                    }
                }));
            });
        </script>

    @endpush
</x-layout.default>
