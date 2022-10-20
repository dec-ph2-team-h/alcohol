{{-- こっちだと表示できない --}}
{{-- @extends('layouts.app')

@section('content')

    <div class="container">

        @foreach ($d as $tweet)
            <div class="card mb-2">
                <div class="card-body">
                    <div class="media">
                        <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
                        <div class="media-body">
                            <h5 class="d-inline mr-3"><strong>{{ $tweet->user->name }}</strong></h5>
                            <h6 class="d-inline text-secondary">{{ date('Y/m/d', strtotime($tweet->created_at)) }}</h6>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex flex-row justify-content-end">
                        <div class="mr-5"><i class="far fa-comment text-secondary"></i></div>
                        <div class="mr-5"><i class="fas fa-retweet text-secondary"></i></div>
                        <div class="mr-5"><i class="far fa-heart text-secondary"></i></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection --}}



{{-- こっちだったらとりあえず表示できる --}}
{{-- @foreach ($d as $twitter)                
    {{ $twitter->text }}<br>                
@endforeach --}}

<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tweet Index') }}
    </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <table class="text-center w-full border-collapse">
            <thead>
                <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">tweet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($d as $twitter)
                <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                    <h3 class="text-left font-bold text-lg text-grey-dark">{{$twitter->text}}</h3>
                    <div class="flex">
                    <!-- 更新ボタン -->
                    <!-- 削除ボタン -->
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>

