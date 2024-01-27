<x-layout.default>
    
    @push('stylesheets')
    @endpush

    <div x-data="locationProviderForm">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Location Providers</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                LOCATION PROVIDERS
                            </a>
                        </li>
                        <li class="before:content-['/'] before:px-1.5">
                            <a href="javascript:;" class="text-black dark:text-white-light hover:text-black/70 dark:hover:text-white-light/70">
                                {{ $location->name }}
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
                    @includeIf('pages.admin.location-provider._form')

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
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("locationProviderForm", () => ({
                    fields: {},
                    init() {
                        this.form = {};
                    }
                }));
            });
        </script>
    @endpush
</x-layout.default>
