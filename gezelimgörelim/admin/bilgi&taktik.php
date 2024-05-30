<?php include 'header.php';
if (isset($_POST['ekle_btn'])) {
  $arkaplan = $_POST['arkaplan'];
  $durum = $_POST['durum'];
  $icerik = $_POST['icerik'];
    $query = $db->prepare("INSERT INTO ipuclari SET
      arkaplan = ?,
      durum = ?,
      icerik = ?
    ");
    $save = $query->execute([
    $arkaplan,$durum,$icerik
    ]);

    if ($save) {
      echo "<script>window.location='bilgi&taktik.php';alert('Başarıyla yayınlandı.');</script>";
    }else{
      echo "<script>window.location='bilgi&taktik.php';alert('Bir hata oluştu.');</script>";
    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-primary">Bilgi & Taktik Ekle</h1>
        </div>
        <div class="card-body">
          <form action="" method="post" accept-charset="utf-8">
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Bilgi & Taktik?</label>
                <select name="durum" required class="form-control">
                  <option value="Bilgi">Bilgi</option>
                  <option value="Taktik">Taktik</option>

                </select>
              </div>
            </div>
                        <div class="form-row">
                          <div class="col-md-12 form-group mt-3">
                            <label>İçerik</label>

                            <textarea required name="icerik" class="form-control text-center"></textarea>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="col-md-12 form-group">
                            <label>Arkaplan rengi</label>
                            <select name="arkaplan" required class="form-control">
                              <option value="Mavi">Mavi</option>
                              <option value="Yesil">Yeşil</option>
                              <option value="Sari">Sarı</option>
                              <option value="Kirmizi">Kırmızı</option>

                            </select>
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
