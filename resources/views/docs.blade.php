@extends('layouts.header')
@section('title','Docs')

@section('content')
            <livewire:docs :space="$space" />
@endsection
