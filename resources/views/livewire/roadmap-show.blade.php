<div>
    @foreach($roadmap->stages->sortBy('position') as $stage)
        <div class=" max-w-7xl mx-auto py-6 px-8 bg-white mt-8">
            <div class="">
                <h2 class="text-lg">
                    <span class="font-bold">STAGE {{ $stage->position }}:</span> {{ $stage->name }}
                </h2>
            </div>
            <div class="flex gap-4 mt-4">
                @foreach ($stage->steps->sortBy('position') as $step)
                    <div class="grow border border-gray-200 rounded-md shadow-md p-6">
                        Step {{ $step->position }}: {{ $step->name }}
                        <div class="flex justify-end mt-8">
                            <x-button class="ml-4" wire:click="showStep({{ $step->id }})" >
                                View Stage
                            </x-button>
                        </div>
                        
                    </div>    
                @endforeach
            </div>
        </div>
        @endforeach
</div>