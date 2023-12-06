<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <button wire:click="downloadAppApk" wire:loading.attr="disabled"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-1 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800
            flex w-40 justify-center items-center
            disabled:opacity-50 disabled:cursor-not-allowed
        ">
        Baixar app
        <div wire:loading
            class="inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite] ml-2"
            role="status">
            <span wire:loading
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
        </div </button>

</div>
