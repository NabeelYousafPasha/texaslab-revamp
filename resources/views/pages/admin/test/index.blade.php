<x-layout.default>
    
    <div x-data="tests">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Tests</a>
            </li>
        </ul>

        <div class="panel mt-6">
            <h5 class="font-semibold text-lg dark:text-white-light">TESTS</h5>
            <table id="testsTable" class="whitespace-nowrap table-hover"></table>
        </div>
    </div>

    <script src="/assets/js/simple-datatables.js"></script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("tests", () => ({
                datatable: null,
                init() {
                    this.datatable = new simpleDatatables.DataTable('#testsTable', {
                        data: {
                            headings: ["ID", "Name",],
                            data: [
                                [1, 'Caroline',],
                                [2, 'Celeste',],
                                [3, 'Tillman',],
                                [4, 'Daisy',],
                                [5, 'Weber',],
                                [6, 'Buckley',],
                                [7, 'Latoya',],
                                [8, 'Kate',],
                                [9, 'Marva',],
                                [10, 'Decker',],
                                [11, 'Odom',],
                                [12, 'Sellers',],
                                [13, 'Wendi',],
                                [14, 'Sophie',],
                            ]
                        },
                        sortable: false,
                        searchable: false,
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
