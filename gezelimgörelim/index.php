<?php
include 'header.php';

$banner = $db->prepare("SELECT * FROM post order by rand() limit 1");
$banner->execute();
$bannercek = $banner->fetchAll(PDO::FETCH_ASSOC);


$blog = $db->prepare("SELECT * FROM post");
$blog->execute();
$blogcek = $blog->fetchAll(PDO::FETCH_ASSOC);


$bilgitaktik = $db->prepare("SELECT * FROM ipuclari");
$bilgitaktik->execute();
$bilgitaktikcek = $bilgitaktik->fetchAll(PDO::FETCH_ASSOC);


$begenebilirsiniz = $db->prepare("SELECT * FROM post order by rand() limit 3");
$begenebilirsiniz->execute();
$cek = $begenebilirsiniz->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="banner">
	<div class="container">
		<div class="banner-top">
			<div class="banner-text">
				<h2>Geziler</h2>
				<h1>Gezilmesi Gereken Yerler</h1>
				<div class="banner-btn">
					<a href="index.php#icerik">Daha Fazla</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--about-starts-->
<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<?php  if (!isset($_GET['ara_txt'])) {?>

<div class="">
	<?php  foreach ($bannercek as $key => $write) {?>

	<div class="about-one">
		<p><?php echo $write['bolge']; ?></p>
		<h3><?php echo $write['baslik']; ?></h3>
	</div>
	<div class="about-two">
		<a href="single.php?id=<?php echo $write['id']; ?>"><img src="./admin/bloggorselleri/<?php echo $write['img_url']; ?>" alt="" /></a>
		<p>Yükleyen: <button style="border:none;background:none;color:black;"><?php echo $write['yukleyen_adsoyad']; ?></button> <?php echo $write['tarih']; ?> </p>
		<p><?php echo $write['icerik']; ?></p>
		<div class="about-btn">
			<a href="single.php?id=<?php echo $write['id']; ?>">Devamı..</a>
		</div>
		<ul>
			<li><p>Paylaş : </p></li>
			<li><a href="#"><span class="fb"> </span></a></li>
			<li><a href="#"><span class="twit"> </span></a></li>
			<li><a href="#"><span class="pin"> </span></a></li>
			<li><a href="#"><span class="rss"> </span></a></li>
			<li><a href="#"><span class="drbl"> </span></a></li>
		</ul>
	</div>
<?php	} ?>

</div>
<?php	} ?>
<?php  if (!isset($_GET['ara_txt'])) {?>

					<div class="about-tre" id="icerik">


						<div style="text-align:center;margin-left:100px;">
							<div class="col-md-10 abt-left" style="max-width:100%;float:left;display:inline-grid;text-align:center;">
								<?php  foreach ($blogcek as $key => $write) {?>
<div style="border:1px solid #999;padding:20px;margin:15px;">



								<a href="single.php?id=<?php echo $write['id']; ?>"><img style="width:100%;float:left;margin-bottom:20px;" src="./admin/bloggorselleri/<?php echo $write['img_url']; ?>" alt="" /></a><br>
									<h6 ><?php echo $write['bolge']; ?></h6>

								<h3><a href="single.php?id=<?php echo $write['id']; ?>"><?php echo $write['baslik']; ?></a></h3>

								<p><?php
								if(strlen($write['icerik']) >200){
						        $text = substr($write['icerik'],0,200);
										echo $text;
										echo "<br><br><a href='single.php?id=".$write['id']."'>Devamını oku..</a>";

									}else{
										echo $write['icerik'];
									}


								?></p>
								<label><?php echo $write['tarih']; ?></label>
</div>

							<?php	} ?>

							</div>


							<div class="clearfix"></div>
						</div>
					</div>
				<?php	}else{

				 				$gelen = $_GET["ara_txt"];
				 				if($gelen == null){
									echo "<script>window.location='index.php';alert('Lütfen bir kelime veya harf yazınız.');</script>";
				 				}
				 				$cek = $db->query("select * from post where baslik like '%$gelen%' ",PDO::FETCH_ASSOC);
								if($cek->rowCount()){
									echo "<script>window.location='index.php?ara_txt=".$gelen."#icerik_ara_txt';</script>";

					?>
					<div class="about-tre" id="icerik_ara_txt">


						<div style="text-align:center;margin-left:100px;">
							<div class="col-md-12 abt-left" style="max-width:100%;float:left;display:inline-grid;text-align:center;">
								<?php  foreach ($cek as $key => $write) {?>
<div style="border:1px solid #999;padding:20px;margin:15px;">



								<a href="single.php?id=<?php echo $write['id']; ?>"><img style="width:100%;float:left;margin-bottom:20px;" src="./admin/bloggorselleri/<?php echo $write['img_url']; ?>" alt="" /></a><br>
									<h6 ><?php echo $write['bolge']; ?></h6>

								<h3><a href="single.php?id=<?php echo $write['id']; ?>"><?php echo $write['baslik']; ?></a></h3>

								<p><?php
								if(strlen($write['icerik']) >200){
										$text = substr($write['icerik'],0,200);
										echo $text;
										echo "<br><br><a href='single.php?id=".$write['id']."'>Devamını oku..</a>";

									}else{
										echo $write['icerik'];
									}


								?></p>
								<label><?php echo $write['tarih']; ?></label>
</div>

							<?php	} ?>

							</div>


							<div class="clearfix"></div>
						</div>
					</div>
			<?php	}else{
				echo "<script>window.location='index.php';alert('Bu anahtar kelimeye ait yazımız bulunmamaktadır.');</script>";

			} ?>
		<?php	} ?>

				</div>

				<div class="col-md-4 about-right heading">
					<div class="abt-1">
						<h3>GEZGİN</h3>
						<div class="abt-one">
							<img src="images/gezgin.jpg" alt="" />
							<p>Hayatımda iyi ki'leri çoğaltıp keşke'lere yer vermemek için iyi hissettiğim şeyi yapıyor ve geziyorum. Seyahat tarzımı kategorize edemem ben yolda olmayı,seyahat etmeyi ve paylaşmayı her yönüyle seviyorum. Blogumun sana da yardımcı olması benim için büyük mutluluk, hoş geldin!</p>
							<div class="a-btn">
								<a href="index.php#icerik">Daha Fazla</a>
							</div>
						</div>
					</div>
					<?php  if (!isset($_GET['ara_txt'])) {?>

					<div class="abt-2">
						<h3>BEĞENEBİLECEĞİNİZ BAZI ŞEYLER</h3>
						<?php  foreach ($cek as $key => $write) {?>

							<div class="might-grid">
								<div class="grid-might">
									<a href="single.php?id=<?php echo $write['id']; ?>"><img src="./admin/bloggorselleri/<?php echo $write['img_url']; ?>" class="img-responsive" alt=""> </a>
								</div>
								<div class="might-top">
									<h4><a href="single.php?id=<?php echo $write['id']; ?>"><?php echo $write['baslik'] ?></a></h4>
									<p><?php

									if(strlen($write['icerik']) >150){
							        $text = substr($write['icerik'],0,150);
											echo $text;
											echo "<br><br><a href='single.php?id=".$write['id']."'>Devamını oku..</a>";

										}else{
											echo $write['icerik'];
										}


									 ?></p>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php } ?>

					</div>
				<?php } ?>
				<?php  if (!isset($_GET['ara_txt'])) {?>

					<div class="abt-2">
						<h3></h3>
						<ul>
							<li>
								<?php  foreach ($bilgitaktikcek as $key => $write) {?>

								<a href="typo.php#bilgitaktik">
									<?php echo "<br>" ?>
									<?php echo $write['icerik']; ?>
									<?php echo "<br>" ?>
								</a>
							<?php } ?>
							</li>

						</ul>
					</div>
				<?php } ?>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--about-end-->
	<!--slide-starts-->
	<div class="slide">
		<div class="container">
			<div class="fle-xsel">
			<ul id="flexiselDemo3">
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/1.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/2.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/3.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/4.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/5.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/6.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
			</ul>

							 <script type="text/javascript">
								$(window).load(function() {

									$("#flexiselDemo3").flexisel({
										visibleItems: 5,
										animationSpeed: 1000,
										autoPlay: true,
										autoPlaySpeed: 3000,
										pauseOnHover: true,
										enableResponsiveBreakpoints: true,
										responsiveBreakpoints: {
											portrait: {
												changePoint:480,
												visibleItems: 2
											},
											landscape: {
												changePoint:640,
												visibleItems: 3
											},
											tablet: {
												changePoint:768,
												visibleItems: 3
											}
										}
									});

								});
								</script>
								<script type="text/javascript" src="js/jquery.flexisel.js"></script>
					<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--slide-end-->

<?php
include 'footer.php';

?>
