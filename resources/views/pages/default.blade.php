@extends('app')

@section('content')

<div class="container">
    <div class="_content">

        <h1>{{ $page->h1 }}</h1>

        @block($page->content)
    </div>
</div>

@endsection

@section('meta')
    <x-fj-meta-tags />
@endsection