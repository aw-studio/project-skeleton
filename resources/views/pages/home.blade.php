@extends('app')

@section('content')

    <div class="container">
        <h1>{{ $data->h1 }}</h1>
    </div>

@endsection

@section('meta')
    <x-fj-meta-tags :metaTitle="$data->meta_title" :metaDescription="$data->meta_description" :metaKeywords="$data->meta_keywords" />
@endsection