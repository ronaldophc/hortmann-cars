@extends('layouts.public')
@section('content')
    <section class="body-font">
        <div class="container mx-auto px-5 pb-24 mt-10">
            <div class="-m-4 flex flex-wrap justify-center gap-2">
                @foreach ($vehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" />
                @endforEach
            </div>
            <div class="mt-6">
                {{ $vehicles->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
@endsection
