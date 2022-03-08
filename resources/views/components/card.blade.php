<div class=" w-full h-full py-12 px-4">
    <div class="bg-white xdark:bg-gray-800 rounded shadow max-w-xl py-6 sm:px-8 px-4">
        <div class="flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-2xl font-semibold leading-4 text-gray-800 xdark:text-gray-100">
                {{ $heading ?? '' }}
            </p>
        </div>
        @isset($body)
            <p tabindex="0" class="focus:outline-none text-sm leading-5 mt-2 text-gray-500 xdark:text-gray-400 sm:w-10/12">
                {{ $body }}.
            </p>
        @endisset
        @isset($footer)
            <div class="mt-6">
            {{  $footer }}
            </div>
        @endisset
        </div>
    </div>
</div>