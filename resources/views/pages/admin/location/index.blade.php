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
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                LOCATIONS
                            </a>
                        </li>
                    </ol>
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
                                    <div class="mt-2" x-data="{ isChecked: {{ $location->status == 1 ? 'true' : 'false' }} }">
                                        <label class="w-12 h-6 relative">
                                            <input
                                                type="checkbox"
                                                x-model="isChecked"
                                                class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                                id="custom_switch_checkbox{{ $location->id }}"
                                                @change="updateLocationStatus({{ $location->id }}, isChecked)"
                                            />
                                            <span
                                                for="custom_switch_checkbox{{ $location->id }}"
                                                x-bind:class="{ 'bg-[#ebedf2] dark:bg-dark': !isChecked, 'bg-primary': isChecked }"
                                                class="block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 before:transition-all before:duration-300"
                                            ></span>
                                            <input type="hidden" x-bind:value="isChecked ? '1' : '0'" name="location_status" />
                                        </label>
                                        <span x-text="isChecked ? 'Active' : 'Inactive'"></span>
                                    </div>
                                </td>                                
                                
                                <td class="text-center">
                                    <ul class="flex items-center gap-2">
                                        <li>
                                            <a 
                                                href="{{ route('admin.location.providers.index', ['location' => $location,]) }}" 
                                                x-tooltip="Location Providers"
                                            >
                                                <svg width="24" height="24" viewBox="0 0 24 24" 
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4.5 h-4.5 text-success"
                                                >
                                                    <path d="M9 14.2354V17.0001C9 19.7615 11.2386 22.0001 14 22.0001H14.8824C16.7691 22.0001 18.3595 20.7311 18.8465 19.0001" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path d="M5.42857 3H5.3369C5.02404 3 4.86761 3 4.73574 3.01166C3.28763 3.13972 2.13972 4.28763 2.01166 5.73574C2 5.86761 2 6.02404 2 6.3369V7.23529C2 11.1013 5.13401 14.2353 9 14.2353C12.7082 14.2353 15.7143 11.2292 15.7143 7.521V6.3369C15.7143 6.02404 15.7143 5.86761 15.7026 5.73574C15.5746 4.28763 14.4267 3.13972 12.9785 3.01166C12.8467 3 12.6902 3 12.3774 3H12.2857" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <circle cx="19" cy="16" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M6 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                href="{{ route('admin.locations.edit', ['location' => $location,]) }}" 
                                                x-tooltip="Edit"
                                            >
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4.5 h-4.5 text-success">
                                                    <path
                                                        d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <path opacity="0.5"
                                                        d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <x-helpers.confirm 
                                                title="Delete?" 
                                                subtitle="Cannot undo after delete."
                                            >
                                                <x-slot name="trigger">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            class="w-5 h-5 text-danger">
                                                            <path d="M20.5001 6H3.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                            <path
                                                                d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path opacity="0.5" d="M9.5 11L10 16"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path opacity="0.5" d="M14.5 11L14 16"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                            <path opacity="0.5"
                                                                d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                stroke="currentColor" stroke-width="1.5" />
                                                        </svg>
                                                    </span>
                                                </x-slot>
                                            
                                                <form 
                                                    action="{{ route('admin.locations.destroy', ['location' => $location,]) }}"
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

    @push('scripts')
        <script src="/assets/js/simple-datatables.js"></script>
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
            function updateLocationStatus(locationId, isChecked) {
                console.error('locationId:', locationId);
                console.error('isChecked:', isChecked);
                
                fetch(`/api/admin/location-status/${locationId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        status: isChecked ? 1 : 0,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.error('data:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        </script>
    @endpush  
    
</x-layout.default>
