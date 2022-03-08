<div class="flex flex-col justify-end">
    <p tabindex="0" class="focus:outline-none text-sm font-semibold leading-none text-left text-gray-500 xdark:text-gray-400">
        {{ $percentage ?? 0 }}% complete
    </p>
    <div class="bg-green-50 rounded-full mt-3 h-2 w-full">
        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $percentage ?? 0 }}%"></div>
    </div>
</div>