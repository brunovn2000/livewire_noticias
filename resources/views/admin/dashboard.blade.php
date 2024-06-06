@extends('layouts.admin')

@section('title', 'Painel Administrativo')

@section('content')
<div>

    {{-- @livewire('livewire.painel-admin'); --}}
    <livewire:painel-admin/> 
    {{-- {{ $slot ?? '' }} --}}


</div>
@endsection