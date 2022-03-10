<div>
    <p>User id = {{ $user->id }}</p>
    <p>No of roadmaps = {{ $user->roadmaps->count() }}</p>
    @foreach($user->roadmaps as $roadmap)
        <h1 class="text-xl">
            {{ $roadmap->name }} (Id = {{  $roadmap->id }})
        </h1>
        <x-button class="xml-4" wire:click="viewRoadmap({{ $roadmap->id }})" >
            Roadmap with id of {{ $roadmap->id }}
        </x-button>
    @endforeach
</div>
