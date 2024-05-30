<?php
include 'header.php';

$taktik = $db->prepare("SELECT * FROM ipuclari where durum='Taktik'");
$taktik->execute();
$taktikcek = $taktik->fetchAll(PDO::FETCH_ASSOC);

$bilgi = $db->prepare("SELECT * FROM ipuclari where durum='Bilgi'");
$bilgi->execute();
$bilgicek = $bilgi->fetchAll(PDO::FETCH_ASSOC);

?>
	<!--typo-starts-->


<div class="pages" id="pages">
		<div class="container">
			<div class="alerts">
			  <h3 class="ghj">Bilgiler</h3>
				<?php  foreach ($bilgicek as $key => $write) {?>

					<?php if($write['arkaplan'] == "Yesil"){ ?>

						<div class="alert alert-success" role="alert">
						 <p><?php echo $write['icerik']; ?></p>
						</div>

					<?php	}else if($write['arkaplan'] == "Mavi"){ ?>
						<div class="alert alert-info" role="alert">
							<p><?php echo $write['icerik']; ?></p>

						</div>
					<?php	}else if($write['arkaplan'] == "Sari"){ ?>
						<div class="alert alert-warning" role="alert">
							<p><?php echo $write['icerik']; ?></p>

	 			   </div>
				 <?php	}else{ ?>
					 <div class="alert alert-danger" role="alert">
						 <p><?php echo $write['icerik']; ?></p>

				   </div>
			 <?php	} ?>



			 <?php } ?>

		    </div>
				<section  id="bilgitaktik">

			<div class="distracted">
			  <h3 class="ghj">Taktikler</h3>
				<?php  foreach ($taktikcek as $key => $write) {?>

					<?php if($write['arkaplan'] == "Yesil"){ ?>

						<div class="alert alert-success" role="alert">
						 <p><?php echo $write['icerik']; ?></p>
						</div>

					<?php	}else if($write['arkaplan'] == "Mavi"){ ?>
						<div class="alert alert-info" role="alert">
							<p><?php echo $write['icerik']; ?></p>

						</div>
					<?php	}else if($write['arkaplan'] == "Sari"){ ?>
						<div class="alert alert-warning" role="alert">
							<p><?php echo $write['icerik']; ?></p>

	 			   </div>
				 <?php	}else{ ?>
					 <div class="alert alert-danger" role="alert">
						 <p><?php echo $write['icerik']; ?></p>

				   </div>
			 <?php	} ?>

				 <?php } ?>

		</div>
	</section>

	</div>
</div>
	<!--typo-ends-->
	<?php
include 'footer.php';

?>
