@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <livewire:set-driver-times :driver="$driver"/>
        </div>
    </section>
@endsection
