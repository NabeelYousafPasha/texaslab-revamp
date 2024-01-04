@if($errors->any())
<div class="mb-5">
    <div class="flex-1 flex-wrap w-full justify-center">
        <div
            class="border border-gray-500/20 rounded-md shadow-[rgb(31_45_61_/_10%)_0px_2px_10px_1px] dark:shadow-[0_2px_11px_0_rgb(6_8_24_/_39%)] p-6 pt-12 mt-8 relative"
        >
            <div
                class="bg-danger absolute text-white-light ltr:left-6 rtl:right-6 -top-8 w-16 h-16 rounded-md flex items-center justify-center mb-5 mx-auto"
            >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                >
                    <circle opacity="0.5" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="1.5" />
                    <path d="M12 7V13" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" />
                    <circle cx="12" cy="16" r="1" fill="currentColor" />
                </svg>
            </div>
            <h5 class="text-danger text-lg font-semibold mb-3.5 dark:text-white-light">
                Error(s)
            </h5>
            <p class="text-white-dark text-[15px] mb-3.5">
                @foreach ($errors->all() as $count => $error)
                    {{ ++$count.' - '. $error }}
                    <br>
                @endforeach
            </p>
        </div>
    </div>
</div>
@endif