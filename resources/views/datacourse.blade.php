@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manajemen Course</h2>

    <!-- Form Tambah Course -->
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" accept="image/*" required>
        </div>
        <div>
            <label>Deskripsi</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Materi</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Aksi</label>
            <textarea name="description" required></textarea>
        </div>

        <div id="materiContainer">
            <label>Materi Pembelajaran</label>
            <div class="materi-item">
                <input type="text" name="materials[]" placeholder="Materi 1" required>
            </div>
        </div>
        <button type="button" onclick="addMateri()">+ Tambah Materi</button>

        <button type="submit">Simpan</button>
    </form>

    <hr>

    <!-- Tabel Course -->
    <table border="1" cellpadding="8">
        
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
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}">Edit</a> |
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus course ini?')">Hapus</button>
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
        input.innerHTML = `<input type="text" name="materials[]" placeholder="Materi ${index}" required>`;
        container.appendChild(input);
    }
</script>
@endsection
