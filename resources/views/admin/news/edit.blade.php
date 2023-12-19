@extends('layouts.app', ['title' => 'Edit News'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-folder"></i> Edit Berita</h6>
                </div>

                {{$news->category_id}}

                <div class="card-body">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori Berita</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($category as $item)
                                    @if($news->category_id == $item->id)
                                        <option value="{{ $item->id  }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id  }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama Berita</label>
                            <input type="text" name="title" value="{{ $news->title }}"
                                placeholder="Masukkan Nama Berita"
                                class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Konten Berita</label>
                            <textarea name="content" 
                                class="form-control @error('content') is-invalid @enderror">{{ $news->content }}</textarea>

                            @error('content')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" value="{{ $news->author }}" placeholder="Masukkan Author"
                                class="form-control @error('author') is-invalid @enderror">

                            @error('author')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            Update</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection