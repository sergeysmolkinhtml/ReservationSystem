<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $activity->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-3">
                    <img src="{{ asset($activity->thumbnail) }}" alt="{{ $activity->name }}">
                    <div>${{ $activity->price }}</div>
                    <time>{{ $activity->start_time }}</time>
                    <div>Company: {{ $activity->company->name }}</div>
                    <p>{{ $activity->description }}</p>
                </div>
            </div>
            <div class="p-6 text-gray-900 space-y-3">
                @if(auth()->user()?->activities->contains($activity)) {{-- [tl! add:start] --}}
                <div class="mb-6 bg-indigo-100 p-4 font-semibold text-indigo-700">You have already registered.</div>
                @else
                    <form action="{{ route('activities.register', $activity) }}" method="POST">
                        @csrf

                        <x-secondary-button type="submit">
                            Register to Activity
                        </x-secondary-button>
                    </form>
                @endif {{-- [tl! add:end] --}}

                <img src="{{ asset($activity->thumbnail) }}" alt="{{ $activity->name }}">
                <div>${{ $activity->price }}</div>
                <time>{{ $activity->start_time }}</time>
                <div>Company: {{ $activity->company->name }}</div>
                <p>{{ $activity->description }}</p>
            </div>
        </div>
    </div>



</x-app-layout>

