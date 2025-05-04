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
        <div class="form-group">
            <label for="mentor">Mentor</label>
            <input type="text" name="mentor" class="form-control" placeholder="Nama Mentor" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div id="materiContainer">
            <label>Materi Pembelajaran</label>
            <div class="materi-item row mb-2">
                <div class="col-md-6">
                    <input type="text" name="materials[0][title]" class="form-control" placeholder="Judul Materi" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="materials[0][video]" class="form-control" placeholder="Link Video (YouTube atau lainnya)" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary mb-3" onclick="addMateri()">+ Tambah Materi</button>

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
                <th>Mentor</th>
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
                                <li>
                                    <strong>{{ $material->title }}</strong><br>
                                    <a href="{{ $material->video_url }}" target="_blank">{{ $material->video_url }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $course->mentor }}</td>
                    <td>{{ $course->status }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn custom-btn">Edit</a> |
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn custom-btn danger" onclick="return confirm('Hapus course ini?')">Hapus</button>
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
        const index = container.querySelectorAll('.materi-item').length;

        const materiItem = document.createElement('div');
        materiItem.classList.add('materi-item', 'row', 'mb-2');
        materiItem.innerHTML = `
            <div class="col-md-6">
                <input type="text" name="materials[${index}][title]" class="form-control" placeholder="Judul Materi" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="materials[${index}][video]" class="form-control" placeholder="Link Video" required>
            </div>
        `;
        container.appendChild(materiItem);
    }
</script>

@endsection
