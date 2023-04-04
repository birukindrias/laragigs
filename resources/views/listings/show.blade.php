<x-layout>
            @include('partials._hero')


    {{-- <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"> --}}


        <!-- Item 1 -->
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <div class="flex">
                <img class="hidden w-full mr-6 md:block" src="{{$listing->logo ? asset ('storage/' . $listing->logo) : asset ('images/no-image.png')}}" alt="" />

                <div>
                    <h3 class="text-2xl">
                        <a href="/listings/{{$listing->id}}">{{$listing->title}} </a>
                    </h3>
                    <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
          <x-list-tags :tagsCsv="$listing->tags"/>

                   
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
        {{-- </div> --}}
</x-layout>
