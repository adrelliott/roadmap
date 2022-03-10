<div class="flex gap-6 max-w-7xl mx-auto mt-12">
    @foreach($roadmaps as $roadmap)
        <div class="w-1/3 border border-gray-200 bg-white rounded-sm shadow-sm px-8 py-6">
            <h2 class="text-base sm:text-2xl font-semibold leading-4 text-gray-800 ">
                {{ $roadmap->name }}
            </h2>
            <p class="text-sm leading-5 mt-2 text-gray-500 sm:w-10/12">
                {{ $roadmap->description ?? 'Decription couw,d hgo hetsh ehstgdte tdget' }}
            </p>
            <div class="mt-6">
                @if($progress[$roadmap->id]['completed_at'])
                    <x-progress-bar percentage="100" />
                    <a href="{{ route('app.roadmap', ['roadmap' => $roadmap->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        View Completed Roadmap
                    </a>
                @elseif($progress[$roadmap->id]['started_at'])
                    <x-progress-bar percentage="50" />
                    <a href="{{ route('app.roadmap', ['roadmap' => $roadmap->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Continue Roadmap
                    </a>
                @else
                    <x-progress-bar percentage="0" />
                    <a href="{{ route('app.roadmap', ['roadmap' => $roadmap->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Start Roadmap
                    </a>
                @endif
                <div class="flex justify-end mt-8">
                    
                </div>
            </div>
        </div>
    @endforeach
</div>