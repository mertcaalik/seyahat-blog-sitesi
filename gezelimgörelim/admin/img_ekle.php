<?php include 'header.php';
if(isset($_POST['ekle_btn_img'])){

  $dosya_adi =$_FILES["post_img"]["name"];  //Dsoya adını aldık.
  $yeni_ad="./gallery/".$dosya_adi;
  if (move_uploaded_file($_FILES["post_img"]["tmp_name"],$yeni_ad)){


        $sorgu = $db->prepare("INSERT INTO galeri SET

          img_url = ?

        ");
        $sorgu->execute([
          $dosya_adi
        ]);
        if($sorgu){
          echo "<script>window.location='gallery.php';alert('Başarıyla yayınlandı.');</script>";
        }else{
          echo "<script>window.location='img_ekle.php';alert('Bir hata oluştu.');</script>";
          }
        }
      }

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-primary">Fotoğraf ekle</h1>
        </div>
        <div class="card-body">
          <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                        <div class="form-row">
                          <div class="col-md-12 form-group mt-3">
                            <label>Fotoğraf</label>
                            <input  type="file" name="post_img" class="form-control" >
                          </div>
                        </div>





            <div class="text-center mt-4">
              <button type="submit" name="ekle_btn_img" class="btn btn-primary col-md-6">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
