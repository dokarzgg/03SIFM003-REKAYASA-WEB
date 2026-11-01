@extends('admin.template')

@section('title', 'Kelola Project')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Project</h5>
        <a href="{{ route('admin.project.create') }}" class="btn btn-primary btn-sm">
            + Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle w-100" id="tb_project">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 100px;">Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Teknologi</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $index => $project)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if ($project->image)
                                    <img src="{{ asset('images/' . $project->image) }}" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;" alt="{{ $project->title }}">
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 60) }}</td>
                            <td>{{ $project->teknologi }}</td>
                            <td>
                                <span class="badge {{ $project->status == 'Selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus project ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#tb_project').DataTable();
    });
</script>
@endpush