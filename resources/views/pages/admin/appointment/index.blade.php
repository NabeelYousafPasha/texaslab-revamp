<x-layout.default>
    
    <div x-data="appointments">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Appointments</a>
            </li>
        </ul>

        <div class="panel mt-6">

            <div class="flow-root">  
                <div class="float-left">
                    <ol class="flex text-gray-500 font-semibold dark:text-white-dark">
                        <li>
                            <a href="javascript:;">
                                APPOINTMENTS
                            </a>
                        </li>
                    </ol>
                </div>
                <div class="float-right">
                    <a 
                        href="{{ route('admin.appointments.create') }}"
                        class="btn btn-outline-primary"
                    >
                        + Add New
                    </a>
                </div>
            </div>
        </div>

        <div class="panel mt-6">
            <div class="mb-0">
                <div class="flex items-center gap-2">
                    <div x-data="modal">
                        <button 
                            type="button" 
                            class="btn btn-warning" 
                            @click="toggle"
                        >
                            Filters
                        </button>
                        <div
                            :class="open && '!block'" 
                            class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
                        >
                            <div class="flex items-start justify-center min-h-screen px-4">
                                <div 
                                    x-show="open" 
                                    x-transition 
                                    x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-4xl my-8"
                                >
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3"
                                    >
                                        <div class="font-bold text-lg">
                                            Filters
                                        </div>
                                        <button type="button" class="text-white-dark hover:text-dark"
                                            @click="toggle">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            
                                            @includeIf('pages.admin.appointment.filters.form')

                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button 
                                                type="button" 
                                                class="btn btn-outline-danger"
                                                @click="toggle"
                                            >
                                                Reset
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                @click="toggle"
                                            >
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel mt-6">
            <div class="mt-3">
                <div class="table-responsive mt-3">
                    <table 
                        id="appointmentsTable" 
                        class="whitespace-nowrap table-hover table-bordered"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Appointment Slot</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments ?? [] as $row => $appointment)
                                <tr>
                                    <td>{{ ++$row }}</td>
                                    <td>{{ $appointment->patient->first_name }}</td>
                                    <td>{{ $appointment->patient->last_name }}</td>
                                    <td>{{ $appointment->patient->email }}</td>
                                    <td>{{ $appointment->patient->dob }}</td>
                                    <td>{{ $appointment->patient->gender->name }}</td>
                                    <td>{{ $appointment->appointment }}</td>
                                    <td class="text-center">
                                        <ul class="flex items-center gap-2">
                                            {{-- <li>
                                                <a 
                                                    href="{{ route('admin.appointments.edit', ['appointment' => $appointment,]) }}" 
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
                                                        action="{{ route('admin.appointments.destroy', ['appointment' => $appointment,]) }}"
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
                                            </li> --}}
                                            @if (is_null($appointment->step))
                                                <li>
                                                    <a 
                                                        href="{{ route('admin.appointments.requisition', ['appointment' => $appointment,]) }}" 
                                                        x-tooltip="Requisition Print"
                                                    >
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM2.75 16.1437V4.99792H1.25V16.1437H2.75ZM22.75 16.1437V4.93332H21.25V16.1437H22.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75Z" fill="currentColor"></path>
                                                            <path opacity="0.5" d="M12 5.854V20.9999" stroke="currentColor" stroke-width="1.5"></path>
                                                            <path opacity="0.5" d="M5 9L9 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M5 13L9 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path opacity="0.5" d="M19 13L15 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                            <path d="M19 5.5V9.51029C19 9.78587 19 9.92366 18.9051 9.97935C18.8103 10.035 18.6806 9.97343 18.4211 9.85018L17.1789 9.26011C17.0911 9.21842 17.0472 9.19757 17 9.19757C16.9528 9.19757 16.9089 9.21842 16.8211 9.26011L15.5789 9.85018C15.3194 9.97343 15.1897 10.035 15.0949 9.97935C15 9.92366 15 9.78587 15 9.51029V6.95002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="/assets/js/simple-datatables.js"></script>
        <script>
            document.addEventListener("alpine:init", () => {
                Alpine.data("appointments", () => ({
                    datatable: null,
                    init() {
                        this.datatable = new simpleDatatables.DataTable('#appointmentsTable', {
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
                Alpine.data("modal", (initialOpenState = false) => ({
                    open: initialOpenState,

                    toggle() {
                        this.open = !this.open;
                    },
                }));
            });
        </script>
    @endpush
</x-layout.default>
