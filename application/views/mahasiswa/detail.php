<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-text"><?= $mahasiswa['nim']; ?></h5>
                    <p class="card-title"><?= $mahasiswa['nama']; ?></p>
                    <p class="card-subtitle mb-2 text-muted"><?= $mahasiswa['email']; ?></p>
                    <p class="card-text"><?= $mahasiswa['jurusan']; ?></p>
                    <p class="card-text"><?= $mahasiswa['alamat']; ?></p>
                    <p class="card-text"><?= $mahasiswa['angkatan']; ?></p>
                    
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>