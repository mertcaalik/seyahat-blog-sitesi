<?php include 'header.php';





if (isset($_GET['sil'])) {
  @$sorgu = $db->prepare("DELETE FROM ipuclari WHERE id={$_GET['id']}");
  @$sorgu->execute();
  if ($sorgu) {
    echo "<script>window.location='bilgi&taktikler.php';alert('Başarıyla silindi.');</script>";
  }else{
    echo "<script>window.location='bilgi&taktikler.php';alert('Bir hata oluştu.');</script>";
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class=" text-primary text-center">Bilgi & Taktikler</h1>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-hover" id="comment_inbox">
            <thead>
              <tr>
                <th>İcerik</th>
                <th>Tür</th>
                <th>Arkaplan rengi</th>
                <th>Tarih</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sorgu = $db->prepare("SELECT * FROM ipuclari");
              $sorgu->rowCount();
              $sorgu->execute();
              $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC); //fetchall olmasına çok dikkat et.
              foreach ($liste as $key => $post) {?>
                <tr>
                  <td><?php echo $post['icerik'];?></td>
                  <td><?php echo $post['durum'];?></td>
                  <td><?php echo $post['arkaplan'];?></td>
                  <td><?php  echo $post['tarih'];?></td>

                  <td>
                    <a href="bilgi&taktik_duzenle.php?id=<?php echo $post['id'];?>" class="btn btn-success  btn-sm mb-2"><i class="fa fa-edit"></i></a>
                    <a href="bilgi&taktikler.php?sil=sil&id=<?php echo $post['id'];?>" class="btn btn-danger  btn-sm mb-2"><i class="fa fa-trash"></i></a>

                  </td>

                </tr>
              <?php } ?>
            </tbody>

          </table>

        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
