
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('data/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
        <div class="card-body">
            <form action="<?php site_url('data/export') ?>" method="post" >
        
                <div class="form-group">
                    <label for="tahun">Masukan tahun</label>
                    <input class="form-control <?php echo form_error('tahun') ? 'is-invalid' : '' ?>"
                            type="text" name="tahun"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('tahun') ?>
                    </div>
                </div>
               
                <input class="btn btn-success" type="submit" name="btn" value="Export Data" />
            </form>
        </div>
        <div class="card-footer small text-muted">
            * required fields
        </div>
    </div>

</div>

