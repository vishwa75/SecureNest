<div>
    <div class="absolute inline-flex items-center space-x-2">
        <i class="text-white p-1 font-semibold material-icons">polymer</i>
        <span id="appName" class="text-white font-semibold transition-all">Secure Nest</span>
    </div>
    <i id="openCloseArrow" class="absolute -right-3 top-2 border-gray-800 p-1 rounded-full bg-gray-200 text-black 
        material-icons flex items-center justify-center z-10 hover:bg-gray-800 hover:text-gray-200 cursor-pointer">
        <span class="material-symbols-outlined">swap_horiz</span>
    </i>
</div>
<nav class="mt-16 flex-grow">
    <ul class="space-y-4">
        <li class="flex items-center space-x-2 text-white p-2 rounded-md hover:bg-gray-700 cursor-pointer transition-colors">
            <i class="material-icons">dashboard</i>
            <span class="font-semibold menu-item">Home</span>
        </li>
        <!-- Add more menu items as needed -->
    </ul>
</nav>

<script>
    $(document).ready(function () {
        let sideBarState = true; // Initialize sidebar state
        
        // Toggle sidebar state and visibility
        $("#openCloseArrow").click(function () {
            sideBarState = !sideBarState; // Toggle the state

            // Update app name visibility
            if (sideBarState) {
                $("#appName").css({ visibility: "visible", opacity: 1 });
            } else {
                $("#appName").css({ visibility: "hidden", opacity: 0 });
            }

            // Update menu item visibility
            $(".menu-item").each(function () {
                if (sideBarState) {
                    $(this).css({ visibility: "visible", opacity: 1 });
                } else {
                    $(this).css({ visibility: "hidden", opacity: 0 });
                }
            });
        });
    });
</script>
