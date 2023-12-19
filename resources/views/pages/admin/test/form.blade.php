<x-layout.default>
    
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
                    id="create_form__test"
                    name="create_form__test"
                    :action="route('admin.tests.store')"
                >
                    @include('pages.admin.test._form')

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

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("tests", () => ({
                form: null,
                init() {
                    this.form = {};
                }
            }));
        });
    </script>
</x-layout.default>
