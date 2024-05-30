<?php include 'header.php';

@$sorgu = $db->prepare("SELECT * FROM post WHERE id={$_GET['id']}");
@$sorgu->execute();
@$list = $sorgu->fetch(PDO::FETCH_ASSOC);




if(isset($_POST['kaydet_btn'])){

        $baslik = $_POST['baslik'];
        $icerik = $_POST['icerik'];
        $bolge = $_POST['bolge'];
        $yukleyen_adsoyad = $_POST['yukleyen_adsoyad'];
        $sorgu = $db->prepare("UPDATE post SET
          baslik = ?,
          icerik = ?,
          bolge = ?,
          yukleyen_adsoyad = ? WHERE id={$_GET['id']}
        ");
        $sorgu->execute([
          $baslik,$icerik,$bolge,$yukleyen_adsoyad
        ]);
        if($sorgu){

          echo "<script>window.location='yazilar.php';alert('Düzenleme işlemi başarılı.');</script>";
        }else{
          echo "<script>window.location='blogduzenle.php';alert('Bir hata oluştu.');</script>";
          }

      }
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-primary">Blog Düzenle</h1>
        </div>
        <div class="card-body">
          <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Blog başlığı</label>
                <input required type="text" name="baslik" value="<?php echo $list['baslik']; ?>" class="form-control">
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>İl, ilçe veya bölge adı</label>
                <input required type="text" name="bolge"  class="form-control" value="<?php echo $list['bolge']; ?>">
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Yükleyen kişi</label>
                <input required type="text" name="yukleyen_adsoyad" value="<?php echo $admin['admin_adsoyad'];?>" class="form-control">
              </div>

            </div>


            <div class="form-row">
              <div class="col-md-12 form-group mt-3">
                <label>Blog içeriği</label>

                <textarea required  name="icerik" class="form-control text-center" ><?php echo $list['icerik'];?></textarea>
              </div>
            </div>
            <div class="text-center mt-4">
              <button type="submit" name="kaydet_btn" class="btn btn-primary col-md-6">Kaydet</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
