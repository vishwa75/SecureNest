<div>
    <div class="absolute inline-flex items-center space-x-2">
        <i class="text-white p-1 font-semibold material-icons">polymer</i>
        <span id="appName" class="text-white font-semibold transition-all" 
              :class="sideBarState ? 'opacity-100' : 'opacity-0'" 
              :style="sideBarState ? 'visibility: visible;' : 'visibility: hidden;'">Secure Nest</span>
    </div>
    <i id="openCloseArrow" class="absolute -right-3 top-2 border-gray-800 p-1 rounded-full bg-gray-200 text-black 
        material-icons flex items-center justify-center z-10 hover:bg-gray-800 hover:text-gray-200" 
        @click="sideBarState = !sideBarState">
        <span class="material-symbols-outlined">swap_horiz</span>
    </i>
</div>
<nav class="mt-16 flex-grow">
    <ul class="space-y-4">
        <li class="flex items-center space-x-2 text-white p-2 rounded-md hover:bg-gray-700 cursor-pointer transition-colors">
            <i class="material-icons">dashboard</i>
            <span class="font-semibold" :class="sideBarState ? 'opacity-100' : 'opacity-0'" 
                  :style="sideBarState ? 'visibility: visible;' : 'visibility: hidden;'">Home</span>
        </li>
        <!-- Add more menu items as needed -->
    </ul>
</nav>
