<?php
include 'header.php';
if (isset($_POST['message_submit_btn'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
    $query = $db->prepare("INSERT INTO iletisim SET
      email = ?,
      mesaj = ?,
      adsoyad = ?
    ");
    $save = $query->execute([
    $email,$message,$name
    ]);

    if ($save) {
			echo "<script>window.location='contact.php';alert('Mesajınız başarıyla gönderildi.');</script>";
    }else{
			echo "<script>window.location='contact.php';alert('Bir hata oluştu.');</script>";
    }

}

?>
	<!----start-contact---->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h3>İLETİŞİM</h3>
			</div>
			<div class="contact-bottom">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d633.1975489318203!2d29.023059378126835!3d40.9812154066578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab86018914b89%3A0x7d39a6253bd197b8!2zQ2FmZXJhxJ9hLCBNb2RhIEJvc3RhbsSxIFNrLiBObzozMiwgMzQ3MTAgS2FkxLFrw7Z5L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1713372010835!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				<div class="contact-text">
					<div class="col-md-4 contact-left">
						<h4>Bizi Görmeden Gitmeyin!!</h4>
						<p>Tatile veya seyahate çıkıyorsanız ofisimize uğramadan gitmeyin. Seyaht planlamasında gideceğiniz yerlerdeki tarihi yerleri, müzeleri, koyları, plajları, yaylaları bizden öğrenip bir plan konusunda yardımcı olmabiliriz.</p>
						<div class="address">
							<h4>Adres</h4>
							<p>Gezelim Görelim,
							<span>Moda Bostan Sok. No:32 Caferağa Mah. Moda, Kadıköy, 34736, İstanbul</span>
							+90 349 98 98 TÜRKİYE</p>
						</div>
					</div>
					<div class="col-md-8 contact-right">
						<form method="post" action="">

						<input style="width:100%;margin-bottom:20px;" name="name" placeholder="İsim" type="text" required><br>
						<input name="email" placeholder="Email" type="email" required>
						<textarea name="message" placeholder="Mesaj" required></textarea>
							<div class="submit-btn">
									<input name="message_submit_btn" type="submit" value="GÖNDER">
							</div>
						</form>

					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!----end-contact---->
	<?php
include 'footer.php';

?>
