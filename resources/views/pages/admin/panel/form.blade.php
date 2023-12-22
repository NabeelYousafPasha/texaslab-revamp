<x-layout.default>
    
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

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="/assets/js/quill.js"></script>
    <script>    
        // let quill = new Quill('#quill', {
        //     theme: 'snow',
        // });
        
        // let toolbar = quill.container.previousSibling;
        // toolbar.querySelector('.ql-picker').setAttribute('title', 'Font Size');
        // toolbar.querySelector('button.ql-bold').setAttribute('title', 'Bold');
        // toolbar.querySelector('button.ql-italic').setAttribute('title', 'Italic');
        // toolbar.querySelector('button.ql-link').setAttribute('title', 'Link');
        // toolbar.querySelector('button.ql-underline').setAttribute('title', 'Underline');
        // toolbar.querySelector('button.ql-clean').setAttribute('title', 'Clear Formatting');
        // toolbar.querySelector('[value=ordered]').setAttribute('title', 'Ordered List');
        // toolbar.querySelector('[value=bullet]').setAttribute('title', 'Bullet List');

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
