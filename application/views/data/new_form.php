<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <a href="<?php echo site_url('data/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
        <div class="card-body">
            <form action="<?php base_url('data/add') ?>" method="post"  >
        
                <div class="form-group">
                    <label for="uraian">uraian</label>
                    <input class="form-control <?php echo form_error('uraian') ? 'is-invalid' : '' ?>"
                            type="text" name="uraian"/>
                    <div class="invalid-feedback">
                        <?php echo form_error('uraian') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prognosa">prognosa</label>
                    <input class="form-control" type="text" onkeyup="sum();" id="prognosa" name="prognosa"/>
                </div>
                <div class="form-group">
                    <label for="rkap">rkap</label>
                    <input class="form-control" type="text" onkeyup="sum();" id="rkap" name="rkap"/>
                </div>
                <div class="form-group">
                    <label for="januari">januari</label>
                    <input class="form-control" type="text" onkeyup="sum1();" id="januari" name="januari"/>
                </div>
                <div class="form-group">
                    <label for="februari">februari</label>
                    <input class="form-control" type="text" onkeyup="sum1();" id="februari" name="februari"/>
                </div>
                <div class="form-group">
                    <label for="maret">maret</label>
                    <input class="form-control" type="text" onkeyup="sum1();" id="maret" name="maret"/>
                </div>
                <div class="form-group">
                    <label for="triwulan1">triwulan1</label>
                    <input class="form-control" type="text" onkeyup="sum();" id="triwulan1" name="triwulan1" readonly/>
                </div>
                <div class="form-group">
                    <label for="april">april</label>
                    <input class="form-control" type="text" onkeyup="sum2();" id="april" name="april"/>
                </div>
                <div class="form-group">
                    <label for="mei">mei</label>
                    <input class="form-control" type="text" onkeyup="sum2();" id="mei" name="mei"/>
                </div>
                <div class="form-group">
                    <label for="juni">juni</label>
                    <input class="form-control" type="text" onkeyup="sum2();" id="juni" name="juni"/>
                </div>
                <div class="form-group">
                    <label for="triwulan2">triwulan2</label>
                    <input class="form-control" type="text" onkeyup="sum();" id="triwulan2" name="triwulan2" readonly/>
                </div>
                <div class="form-group">
                    <label for="juli">juli</label>
                    <input class="form-control" type="text" onkeyup="sum3();" id="juli" name="juli"/>
                </div>
                <div class="form-group">
                    <label for="agustus">agustus</label>
                    <input class="form-control" type="text" onkeyup="sum3();" id="agustus" name="agustus"/>
                </div>
                <div class="form-group">
                    <label for="september">september</label>
                    <input class="form-control" type="text" onkeyup="sum3();" id="september" name="september"/>
                </div>
                <div class="form-group">
                    <label for="triwulan3">triwulan3</label>
                    <input class="form-control" type="text" onkeyup="sum();" name="triwulan3" id="triwulan3" readonly/>
                </div>
                <div class="form-group">
                    <label for="oktober">oktober</label>
                    <input class="form-control" type="text" onkeyup="sum4();" id="oktober" name="oktober"/>
                </div>
                <div class="form-group">
                    <label for="november">november</label>
                    <input class="form-control" type="text" onkeyup="sum4();" id="november" name="november"/>
                </div>
                <div class="form-group">
                    <label for="desember">desember</label>
                    <input class="form-control" type="text" onkeyup="sum4();" id="desember" name="desember"/>
                </div>
                <div class="form-group">
                    <label for="triwulan4">triwulan4</label>
                    <input class="form-control" type="text" onkeyup="sum();" name="triwulan4" id="triwulan4" readonly/>
                </div>
                <div class="form-group">
                    <label for="jumlah_setahun">jumlah_setahun</label>
                    <input class="form-control" type="text" onkeyup="sum();" name="jumlah_setahun" id="jumlah_setahun" readonly/>
                </div>
              
                <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>
        </div>
        <div class="card-footer small text-muted">
            * required fields
        </div>
    </div>

</div>

<script>
function sum1() {
      var januari = document.getElementById('januari').value;
      var februari = document.getElementById('februari').value;
      var maret = document.getElementById('maret').value;
      var result = parseInt(januari) + parseInt(februari) + parseInt(maret);
      if (!isNaN(result)) {
         document.getElementById('triwulan1').value = result;
      }
}

function sum2() {
      var april = document.getElementById('april').value;
      var mei = document.getElementById('mei').value;
      var juni = document.getElementById('juni').value;
      var result = parseInt(april) + parseInt(mei) + parseInt(juni);
      if (!isNaN(result)) {
         document.getElementById('triwulan2').value = result;
      }
}

function sum3() {
      var juli = document.getElementById('juli').value;
      var agustus = document.getElementById('agustus').value;
      var september = document.getElementById('september').value;
      var result = parseInt(juli) + parseInt(agustus) + parseInt(september);
      if (!isNaN(result)) {
         document.getElementById('triwulan3').value = result;
      }
}

function sum4() {
      var oktober = document.getElementById('oktober').value;
      var november = document.getElementById('november').value;
      var desember = document.getElementById('desember').value;
      var result = parseInt(oktober) + parseInt(november) + parseInt(desember);
      if (!isNaN(result)) {
         document.getElementById('triwulan4').value = result;
      }
}

function sum() {
    var prognosa = document.getElementById('prognosa').value;
    var rkap = document.getElementById('rkap').value;
      var triwulan1 = document.getElementById('triwulan1').value;
      var triwulan2 = document.getElementById('triwulan2').value;
      var triwulan3 = document.getElementById('triwulan3').value;
      var triwulan4 = document.getElementById('triwulan4').value;
      var result = parseInt(triwulan1) + parseInt(triwulan2) + parseInt(triwulan3) + parseInt(triwulan4) + parseInt(prognosa) + parseInt(rkap);
      if (!isNaN(result)) {
         document.getElementById('jumlah_setahun').value = result;
      }
}
</script>