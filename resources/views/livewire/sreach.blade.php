<div class="inline-block relative" x-data="{ open:true }">
    <input 
    @click.away="{open = false}" 
    @click.in="{open = true}"
    wire:keydown.arrow-down.prevent="incrementIndex()"
    wire:keydown.enter="showJob()"
    wire:keydown.arrow-up.prevent="decrementIndex()"
    wire:model='query' type="text" class=" w-56 mr-3 bg-gray-100 px-2 py-2 rounded-full text-gray-700 border-2 focus:outline-none placeholder-gray-500"  placeholder="recherche...">
    <svg class="w-5 h-5 text-gray-500 absolute top-0 right-0 mr-5 mt-2 " xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
      </svg>
      @if (strlen($query) > 2)
        <div  x-show="open" class="absolute border-2 bg-gray-100 text-md w-56 mt-2 ">    
            @if(count($jobs) > 0 )
                @foreach($jobs as $index => $job)
                    <p class="p-1 {{$index === $selectedIndex ? "text-green-500" : ""}} "> <a href="{{route('jobs.show', $job->id)}}">{{$job->title}}</a> </p>
                @endforeach        
            @else
                <span class="text-orange-500"> 0 résultats pour {{$query}} </span>
            @endif
            </div>
     @endif
</div>
