<?php include 'header.php';

if (isset($_GET['sil'])) {

  $sorgu2 = $db->prepare("SELECT * FROM galeri WHERE id={$_GET['id']}");
  $sorgu2->execute();
  $liste2 = $sorgu2->fetch(PDO::FETCH_ASSOC);
    unlink('./gallery/'.$liste2['img_url']);
    $sorgu = $db->prepare("DELETE FROM galeri WHERE id={$_GET['id']}");
    $sorgu->execute();
  if ($sorgu) {

    echo "<script>window.location='gallery.php';alert('Başarılı.');</script>";
  }else{
    echo "<script>window.location='gallery.php';alert('Bir hata oluştu.');</script>";
  }
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h1 class=" text-primary text-center">Galeri</h1>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover" id="messages">
            <thead>
              <tr>
                <th>Görsel</th>

                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sorgu = $db->prepare("SELECT * FROM galeri");
              $sorgu->execute();
              $liste = $sorgu->fetchAll(PDO::FETCH_ASSOC); //fetchall olmasına çok dikkat et.
              foreach ($liste as $key => $galeri) {?>
                <tr>
                  <td align="center"><img style="width:150px;" src="./gallery/<?php echo $galeri['img_url'];?>"></td>

                  <td align="center">
                    <a href="gallery.php?sil=sil&id=<?php echo $galeri['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
