<?php include 'header.php';
if(isset($_POST['ekle'])){
  $baslik = $_POST['baslik'];
  $bolge = $_POST['bolge'];
  $icerik = $_POST['icerik'];
  $yukleyen_adsoyad = $_POST['yukleyen_adsoyad'];
  $dosya_adi =$_FILES["img_url"]["name"];
  $yeni_ad="./bloggorselleri/".$dosya_adi;
  if (move_uploaded_file($_FILES["img_url"]["tmp_name"],$yeni_ad)){


        $sorgu = $db->prepare("INSERT INTO post SET
          baslik = ?,
          bolge = ?,
          icerik = ?,
          yukleyen_adsoyad = ?,
          img_url = ?

        ");
        $sorgu->execute([
          $baslik,$bolge,$icerik,$yukleyen_adsoyad,$dosya_adi
        ]);
        if($sorgu){
          echo "<script>window.location='yazilar.php';alert('blog yazısı başarıyla eklendi.');</script>";
        }else{
          echo "<script>window.location='yaziekle.php';alert('Bir hata oluştu.');</script>";
          }
        }
      }

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-primary">Blog yazısı ekle</h1>
        </div>
        <div class="card-body">
          <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Blog başlığı</label>
                <input required type="text" name="baslik" value="" class="form-control">
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>İl, ilçe, bölge veya konu adı</label>
                <input required type="text" name="bolge"  class="form-control">
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Yükleyen kişi</label>
                <input required type="text" name="yukleyen_adsoyad" value="<?php echo $admin['admin_adsoyad'];?>" class="form-control">
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Blog görseli</label>
                <input type="file" name="img_url" value="" class="form-control">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 form-group mt-3">
                <label>Blog içeriği</label>

                <textarea required  name="icerik" class="form-control text-center" ></textarea>
              </div>
            </div>
            <div class="text-center mt-4">
              <button type="submit" name="ekle" class="btn btn-primary col-md-6">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
