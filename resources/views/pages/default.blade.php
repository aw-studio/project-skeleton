@extends('app')

@section('content')

<div class="container">
    @block($page->content)
</div>

@endsection

@section('meta')
    <x-fj-meta-tags />
@endsection