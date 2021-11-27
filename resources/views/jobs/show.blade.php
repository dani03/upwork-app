@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-green-500 mb-5">{{ $job->title }} </h1>

    <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-green-100">
        <p class="text-md text-gray-800">{{ $job->description }}</p>
        <span class="text-sm text-gray-600"> {{ number_format($job->price / 100, 2, ',', ' ') }} € </span>
    </div>
    <section x-data="{open: false}">
        <a class="text-green-500 cursor-pointer" @click="open=!open">cliquer ici pour soumettre </a>
        <form class="w-full max-w-md" x-show="open" x-cloak method="POST" action="{{ route('proposals.store', $job) }}">
            @csrf
            <textarea name="content" class="p-3 font-thin border border-gray-300 " id="" cols="30" rows="10"></textarea>
            <button type="submit" class="block bg-green-500 text-white px-3 py-2">envoyer</button>
        </form>
    </section>

@endsection
