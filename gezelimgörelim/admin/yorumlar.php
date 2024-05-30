<?php include 'header.php';

if (isset($_GET['sil'])) {
  @$sorgu = $db->prepare("DELETE FROM yorumlar WHERE id={$_GET['id']}");
  $sorgu->execute();
  if ($sorgu) {
    echo "<script>window.location='yorumlar.php';alert('Başarılı.');</script>";
  }else{
    echo "<script>window.location='yorumlar.php';alert('Bir hata oluştu.');</script>";
  }
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h1 class=" text-primary text-center">Yorumlar</h1>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover" id="messages">
            <thead>
              <tr>
                <th>Ad-Soyad</th>
                <th>Mail</th>
                <th>İçerik</th>
                <th>Atıldığı tarih</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sorgu = $db->prepare("SELECT * FROM yorumlar");
              $sorgu->execute();
              $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC); //fetchall olmasına çok dikkat et.
              foreach ($liste as $key => $yorum) {?>
                <tr>
                  <td><?php echo $yorum['adsoyad'];?></td>
                  <td><?php echo $yorum['email'];?></td>
                  <td><?php echo $yorum['yorum'];?></td>
                  <td><?php echo $yorum['tarih'];?></td>
                  <td>
                    <a href="yorumlar.php?sil=sil&id=<?php echo $yorum['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
