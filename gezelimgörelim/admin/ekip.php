<?php include 'header.php';




if (isset($_GET['sil'])) {

  $sorgu2 = $db->prepare("SELECT * FROM ekip WHERE id={$_GET['id']}");
  $sorgu2->execute();
  $liste2 = $sorgu2->fetch(PDO::FETCH_ASSOC);
    unlink('./gallery/'.$liste2['url']);
    $sorgu = $db->prepare("DELETE FROM ekip WHERE id={$_GET['id']}");
    $sorgu->execute();
  if ($sorgu) {

    echo "<script>window.location='ekip.php';alert('Başarılı.');</script>";
  }else{
    echo "<script>window.location='ekip.php';alert('Bir hata oluştu.');</script>";
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class=" text-primary text-center">Ekip üyeleri</h1>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-hover" id="comment_inbox">
            <thead>
              <tr>
                <th>Ad-Soyad</th>
                <th>Fotoğraf</th>
                <th>İçerik</th>


                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sorgu = $db->prepare("SELECT * FROM ekip");
              $sorgu->execute();
              $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC); //fetchall olmasına çok dikkat et.
              foreach ($liste as $key => $post) {?>
                <tr>
                  <td><?php  echo $post['adsoyad'];?></td>

                  <td><img style="width:150px;" src="./gallery/<?php echo $post['url'];?>"></td>
                  <td><?php echo $post['icerik'];?></td>

                  <td>
                    <a href="ekip.php?sil=sil&id=<?php echo $post['id'];?>" class="btn btn-danger  btn-sm mb-2"><i class="fa fa-trash"></i></a>

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
