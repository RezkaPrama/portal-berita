@extends('layouts.appFront')

@section('content')
<div class="card-body">
    <form action="{{ route('front.news.index') }}" method="GET">
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="q" placeholder="cari berdasarkan nama Berita">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="row">
    @foreach($news as $post)
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="{{ asset('storage/news/' . $post->image) }}" class="card-img-top" alt="News Image" style="height: 100%; width: 100%;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection