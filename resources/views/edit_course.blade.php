@extends('layouts.app')

@section('content')
<div class="course-container">
    <h2>Edit Course</h2>

    <form action="{{ route('update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ $course->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="thumbnail">Thumbnail Baru (jika ingin mengganti)</label>
            <input type="file" name="thumbnail" class="form-control-file" accept="image/*">
            <p>Thumbnail saat ini:</p>
            <img src="{{ asset('storage/' . $course->thumbnail) }}" width="150">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $course->description }}</textarea>
        </div>

        <div id="materiContainer">
            <label>Materi Pembelajaran</label>
            @foreach ($course->materials as $index => $material)
            <div class="materi-item row mb-2">
                <div class="col-md-6">
                    <input type="text" name="materials[{{ $index }}][title]" value="{{ $material->title }}" class="form-control" placeholder="Judul Materi" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="materials[{{ $index }}][video]" value="{{ $material->video_url }}" class="form-control" placeholder="Link Video" required>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary mb-3" onclick="addMateri({{ $course->materials->count() }})">+ Tambah Materi</button>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

<script>
    function addMateri(startIndex) {
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
