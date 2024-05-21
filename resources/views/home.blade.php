@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <br>
                        <div>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas dan Jurusan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Hapus</th>
                                    <th>Edit</th>
                                </thead>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>


                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas }}{{ $siswa->jurusan }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <form action="{{ route('home.destroy', $siswa->id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-center"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>

                                            </form>

                                        </td>
                                        <td>
                                            <div>
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $siswa->id }}">
                                                    Edit
                                                </button>

                                                <!-- The Modal -->
                                                <div class="modal" id="editModal{{ $siswa->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Data Siswa</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <form action="{{ route('home.update', $siswa->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama"
                                                                            value="{{ $siswa->nama }}">
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Kelas</label>
                                                                        <input type="text" class="form-control"
                                                                            id="kelas" name="kelas"
                                                                            value="{{ $siswa->kelas }}">
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Jenis Kelamin</label>
                                                                        <select class="form-control" name="jenis_kelamin"
                                                                            id="jenis_kelamin">
                                                                            <option value="Laki-Laki"
                                                                                {{ $siswa->jenis_kelamin == 'laki-Laki' ? 'selected' : '' }}>
                                                                                laki-Laki</option>
                                                                            <option value="Perempuan"
                                                                                {{ $siswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                                                                perempuan</option>
                                                                        </select>
                                                                    </div>

                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Agama</label>
                                                                        <input type="text" class="form-control"
                                                                            id="agama" name="agama"
                                                                            value="{{ $siswa->agama }}">
                                                                    </div>

                                                                    <br>
                                                                    <input type="submit" value="Simpan"
                                                                        class="btn btn-primary">
                                                                </form>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
