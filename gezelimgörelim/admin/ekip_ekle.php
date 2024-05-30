<?php include 'header.php';


if(isset($_POST['ekle_btn'])){
  $adsoyad = $_POST['adsoyad'];
  $icerik = $_POST['icerik'];

  $dosya_adi =$_FILES["url"]["name"];
  $yeni_ad="./gallery/".$dosya_adi;
  if (move_uploaded_file($_FILES["url"]["tmp_name"],$yeni_ad)){


        $sorgu = $db->prepare("INSERT INTO ekip SET

          adsoyad = ?,
          icerik = ?,
          url = ?

        ");
        $sorgu->execute([
          $adsoyad,$icerik,$dosya_adi
        ]);
        if($sorgu){
          echo "<script>window.location='ekip.php';alert('Başarıyla eklendi.');</script>";
        }else{
          echo "<script>window.location='ekip_ekle.php';alert('Bir hata oluştu.');</script>";
          }
        }
      }

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-primary">Ekip üyesi ekle</h1>
        </div>
        <div class="card-body">
          <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Ad-Soyad</label>
                <input required type="text" name="adsoyad" value="" class="form-control">
              </div>

            </div>

            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Fotoğraf</label>
                <input required type="file" name="url" value="" class="form-control">
              </div>

            </div>

            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Kişi bilgisi</label>
                <textarea required name="icerik" rows="8" cols="80"class="form-control"> </textarea>
              </div>

            </div>


            <div class="text-center mt-4">
              <button type="submit" name="ekle_btn" class="btn btn-primary col-md-6">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
