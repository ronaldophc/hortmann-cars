@extends('layouts.public')
@section('content')
    <div class="mx-auto max-w-7xl p-4 text-xl">
        <div class="px-5 pb-24">
            <div class="flex flex-wrap justify-center gap-10">
                @foreach ($vehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" :isAdmin="false" />
                @endforEach
            </div>
            <div class="mt-6">
                {{ $vehicles->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
