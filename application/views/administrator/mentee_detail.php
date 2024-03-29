<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class=" fa fa-eye"></i> Detail Mentee
    </div>

    <table class="table table-hover table-bordered table-striped">

        <?php foreach($detail as $dt) : ?>
            
        <img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->photo ?>" style="width: 24%">

        <tr>
            <td>NIM</td>
            <td><?php echo $dt->nim; ?></td>
        </tr>

        <tr>
            <td>PASSWORD</td>
            <td><?php echo $dt->password; ?></td>
        </tr>

        <tr>
            <td>LEVEL</td>
            <td><?php echo $dt->level; ?></td>
        </tr>

        <tr>
            <td>NAMA LENGKAP</td>
            <td><?php echo $dt->nama_lengkap; ?></td>
        </tr>

        <tr>
            <td>ALAMAT</td>
            <td><?php echo $dt->alamat; ?></td>
        </tr>

        <tr>
            <td>EMAIL</td>
            <td><?php echo $dt->email; ?></td>
        </tr>

        <tr>
            <td>TELEPON</td>
            <td><?php echo $dt->telepon; ?></td>
        </tr>

        <tr>
            <td>TEMPAT LAHIR</td>
            <td><?php echo $dt->tempat_lahir; ?></td>
        </tr>

        <tr>
            <td>TANGGAL LAHIR</td>
            <td><?php echo $dt->tanggal_lahir; ?></td>
        </tr>

        <tr>
            <td>JENIS KELAMIN</td>
            <td><?php echo $dt->jenis_kelamin; ?></td>
        </tr>

        <tr>
            <td>NAMA KELOMPOK</td>
            <td><?php echo $dt->nama_kelompok; ?></td>
        </tr>

        <tr>
            <td>NAMA JURUSAN</td>
            <td><?php echo $dt->nama_jurusan; ?></td>
        </tr>

        <?php endforeach; ?>
    </table>
    
    <?php echo anchor('administrator/mentee','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
    <br>
    <br>
    <br>
</div>