
            <div class="table-responsive">
                <a href="<?php echo site_url('data/add') ?>" class="btn btn-primary">Tambah Data +</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('data/export') ?>" class="btn btn-success">Export Data +</a><br/>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <thead> -->
                  <tr>
                    <th >No</th>
                    <th >Uraian</th>
                    <th >prognosa</th>
                    <th >rkap</th>
                    <th >januari</th>
                    <th >februari</th>
                    <th >maret</th>
                    <th >triwulan1</th>
                    <th >april</th>
                    <th >mei</th>
                    <th >juni</th>
                    <th >triwulan2</th>
                    <th >juli</th>
                    <th >agustus</th>
                    <th >september</th>
                    <th >triwulan3</th>
                    <th >oktober</th>
                    <th >November</th>
                    <th >Desember</th>
                    <th >triwulan4</th>
                    <th >jumlah_setahun</th>
                  </tr>
                    <?php $no = 1; foreach ($data as $p): ?>
                        <tr>
                            <td >
                                <?php echo $no++; ?>
                            </td>
                            <td >
                                <?php echo $p->uraian; ?>
                            </td>
                            <td>
                                <?php echo $p->prognosa; ?>
                            </td>
                            <td>
                                <?php echo $p->rkap; ?>
                            </td>
                            <td>
                                <?php echo $p->januari; ?>
                            </td>
                            <td>
                                <?php echo $p->februari; ?>
                            </td>
                            <td>
                                <?php echo $p->maret; ?>
                            </td>
                            <td>
                                <?php echo $p->triwulan1; ?>
                            </td>
                            <td>
                                <?php echo $p->april; ?>
                            </td>
                            <td>
                                <?php echo $p->mei; ?>
                            </td>
                            <td>
                                <?php echo $p->juni; ?>
                            </td>
                            <td>
                                <?php echo $p->triwulan2; ?>
                            </td>
                            <td>
                                <?php echo $p->juli; ?>
                            </td>
                            <td>
                                <?php echo $p->agustus; ?>
                            </td>
                            <td>
                                <?php echo $p->september; ?>
                            </td>
                            <td>
                                <?php echo $p->triwulan3; ?>
                            </td>
                            <td>
                                <?php echo $p->oktober; ?>
                            </td>
                            <td>
                                <?php echo $p->november; ?>
                            </td>
                            <td>
                                <?php echo $p->desember; ?>
                            </td>
                            <td>
                                <?php echo $p->triwulan4; ?>
                            </td>
                            <td>
                                <?php echo $p->jumlah_setahun; ?>
                            </td>
                           
                            <!-- <td >
                                <a href="<?php echo site_url('data/edit/'.$p->id) ?>"
                                   class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?php echo site_url('data/delete/'.$p->id) ?>')"
                                   href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                <!-- </tbody> -->
              </table>
            </div>
            <script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>