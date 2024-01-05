<x-layout.default>
    
    <div x-data="locations">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Locations</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <h5 class="font-semibold text-lg dark:text-white-light">Locations</h5>
                </div>
                <div class="float-right">
                    <a 
                        href="{{ route('admin.locations.create') }}"
                        class="btn btn-outline-primary"
                    >
                        + Add New
                    </a>
                </div>
            </div>
            
            <div class="table-responsive mt-3">
                <table 
                    id="locationsTable" 
                    class="whitespace-nowrap table-hover table-bordered"
                >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations ?? [] as $row => $location)
                            <tr>
                                <td>{{ ++$row }}</td>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->address }}</td>
                                <td>
                                    <div class="mt-2" x-data="{ isChecked: false }">
                                        <label class="w-12 h-6 relative">
                                            <input
                                                type="checkbox"
                                                x-model="isChecked"
                                                class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                                id="custom_switch_checkbox4"
                                            />
                                            <span
                                                for="custom_switch_checkbox4"
                                                x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                                class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                            ></span>
                                            <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="location_status" />
                                        </label>
                                    </div>                                    
                                </td>
                                <td class="text-center">
                                    <span class="flex-align" style="white-space: nowrap;">
                                        <a  class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $location->id }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </span>
                                    <div class="modal fade" id="deleteModal{{ $location->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $location->id }}" aria-hidden="true">
                                        <!-- ... (rest of the modal structure) ... -->
                                    </div>
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
        function confirmDelete(locationId) {
            // Show a confirmation dialog
            if (confirm("Are you sure you want to delete this location?")) {
                // If the user confirms, initiate the deletion
                deleteLocation(locationId);
            }
        }
    
        function deleteLocation(locationId) {
            // Perform the deletion, you can use AJAX or redirect to a delete route
            // Here, I'm redirecting to a hypothetical route 'delete.location'
            window.location.href = "{{ url('delete/location') }}/" + locationId;
        }
    </script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("locations", () => ({
                datatable: null,
                init() {
                    this.datatable = new simpleDatatables.DataTable('#locationsTable', {
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
