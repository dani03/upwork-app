@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-green-500 mb-5">Nos dernieres missions. </h1>
    @if (Session::has('error'))
        <div class="boder border-gray-500 center">
            <p class="p-2 border border-2 text-red-500 center m-2">vous avez dejà candidater a cette mission </p>
        </div>
    @endif
    @foreach ($jobs as $job)
        <livewire:job :job="$job" />
    @endforeach
    {{ $jobs->links() }}
@endsection
