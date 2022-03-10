<div>
    show steps for roampa with id of {{ $roadmap->id }}
    @foreach ($roadmap->steps as $step)
        <div class="bg-white border p-6 mb-2">
            <p>Step name: {{ $step->name }} (Id = {{ $step->id }})</p>
            <x-button class="xml-4" wire:click="viewStep({{ $step->id }})" >
                View step
            </x-button>
            @if(key_exists($step->id, $progress[$roadmap->id]))
{{ var_dump($progress[$roadmap->id][$step->id]) }}
                @if(isset($progress[$roadmap->id][$step->id]['completed_at']))
                    <div class="flex flex-col justify-end mt-6">
                        <p tabindex="0" class="focus:outline-none text-sm font-semibold leading-none text-right xtext-green-700 xdark:text-gray-400">
                            Completed!
                        </p>
                        <div class="bg-green-50 rounded-full mt-3 h-2 w-full">
                            <div class="bg-green-500 h-2 rounded-full w-full"></div>
                        </div>
                        <p class="text-xs mt-2">
                            Completed {{ Carbon\Carbon::parse($progress[$roadmap->id][$step->id]['completed_at'])->diffForHumans() }}
                        </p>
                    </div>

                @elseif(isset($progress[$roadmap->id][$step->id]['started_at']))
                    <div class="flex flex-col justify-end mt-6">
                        <p tabindex="0" class="focus:outline-none text-sm font-semibold leading-none text-right text-gray-500 xdark:text-gray-400">
                            Started
                        </p>
                        <div class="bg-gray-200 rounded-full mt-3 h-2 w-full">
                            <div class="bg-green-500 h-2 rounded-full " style="width: 30%"></div>
                        </div>
                        <p class="text-xs mt-2">
                            Started {{ Carbon\Carbon::parse($progress[$roadmap->id][$step->id]['started_at'])->diffForHumans() }}
                        </p>
                    </div>
                @endif
            @else  
                <div class="flex flex-col justify-end mt-6">
                    <p tabindex="0" class="focus:outline-none text-sm font-semibold leading-none text-right text-gray-500 xdark:text-gray-400">
                        Not started
                    </p>
                    <div class="bg-gray-200 rounded-full mt-3 h-2 w-full">
                        <div class="bg-green-500 h-2 rounded-full " style="width: 0%"></div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
