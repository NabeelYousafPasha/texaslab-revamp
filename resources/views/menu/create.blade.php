
<x-layout.default>
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <div x-data="form">
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add Menu</h5>
                </div>
                <div class="mb-5">
                    <form method="POST" action="{{ route('menu.store') }}">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="parent">Parent:</label>
                            <select name="parent" id="parent" class="selectize" multiple>
                                @foreach ($MenuItems as $items)
                                    <option value="{{ $items->label }}">{{ $items->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-5">
                            <label for="label">Menu Label:</label>
                            <input type="text" name="label" id="label" class="form-input">
                        </div>
                        <div class="form-group mt-3">
                            <label for="url">URL:</label>
                            <input type="text" name="url" id="url" class="form-input">
                        </div>
                        <div class="form-group mt-3">
                            <label for="url">Icon:</label>
                            <input type="text" name="icon" class="form-input" id="icon-picker">
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-md-12 col-form-label text-left">{{ __('Role') }}</label>

                            <div class="col-md-12">
                                <select name="roles[]" class="selectize" multiple='multiple'>
                                    @foreach ($roles as $role)
                                        <option  value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Add Menu Item</button>
                    </form>
                </div>
                <template x-if="codeArr.includes('code1')">
                    <pre class="code overflow-auto !bg-[#191e3a] p-4 rounded-md text-white">    &lt;!-- input text --&gt;
                        &lt;form&gt;
                            &lt;input type="text" placeholder="Enter Permission" class="form-input" required /&gt;
                            &lt;button type="submit" class="btn btn-primary mt-6"&gt;Submit&lt;/button&gt;
                        &lt;/form&gt;
                    </pre>
                </template>
            </div>
        </div>
    </div>
    <style>
        .iconpicker-popover{
            left: 20px !important;
        }
    </style>
    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->
    <script src="/assets/js/nice-select2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
           
        </script>
    @endif
    <script>
        $(document).ready(function () {
            $('#icon-picker').iconpicker();
            $('#icon-picker').on('iconpickerSelected', function (event) {
                $('#icon').val(event.iconpickerValue);
            });
        });
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({

                // highlightjs
                codeArr: [],
                toggleCode(name) {
                    if (this.codeArr.includes(name)) {
                        this.codeArr = this.codeArr.filter((d) => d != name);
                    } else {
                        this.codeArr.push(name);

                        setTimeout(() => {
                            document.querySelectorAll('pre.code').forEach(el => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                }
            }));
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });
        });
       
    </script>
    <style>
        /* range picker */
        input[type=range] {
            -webkit-appearance: none;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 8px;
            background: #dee2e6;
            border: none;
            border-radius: 3px;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            border: none;
            height: 16px;
            width: 16px;
            border-radius: 50%;
            background: #4361ee;
            margin-top: -4px;
        }

        .dark input[type=range]::-webkit-slider-runnable-track {
            background: #1b2e4b;
        }

        .dark input[type=range] {
            background-color: transparent;
        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]:active::-webkit-slider-thumb {
            background: #4361eec2;
            cursor: pointer;
        }
    </style>
</x-layout.default>
