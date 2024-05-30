<?php include 'header.php';





if (isset($_GET['sil'])) {

  $sorgu2 = $db->prepare("SELECT * FROM post WHERE id={$_GET['id']}");
  $sorgu2->execute();
  $liste2 = $sorgu2->fetch(PDO::FETCH_ASSOC);
    unlink('./bloggorselleri/'.$liste2['img_url']);
    $sorgu = $db->prepare("DELETE FROM post WHERE id={$_GET['id']}");
    $sorgu->execute();
  if ($sorgu) {

    echo "<script>window.location='yazilar.php';alert('Başarılı.');</script>";
  }else{
    echo "<script>window.location='yazilar.php';alert('Bir hata oluştu.');</script>";
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class=" text-primary text-center">Blog yazıları</h1>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-hover" id="comment_inbox">
            <thead>
              <tr>
                <th>Başlık</th>
                <th>Görsel</th>
                <th>İçerik</th>
                <th>Bölge</th>
                <th>Yükleyen kişi</th>
                <th>Yüklenme tarihi</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sorgu = $db->prepare("SELECT * FROM post");
              $sorgu->rowCount();
              $sorgu->execute();
              $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC); //fetchall olmasına çok dikkat et.
              foreach ($liste as $key => $post) {?>
                <tr>
                  <td><?php echo $post['baslik'];?></td>
                  <td><img src="./bloggorselleri/<?php echo $post['img_url'];?>" style="width:150px;"></td>
                  <td><?php echo $post['icerik'];?></td>
                  <td><?php  echo $post['bolge'];?></td>
                  <td><?php echo $post['yukleyen_adsoyad'];?></td>
                  <td><?php echo $post['tarih'];?></td>

                  <td>
                    <a href="blogduzenle.php?id=<?php echo $post['id'];?>" class="btn btn-success  btn-sm mb-2"><i class="fa fa-edit"></i></a>
                    <a href="yazilar.php?sil=sil&id=<?php echo $post['id'];?>" class="btn btn-danger  btn-sm mb-2"><i class="fa fa-trash"></i></a>

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
