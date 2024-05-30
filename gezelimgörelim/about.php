<?php
// Veritabanı bağlantısını içeren dosyayı dahil et
include 'header.php';

// Veritabanından 'ekip' tablosundaki tüm kayıtları seçmek için bir sorgu hazırlanıyor
$ekip = $db->prepare("SELECT * FROM ekip");
$ekip->execute();
// Sorgu çalıştırılıyor ve sonuçlar bir dizi olarak alınıyor
$ekipcek = $ekip->fetchAll(PDO::FETCH_ASSOC);

?>
	<!-- Hoş geldiniz bölümünün başlangıcı -->
	<div class="welcome">
		<div class="container">
			<div class="welcome-top heading">
				<h3>HOŞGELDİNİZ</h3>
				<div class="welcome-bottom">
					<img src="images/kapadokya.jpg" alt=""/>
					<!-- Hoş geldiniz mesajı ve açıklama metni -->
					<p>Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.</p>
					<p>Nulla in tempor lectus. Etiam ac mauris lacinia nulla ultricies porta sit amet eleifend ligula. Quisque tincidunt vitae turpis at efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sagittis, magna a sagittis dapibus, ipsum metus interdum lectus, quis feugiat leo ipsum nec diam.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Hoş geldiniz bölümünün sonu -->
	<!-- Ekip bölümü başlangıcı -->
	<div class="team">
		<div class="container">
		<div class="team-top heading">
			<h3>BİZ KİMİZ</h3>
		</div>
			<div class="team-bottom">

				<?php  foreach ($ekipcek as $key => $write) {?>

				<div class="col-md-3 team-left">
					<!-- Ekip üyesinin fotoğrafı -->
					<img src="./admin/gallery/<?php echo $write['url']; ?>" alt="" />
					<!-- Ekip üyesinin adı ve soyadı -->
					<h4><?php echo $write['adsoyad']; ?></h4>
					<!-- Ekip üyesinin içeriği (açıklaması) -->
					<p><?php echo $write['icerik']; ?></p>
				</div>

				<?php } ?>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- Ekip bölümünün sonu -->
	<!-- Kaydırma bölümünün başlangıcı -->
	<div class="slide">
		<div class="container">
			<div class="fle-xsel">
			<ul id="flexiselDemo3">
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-1.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-2.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-3.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-4.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-5.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-6.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
			</ul>

				<script type="text/javascript">
				$(window).load(function() {
					// flexisel eklentisinin yapılandırması ve başlatılması
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
				<!-- Flexisel eklentisi için gerekli JavaScript dosyası -->
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- Kaydırma bölümünün sonu -->
	<?php
	// Alt bilgi (footer) dosyasını dahil et
	include 'footer.php';
	?>
