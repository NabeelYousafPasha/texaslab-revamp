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
                <div class="float-right">
                    <a 
                        href="{{ route('admin.panels.create') }}"
                        class="btn btn-outline-primary"
                    >
                        + Add New
                    </a>
                </div>
            </div>
            
            <div class="table-responsive mt-3">
                <table 
                    id="panelsTable" 
                    class="whitespace-nowrap table-hover table-bordered"
                >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Panel</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panels ?? [] as $row => $panel)
                            <tr>
                                <td>{{ ++$row }}</td>
                                <td>{{ $panel->name }}</td>
                                <td>{{ $panel->price }}</td>
                                <td>{{ $panel->status->name }}</td>
                                <td class="text-center">
                                    <ul class="flex items-center gap-2">
                                        <li>
                                            <a 
                                                href="{{ route('admin.panels.edit', ['panel' => $panel,]) }}" 
                                                x-tooltip="Edit"
                                            >
                                                EDIT
                                            </a>
                                        </li>
                                        <li>
                                            <x-helpers.confirm 
                                                title="Delete?" 
                                                subtitle="Cannot undo after delete."
                                            >
                                                <x-slot name="trigger">
                                                    <span>DELETE</span>
                                                </x-slot>
                                            
                                                <form 
                                                    action="{{ route('admin.panels.destroy', ['panel' => $panel,]) }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="font-medium focus:outline-none px-4 py-4 text-gray-500" 
                                                    >
                                                        DELETE
                                                    </button>
                                                </form>
                                            </x-confirm>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/assets/js/simple-datatables.js"></script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("panels", () => ({
                datatable: null,
                init() {
                    this.datatable = new simpleDatatables.DataTable('#panelsTable', {
                        sortable: false,
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    });
                }
            }));
        });
    </script>
</x-layout.default>
