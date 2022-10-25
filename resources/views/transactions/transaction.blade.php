@extends('layouts.apps')

@push('style')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="container py-12">
        @livewire('transaction-table')
    </div>
@endsection