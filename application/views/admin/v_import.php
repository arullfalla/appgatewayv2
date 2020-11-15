<div class="container" style="margin-top: 100px;"><br>
    <?php echo form_open_multipart($action); ?>
    <h2>Import Data Pelanggan</h2>
    <input type="file" name="pelanggan" accept="text/csv">
    <br>
    <br>
    <button type="submit" class="btn btn-primary" name="import">Import Data</button>
    <?php echo form_close(); ?>

    <p>File Wajib berformat *.CSV dan Format Seperti Gambar Dibawah</p>
    <img src="" alt="" srcset="">
</div>