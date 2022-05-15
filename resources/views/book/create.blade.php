@extends('layouts.app')

@section('styles')
    {{-- Select2 4.1.0 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('book.store') }}" id="bookCreateForm" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" placeholder=" ">
                    <label for="title">Judul</label>

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Sampul</label>
                    <input class="form-control" type="file" id="cover">

                    @error('cover')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <select name="category" class="w-100" id="category">
                        <option disabled selected>Kategori</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="author" placeholder=" ">
                    <label for="author">Penulis</label>

                    @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="publisher" placeholder=" ">
                    <label for="publisher">Penerbit</label>

                    @error('publisher')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <textarea name="synopsis" id="synopsis" cols="200" rows="5" class="form-control mb-3" placeholder="Berikan ulasan..."></textarea>

                @error('synopsis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Select2 4.1.0 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $('#bookCreateForm select').select2({
            theme: 'bootstrap-5',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        })
    </script>
@endsection
