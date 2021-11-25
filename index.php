<?php 
if(isset($_POST['submit'])){
    $to = "la_meche_et_les_sens@hotmail.fr"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
		$phone = $_POST['phone'];
		$concern = $_POST['concern'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " dont le téléphone est: " . $phone . " tente de vous joindre au sujet de:" . $concern . " en vous laissant ce message:" . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hybrid Concept</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<img src="images/Logo/Logo.jpg" alt="logo">
	</header>
	<main>
		<section class="first-section">
			<h1>Vente, location et installation de systèmes de sonorisation, d’éclairage et de materiel DJ; au cœur de Genève.</h1>
			<h2>Une expérience de plus de 25 ans dans le domaine de la sonorisation et de l’éclairage professionnels nous permet de vous proposer les solutions les mieux adaptées à vos besoins et à vos budgets.</h2>
		</section>
		<section class="second-section">
			<article>
				<h3>Partenariat</h3>
				<p>Avec nos clients, nous privilégions une relation de partenariat, nous pensons dialogue et long terme en intégrant les possibilités d’extension dès la conception de leurs projets.</p>
			</article>
			<article>
				<h3>Maintenance et dépannage</h3>
				<p>Nous élaborons avec vous un programme personnalisé de maintenance et d’actualisation de votre installation en fonction de vos besoins. Notre département SAV / dépannage est à votre disposition.</p>
			</article>
		</section>
		<section class="third-section">
			<h3>Vous avez un projet? Parlons-en!</h3>
			<p>Quelle que soit votre activité, nous avons la réponse, nous concevrons ensemble un système complet et performant.</p>
			<div class="contact">
				<a href="mailto:info@hybrid-concept.ch">
					<div class="link">
						<img src="images/Icons/Icon-Mail.svg" alt="Mail">
						<a>info@hybrid-concept.ch</a>
					</div>
				</a>
				<a href="tel:+41229400865">
					<div class="link">
						<img src="images/Icons/Icon-Phone.svg" alt="Phone">
						<a>+41 22 940 08 65</a>
					</div>
				</a>
			</div>
		</section>
		<section class="fourth-section">
			<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.1095550881287!2d6.1351969155927!3d46.20827557911685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64d9ef255555%3A0xbe8f39c73c4b9ee4!2sRue%20Benjamin-Franklin%204%2C%201201%20Gen%C3%A8ve%2C%20Suisse!5e0!3m2!1sfr!2sfr!4v1637742659949!5m2!1sfr!2sfr" width="1200" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			<h4>Adresse</h4>
			<p>Rue Benjamin-Franklin 4-6, 1201 Genève</p>
		</section>
		<section class="form-section">
			<h5>N’hésitez pas à nous contacter pour toutes demandes</h5>
			<form action="" method="post">
				<div class="identity">
					<p><input type="text" name="last_name" placeholder="Nom" required></p>
					<p><input type="text" name="first_name" placeholder="Prénom" required></p>
				</div>
				<div class="identity">
					<p><input type="text" name="email" placeholder="E-mail" required></p>
					<p><input type="text" name="phone" placeholder="Téléphone" required></p>
				</div>
				<p><input type="text" name="concern" placeholder="Concerne" required></p>		
				<p><textarea name="message" rows="5" placeholder="Message" required></textarea></p>
				<p class="button-submit"><button type="submit">ENVOYER</button></p>
			</form>
		</section>
		<footer>
			<p><bold>&copy; WILD-DESIGN.CH</bold> – Tous droits reservés Hybrid Concept A. D. Sàrl</p>
		</footer>
	</main>
</body>
</html>
