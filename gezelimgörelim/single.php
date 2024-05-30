<?php
include 'header.php';
$query = $db->prepare("SELECT * FROM post where id={$_GET['id']}");
$query->execute();
$list = $query->fetch(PDO::FETCH_ASSOC);



if (isset($_POST['yorumyap'])) {
  $adsoyad = $_POST['adsoyad'];
  $email = $_POST['email'];
  $yorum = $_POST['yorum'];
	$post_id = $_GET['id'];

    $query = $db->prepare("INSERT INTO yorumlar SET
      adsoyad = ?,
      email = ?,
			yorum = ?,
      post_id = ?
    ");
    $save = $query->execute([
    $adsoyad,$email,$yorum,$post_id
    ]);

    if ($save) {
			echo "<script>window.location='single.php?id=".$_GET['id']."';alert('Yorumunuz başarıyla yayınlandı.');</script>";
    }else{
			echo "<script>window.location='single.php';alert('Bir hata oluştu.');</script>";
    }

}

?>
	<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
						<a href="#"><img class="img-responsive" src="./admin/bloggorselleri/<?php echo $list['img_url']; ?>" alt=" "></a>
					<div class=" single-grid">
						<h4><?php echo $list['baslik']; ?></h4>
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i><?php echo $list['yukleyen_adsoyad']; ?></span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i><?php echo $list['tarih']; ?></span></li>
		  					</ul>
						<p><?php echo $list['icerik']; ?></p>

					</div><br><br>
					<div class="comments heading">
						<?php
						$taktik = $db->prepare("SELECT * FROM yorumlar where post_id={$_GET['id']}");
						$taktik->execute();
						$taktikcek = $taktik->fetchAll(PDO::FETCH_ASSOC);
						if($taktik->rowCount()){?>
							<div class="yorumlar" style="width:100%;background:#ddd;padding:25px;margin:20px 0px;font-size: 14px;font-family: 'Raleway-Regular';">

									<span style="color:gray;">Ad-Soyad</span><br><br>
									<p style="color:gray;">fasdf dsf sdf</p>


							</div><br>
						<?php }else{ ?>
							<p>Bu yazıya henüz yorum yapılmamış.</p><br>
						<?php } ?>






												<h3>Yorum yap</h3>

    				<div class="comment-bottom heading">

    					<form method="post" action="">
						<input name="adsoyad" type="text" placeholder="Ad-Soyad..">
						<input name="email" type="email" placeholder="E-mail..">
						<textarea name="yorum" cols="77" rows="6" placeholder="Yorumunuz.. "></textarea>
							<input name="yorumyap" type="submit" value="Gönder">
					</form>
    				</div>
				</div>
			</div>
	</div>
	<!--end-single-->
	<?php
include 'footer.php';

?>
