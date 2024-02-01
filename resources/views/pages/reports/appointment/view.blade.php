<x-layout.default>
    
    <div x-data="reports">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Reports</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                REPORTS
                            </a>
                        </li>
                        <li class="before:content-['/'] before:px-1.5">
                            <a href="javascript:;" class="text-black dark:text-white-light hover:text-black/70 dark:hover:text-white-light/70">
                                APPOINTMENT
                            </a>
                        </li>
                    </ol>
                </div>
                <div class="float-right">
                    
                </div>
            </div>
        </div>

        <div class="panel mt-6">
            <div class="mt-3">
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("reports", () => ({
                    datatable: null,
                    init() {
                    },
                }));
            });
        </script>
    @endpush
</x-layout.default>
