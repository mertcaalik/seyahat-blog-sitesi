<?php
include 'header.php';

$gorsel = $db->prepare("SELECT * FROM galeri");
$gorsel->execute();
$gorselcek = $gorsel->fetchAll(PDO::FETCH_ASSOC);

?>
	<!--gallery-starts-->
	<div class="gallery">
		<div class="container">
			<div class="gallery-top heading">
				<h3>FOTOĞRAFLAR</h3>
			</div>
			<section style="max-width:100%;float:left;display:inline-flex;text-align:center;">
				<ul id="da-thumbs" class="">
					<?php  foreach ($gorselcek as $key => $write) {?>

							<li style="list-style:none;display:inline-flex;padding:5px;	box-shadow: 0 1px 3px rgba(231, 231, 231, 0.43);background: #EFEFEF;border-radius:5px;
">
								<a href="./admin/gallery/<?php echo $write['img_url']; ?>" rel="Görsel" class="b-link-stripe b-animate-go  thickbox">
									<img style="width:300px;" src="./admin/gallery/<?php echo $write['img_url']; ?>" alt="" />

								</a>
							</li>

				<?php	} ?>


				</ul>
			</section>

		<script type="text/javascript">
			$(function() {

				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>
        </div>
	</div>
	<!--gallery-end-->
	<?php
include 'footer.php';

?>
