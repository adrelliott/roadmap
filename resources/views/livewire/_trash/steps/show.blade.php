<div>
    Show specific step
    <p>Id: {{ $step->id }}</p>
    <p>Name: {{ $step->name }}</p>
    <p>Description: {{ $step->description }}</p>
    <p>Roadmpa Id from step: {{ $step->stage->roadmap->id }}</p>
    <p>Roadmpa Id roadmap: {{ $roadmap->id }}</p>

    @if(key_exists($step->id, $progress[$roadmap->id]))
{{-- {{ var_dump($progress[$roadmap->id][$step->id]) }} --}}
        @if(isset($progress[$roadmap->id][$step->id]['completed_at']))
            <x-button class="xml-4" wire:click="completeStep({{ $roadmap->id }}, {{ $step->id }}, false)" >
                Mark Uncomplete
            </x-button>

        @elseif(isset($progress[$roadmap->id][$step->id]['started_at']))

            <x-button class="xml-4" wire:click="completeStep({{ $roadmap->id }}, {{ $step->id }})" >
                Mark Complete
            </x-button>

        @endif

    @else

        <x-button class="xml-4" wire:click="startStep({{ $roadmap->id }}, {{ $step->id }})" >
            Start Step
        </x-button>

    @endif
    
</div>
