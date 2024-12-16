<div id="head" class="flex">
    <div class="w-full">
        <header class="flex bg-white justify-between h-20 border-purple-500 border-b-2 items-center px-6">
            <div id="left-header" class="">
            </div>
            <div id="right-header" class="flex text-gray-800 hover:text-gray-600 space-x-3">
                <span class="text-lg font-semibold">{{ Auth::user()->name }}</span>
                <img width="32" height="32" src="https://img.icons8.com/windows/32/user-male-circle.png"
                    alt="user-male-circle" />
                <img wire:click="logout" width="30" height="30" class="hover:cursor-pointer"
                    src="https://img.icons8.com/ios-glyphs/30/shutdown--v1.png" alt="shutdown--v1" />
        </header>
    </div>
</div>