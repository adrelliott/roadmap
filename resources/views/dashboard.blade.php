<x-app-layout>
    <div class="flex gap-6 max-w-7xl mx-auto mt-12">
        @foreach($data->roadmaps as $roadmap)
            <div class="sm:grow border border-gray-200 bg-white rounded-sm shadow-sm px-8 py-6">
                <h2 class="text-base sm:text-2xl font-semibold leading-4 text-gray-800 ">
                    {{ $roadmap->name }}
                </h2>
                <p class="text-sm leading-5 mt-2 text-gray-500 sm:w-10/12">
                    {{ $roadmap->description ?? 'Decription couw,d hgo hetsh ehstgdte tdget' }}
                </p>
                <div class="mt-6">
                    <x-progress-bar percentage="85" />
                    <div class="flex justify-end mt-8">
                        <a href="{{ route('app.roadmaps', ['roadmap' => $roadmap->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            View Roadmap
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
