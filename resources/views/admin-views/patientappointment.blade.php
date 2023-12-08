{{-- @extends('layouts.home') --}}
{{-- @section('content') --}}
<x-layout.default>
    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="basic">
        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="mb-5">
                <div class="flex items-center justify-center gap-2">
                    <div x-data="modal">
                        <button type="button" class="btn btn-primary" @click="toggle">Create Appointment</button>
                        <div class="fixed height-vh inset-0 bg-[black]/60 z-[999]  hidden" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300
                                    class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8">
                                    <div
                                        class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <h5 class="font-bold text-lg">Add Appointment</h5>
                                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">

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
                                            <!-- custom styles -->
                                            <form class="space-y-5" id="appointmentForm" action="/api/store-appointment"
                                                method="GET">
                                                @csrf
                                                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                                                    <div class="md:col-span-2">
                                                        <label for="appointmentLocation">Locations</label>
                                                        <select id="appointmentLocation" class="location form-input"
                                                            name="location">
                                                            <option selected>Location</option>
                                                            <option value="healthcare">Sothern Health Care</option>
                                                            <option value="trshealth">TRS Health</option>
                                                        </select>
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <label for="appointmentTest">Tests</label>
                                                        <select id="appointmentTest" class="tests form-input"
                                                            name="test">
                                                            <option selected>Please Select Test</option>
                                                            <option value="covidtest">Covid Test</option>
                                                            <option value="uti">UTI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                                                    <div class="md:col-span-2">
                                                        <label for="appointmentProvider">Providers</label>
                                                        <select id="appointmentProvider" class="provider form-input"
                                                            name="provider">
                                                            <option selected>Providers</option>
                                                            <option value="healthcare">Sothern Health Care</option>
                                                            <option value="trshealth">TRS Health</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                                    <div>
                                                        <label for="Fname">First Name</label>
                                                        <input id="Fname" type="text"
                                                            placeholder="Enter First Name" class="form-input"
                                                            name="firstName" />
                                                    </div>
                                                    <div>
                                                        <label for="Lname">Last name</label>
                                                        <input id="Lname" type="text"
                                                            placeholder="Enter Last Name" class="form-input"
                                                            name="last_name" />
                                                    </div>
                                                    <div>
                                                        <label for="dob">Date of Birth</label>
                                                        <div class="flex">
                                                            <input id="dob" type="text"
                                                                placeholder="__/__/____" class="form-input"
                                                                name="dob" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                                    <div>
                                                        <label for="mail">Email</label>
                                                        <input id="mail" type="email" placeholder="Enter Email"
                                                            class="form-input" name="email" />
                                                    </div>
                                                    <div>
                                                        <label for="customLname">Phone Number</label>
                                                        <input id="customLname" type="text"
                                                            placeholder="Enter Phone Number" class="form-input"
                                                            name="phoneNumber" />
                                                    </div>
                                                    <div>
                                                        <label for="gender">Gender</label>
                                                        <div class="flex">
                                                            <select id="gender" class="gender form-input"
                                                                name="gender">
                                                                <option selected>Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                                    <div>
                                                        <label for="customeAddress">Address</label>
                                                        <input id="customeAddress" type="text"
                                                            placeholder="Enter Address" class="form-input"
                                                            name="address" />
                                                    </div>
                                                    <div>
                                                        <label for="customeCity">City</label>
                                                        <input id="customeCity" type="text"
                                                            placeholder="Enter City" class="form-input"
                                                            name="city" />
                                                    </div>
                                                    <div>
                                                        <label for="customeState">State</label>
                                                        <input id="customeState" type="text"
                                                            placeholder="Enter State" class="form-input"
                                                            name="state" />
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                                                    <div>
                                                        <label for="customeZip">Zip</label>
                                                        <input id="customeZip" type="text" placeholder="Enter Zip"
                                                            class="form-input" name="zip" />
                                                    </div>
                                                    <div>
                                                        <label for="customCounty">County</label>
                                                        <input id="customCounty" type="text"
                                                            placeholder="Enter County" class="form-input"
                                                            name="county" />
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                                    <div>
                                                        <label for="customAppointmentDate">Appointment Date</label>
                                                        <input id="customAppointmentDate" type="text"
                                                            placeholder="Appointment Date" class="form-input"
                                                            name="appointmentDate" />
                                                    </div>
                                                    <div>
                                                        <label for="appointmentTime">Appointment Time</label>
                                                        <select id="appointmentTime" class="timeslot form-input"
                                                            name="timeslot">
                                                            <option selected>Appointment Time</option>
                                                            <option value="9:00PM">9:00PM</option>
                                                            <option value="10:00PM">10:00PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="inline-flex cursor-pointer mt-1">
                                                        <input type="checkbox" class="form-checkbox"
                                                            name="isTerms" />
                                                        <span class="text-white-dark">Agree to terms and
                                                            conditions</span>
                                                    </label>
                                                </div>
                                                <button type="button"
                                                    class="btn btn-primary submit-form !mt-6">Submit
                                                    Form</button>
                                            </form>

                                        </div>
                                        <div
                                            class="flex
                                                    justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger"
                                                @click="toggle">Discard</button>
                                            <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                @click="toggle">Save</button>
                                        </div>
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
        <table id="appointmenttable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>                    
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="appointmentsTableBody">
                @foreach ($appointments as $key => $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ isset($appointment->patient->first_name ) && !empty($appointment->patient->first_name )
                         ? $appointment->patient->first_name : 'N/A' }}</td>

                        <td>{{ isset($appointment->patient->last_name ) && !empty($appointment->patient->last_name )
                            ? $appointment->patient->last_name : 'N/A' }}</td>

                        <td>{{ isset($appointment->patient->dob ) && !empty($appointment->patient->dob )
                            ? $appointment->patient->dob : 'N/A' }}</td>

                        <td>{{ isset($appointment->patient->email_address ) && !empty($appointment->patient->email_address )
                            ? $appointment->patient->email_address : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
{{-- @endsection --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/assets/js/nice-select2.js"></script>
    <script>
        let table = new DataTable('#appointmenttable');
        const form = document.getElementById("appointmentForm");
        function clearForm() {
            for (let i = 0; i < form.elements.length; i++) {
                const element = form.elements[i];
                switch (element.type) {
                    case "text":
                    case "textarea":
                    case "password":
                    case "number":
                    case "email":
                        element.value = "";
                    break;

                    case "radio":
                    case "checkbox":
                        element.checked = false;
                    break;

                    case "select-one":
                    case "select-multiple":
                        element.selectedIndex = -1;
                    break;
                }
            }
        }
        $(document).ready(function() {
            $(".submit-form").click(function(e) {
                e.preventDefault();
                var data = $('#appointmentForm').serialize();
                $.ajax({
                    type: 'get',
                    url: "/api/store-appointment",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        $('#create_new').html('....Please wait');
                    },
                    success: function(response) {
                        clearForm();
                        Swal.fire({
                            title: "Success",
                            text: "Appointment Created Successful",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 3000 // Automatically close after 3 seconds
                        });
                    },
                    complete: function(response) {
                        $('#create_new').html('Create New');
                    }
                });
            });
        });
        // document.addEventListener("DOMContentLoaded", function(e) {
        //     var els = document.querySelectorAll(".gender");
        //     els.forEach(function(select) {
        //         NiceSelect.bind(select);
        //     });
        // });

        // Alpine.js initialization
        // document.addEventListener("alpine:init", () => { 
        //     $.ajax({
        //         url: '/ajax/patient-appointments',
        //         method: 'GET',
        //         dataType: 'json',
        //         success: function(response) {
        //             console.log(response.appointments);
        //             const tableBody = document.getElementById('appointmentsTableBody');
        //             // Loop through the response data and create table rows
        //             for (const key in response) {
        //                 // Create a new table row
        //                 const row = document.createElement('tr');

        //                 // Create a cell for the property name
        //                 const keyCell = document.createElement('td');
        //                 keyCell.textContent = key;
        //                 row.appendChild(keyCell);

        //                 // Create a cell for the property value
        //                 const valueCell = document.createElement('td');
        //                 valueCell.textContent = response[key];
        //                 row.appendChild(valueCell);

        //                 // Append the row to the table body
        //                 tableBody.appendChild(row);
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });
    </script>


</x-layout.default>
