@extends('app')

@section('content')

    <div>
        <div class="_content">
            <h1>{{ $data->h1 }}</h1>
        </div>
    </div>

@endsection

@section('meta')
    <x-fj-meta-tags :title="$data->meta_title" :description="$data->meta_description" :keywords="$data->meta_keywords" />
@endsection