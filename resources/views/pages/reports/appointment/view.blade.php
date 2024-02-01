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

        <div class="mt-6">
            <div class="grid sm:grid-cols-1 xl:grid-cols-1 gap-6 mb-6">

                <div class="panel h-full">
                    <div class="flex items-center justify-between dark:text-white-light mb-5">
                        <h5 class="font-semibold text-lg">
                            Columns 
                        </h5>
                    </div>
                    <div class="mb-3">
                        <div class="flex flex-wrap flex-row dark:text-white-light gap-8">
                            @foreach ($columns as $columnValue => $column)
                                <label class="inline-flex">
                                    <input 
                                        id="{{ $columnValue }}"
                                        name="columns[{{ $columnValue }}]"
                                        type="checkbox" 
                                        value="{{ $columnValue }}"
                                        class="form-checkbox outline-primary" 
                                        @checked($column['checked'] ?? FALSE)
                                    />
                                    <span>{{ $column['display_name'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

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
