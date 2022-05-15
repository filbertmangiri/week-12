@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
@endsection

@section('main')
    <a href="{{ route('book.create') }}" class="btn btn-success mb-3">Tambah</a>
    <table id="booksTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>
                        <a href="{{ route('book.edit', $book->slug) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('book.destroy', $book->slug) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger" id="bookDelete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#booksTable').DataTable()
        })

        $(document).on('click', '#bookDelete', function(event) {
            event.preventDefault()

            Swal.fire({
                title: 'Anda yakin ingin menghapus buku ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('form').submit()
                }
            })
        })
    </script>
@endsection
