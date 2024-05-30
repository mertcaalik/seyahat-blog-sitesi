<?php include 'header.php';

@$sorgu = $db->prepare("SELECT * FROM ipuclari WHERE id={$_GET['id']}");
@$sorgu->execute();
@$list = $sorgu->fetch(PDO::FETCH_ASSOC);




if(isset($_POST['kaydet_btn'])){

        $durum = $_POST['durum'];
        $icerik = $_POST['icerik'];
        $arkaplan = $_POST['arkaplan'];
        $sorgu = $db->prepare("UPDATE ipuclari SET
          durum = ?,
          icerik = ?,
          arkaplan = ? WHERE id={$_GET['id']}
        ");
        $sorgu->execute([
          $durum,$icerik,$arkaplan
        ]);
        if($sorgu){

          echo "<script>window.location='bilgi&taktikler.php';alert('Düzenleme işlemi başarılı.');</script>";
        }else{
          echo "<script>window.location='bilgi&taktik_duzenle.php';alert('Bir hata oluştu.');</script>";
          }

      }
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center text-primary">Bilgi & Taktik düzenle</h1>
        </div>
        <div class="card-body">
          <form action="" method="post" accept-charset="utf-8">
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label>Bilgi & Taktik?</label>
                <select name="durum" required class="form-control">

                  <option value="Bilgi" <?php echo $list['durum'] == 'Bilgi' ? 'selected' : null;?>>Bilgi</option>
                  <option value="Taktik" <?php echo $list['durum'] == 'Taktik' ? 'selected' : null;?>>Taktik</option>

                </select>
              </div>
            </div>
                        <div class="form-row">
                          <div class="col-md-12 form-group mt-3">
                            <label>İçerik</label>

                            <textarea required name="icerik" class="form-control text-center"><?php echo $list['icerik']; ?></textarea>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="col-md-12 form-group">
                            <label>Arkaplan rengi</label>
                            <select name="arkaplan" required class="form-control">
                              <option value="Mavi" <?php echo $list['arkaplan'] == 'Mavi' ? 'selected' : null;?>>Mavi</option>
                              <option value="Yesil" <?php echo $list['arkaplan'] == 'Yesil' ? 'selected' : null;?>>Yeşil</option>
                              <option value="Sari" <?php echo $list['arkaplan'] == 'Sari' ? 'selected' : null;?>>Sarı</option>
                              <option value="Kirmizi" <?php echo $list['arkaplan'] == 'Kirmizi' ? 'selected' : null;?>>Kırmızı</option>


                            </select>
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
