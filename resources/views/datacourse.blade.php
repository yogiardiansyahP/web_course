@extends('layouts.app')

@section('content')
<div class="course-container">
    <h2>Manajemen Course</h2>

    <!-- Form Tambah Course -->
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div id="materiContainer">
            <label for="materials">Materi Pembelajaran</label>
            <div class="materi-item">
                <input type="text" name="materials[]" class="form-control" placeholder="Materi 1" required>
            </div>
        </div>
        <button type="button" class="btn btn-primary" onclick="addMateri()">+ Tambah Materi</button>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

    <hr>

    <!-- Tabel Course -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>Thumbnail</th>
                <th>Deskripsi</th>
                <th>Materi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td><img src="{{ asset('storage/' . $course->thumbnail) }}" width="100"></td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <ul>
                            @foreach ($course->materials as $material)
                                <li>{{ $material->title }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $course->status }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a> |
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus course ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function addMateri() {
        const container = document.getElementById('materiContainer');
        const index = container.querySelectorAll('.materi-item').length + 1;
        const input = document.createElement('div');
        input.classList.add('materi-item');
        input.innerHTML = `<input type="text" name="materials[]" class="form-control" placeholder="Materi ${index}" required>`;
        container.appendChild(input);
    }
</script>
@endsection