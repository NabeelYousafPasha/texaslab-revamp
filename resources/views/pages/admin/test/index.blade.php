<x-layout.default>
    <script defer src="/assets/js/apexcharts.js"></script>
    <div x-data="tests">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Tests</a>
            </li>
        </ul>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("tests", () => ({
                init() {
                    isDark = this.$store.app.theme === "dark" || this.$store.app.isDarkMode ? true :
                        false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;
                },
            }));
        });
    </script>
</x-layout.default>
