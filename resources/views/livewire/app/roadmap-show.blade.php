<div>
    <code>
        userId = {{ auth()->user()->id }}
    </code>
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
                        Step {{ $step->position }}: {{ $step->name }} (id={{ $step->id }})
                        <div class="flex justify-end mt-8">
                            <a href="{{ route('app.step', ['step' => $step->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                View Step
                            </a>
                        </div>
                        @if(key_exists($step->id, $progress))
                            @if($progress[$step->id]['completed_at'])
                                <div class="flex flex-col justify-end mt-6">
                                    <p tabindex="0" class="focus:outline-none text-sm font-semibold leading-none text-right xtext-green-700 xdark:text-gray-400">
                                        Completed!
                                    </p>
                                    <div class="bg-green-50 rounded-full mt-3 h-2 w-full">
                                        <div class="bg-green-500 h-2 rounded-full w-full"></div>
                                    </div>
                                    <p class="text-xs mt-2">
                                        Completed {{ Carbon\Carbon::parse($progress[$step->id]['completed_at'])->diffForHumans() }}
                                    </p>
                                </div>
                            @elseif($progress[$step->id]['started_at'])
                                <div class="flex flex-col justify-end mt-6">
                                    <p tabindex="0" class="focus:outline-none text-sm font-semibold leading-none text-right text-gray-500 xdark:text-gray-400">
                                        Started
                                    </p>
                                    <div class="bg-gray-200 rounded-full mt-3 h-2 w-full">
                                        <div class="bg-green-500 h-2 rounded-full " style="width: 30%"></div>
                                    </div>
                                    <p class="text-xs mt-2">
                                        Started {{ Carbon\Carbon::parse($progress[$step->id]['completed_at'])->diffForHumans() }}
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
        </div>
    @endforeach
</div>