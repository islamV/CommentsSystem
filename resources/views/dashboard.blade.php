
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  @if($posts )
    @foreach ($posts as $post)
    <h1>user . {{ $post->user->name }}</h1>
    <h2>{{ $post->title }} - {{ $post->content }}</h2>

  <livewire:comments :commentableType="'App\\Models\\Post'" :commentableId="$post->id"  />

@endforeach
@else
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("No data") }}
            </div>
        </div>
    </div>
</div>
@endif
</x-app-layout>
{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @livewire('counter')
</x-app-layout> --}}
