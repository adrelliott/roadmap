<div>
    <div class="flex justify-start mt-8">
        <x-button class="xml-4" wire:click="backToRoadmap" >
            Back to roadmap
        </x-button>
    </div>
    <div class=" max-w-7xl mx-auto py-6 px-8 bg-white mt-8">
        <h2 class="text-xl">
            Step {{ $step->position }}: {{ $step->name }}
        </h2>
    </div>
</div>