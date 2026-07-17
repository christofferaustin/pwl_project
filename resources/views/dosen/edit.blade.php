<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Dosen - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background: #f5f7fb; padding-top: 90px; }
    </style>
</head>
<body>

<!-- [NAVBAR - Sesuaikan dengan navbar proyek Anda] -->

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow rounded-4">
                
                <div class="card-header bg-white py-4 border-bottom d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-1">Ubah Data Dosen</h3>
                        <small class="text-muted">Perbarui data dosen yang diperlukan di bawah ini.</small>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Alert Error Validasi Global -->
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ action([App\Http\Controllers\DosenController::class, 'update'], [$dosen->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- NIP -->
                            <div class="col-md-6 mb-3">
                                <label for="NIP" class="form-label fw-semibold">NIP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="NIP" name="NIP" value="{{ old('NIP', $dosen->NIP) }}" required>
                                @error('NIP') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- NIDN -->
                            <div class="col-md-6 mb-3">
                                <label for="NIDN" class="form-label fw-semibold">NIDN</label>
                                <input type="text" class="form-control @error('NIDN') is-invalid @enderror" id="NIDN" name="NIDN" value="{{ old('NIDN', $dosen->NIDN) }}">
                                @error('NIDN') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="col-md-12 mb-3">
                                <label for="Fullname" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('Fullname') is-invalid @enderror" id="Fullname" name="Fullname" value="{{ old('Fullname', $dosen->Fullname) }}" required>
                                @error('Fullname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Pendidikan Terakhir -->
                            <div class="col-md-6 mb-3">
                                <label for="Pendidikan_Terakhir" class="form-label fw-semibold">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <select class="form-select @error('Pendidikan_Terakhir') is-invalid @enderror" id="Pendidikan_Terakhir" name="Pendidikan_Terakhir" required>
                                    <option value="" disabled>-- Pilih Pendidikan --</option>
                                    <option value="S2" {{ old('Pendidikan_Terakhir', $dosen->Pendidikan_Terakhir) == 'S2' ? 'selected' : '' }}>S2 (Magister)</option>
                                    <option value="S3" {{ old('Pendidikan_Terakhir', $dosen->Pendidikan_Terakhir) == 'S3' ? 'selected' : '' }}>S3 (Doktor)</option>
                                    <option value="Prof" {{ old('Pendidikan_Terakhir', $dosen->Pendidikan_Terakhir) == 'Prof' ? 'selected' : '' }}>Profesor</option>
                                </select>
                                @error('Pendidikan_Terakhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Jurusan ID -->
                            <div class="col-md-6 mb-3">
                                <label for="Jurusan_id" class="form-label fw-semibold">Homebase Jurusan <span class="text-danger">*</span></label>
                                <select class="form-select @error('Jurusan_id') is-invalid @enderror" id="Jurusan_id" name="Jurusan_id" required>
                                    <option value="" disabled>-- Pilih Jurusan --</option>
                                    @foreach($jurusan as $j)
                                        <option value="{{ $j->id }}" {{ old('Jurusan_id', $dosen->Jurusan_id) == $j->id ? 'selected' : '' }}>{{ $j->Nama_Jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('Jurusan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="col-md-6 mb-3">
                                <label for="Tempat_Lahir" class="form-label fw-semibold">Tempat Lahir</label>
                                <input type="text" class="form-control @error('Tempat_Lahir') is-invalid @enderror" id="Tempat_Lahir" name="Tempat_Lahir" value="{{ old('Tempat_Lahir', $dosen->Tempat_Lahir) }}">
                                @error('Tempat_Lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-md-6 mb-3">
                                <label for="Tanggal_Lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('Tanggal_Lahir') is-invalid @enderror" id="Tanggal_Lahir" name="Tanggal_Lahir" value="{{ old('Tanggal_Lahir', $dosen->Tanggal_Lahir) }}">
                                @error('Tanggal_Lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Tautan User ID (Opsional) -->
                            <div class="col-md-12 mb-3">
                                <label for="user_id" class="form-label fw-semibold">Tautkan ke Akun Login <small class="text-muted">(Opsional)</small></label>
                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                    <option value="">-- Belum Ditautkan --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $dosen->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                                    @endforeach
                                </select>
                                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-12 mb-4">
                                <label for="Alamat" class="form-label fw-semibold">Alamat Rumah</label>
                                <textarea class="form-control @error('Alamat') is-invalid @enderror" id="Alamat" name="Alamat" rows="3">{{ old('Alamat', $dosen->Alamat) }}</textarea>
                                @error('Alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 border-top pt-4">
                            <a href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-warning text-white px-4">💾 Perbarui Data</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>

</body>
</html>