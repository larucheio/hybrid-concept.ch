<?php
// 1. Soumet le formulaire
// 2. Récupère le formulaire
// 3. Validation des données (si erreur de validation -> retour back() avec erreurs)
// 4. Escape inputs (htmlspecialchars)
// 5. Send email
// 6. Display message (that the email was sent)

function escape_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function send_mail($data)
{
    $to = 'info@hybrid-concept.ch';
    $subject = '[hybrid-concept.ch] - ' . $data['concern'];
    $message = $message = $data['first_name'] . " " . $data['last_name'] . " / " . $data['phone'] . "\n\n" . $data['message'];
    $additional_params = [
        'from' => $data['email']
    ];

    mail($to, $subject, $message, $additional_params);
}

$fields = [
    'last_name' => 'Veuillez renseigner votre nom',
    'first_name' => 'Veuillez renseigner votre prénom',
    'email' => 'Veuillez renseigner votre email',
    'phone' => 'Veuillez renseigner votre téléphone',
    'concern' => 'Veuillez renseigner le sujet de votre demande',
    'message' => 'Veuillez renseigner votre message',
];

$errors = [];
$email_has_been_sent = false;

// 2.
$form = $_POST;
if (isset($form['submit'])) {
    $email_has_been_sent = false;

    if ($form['subject']) {
        return;
    }

    // 3.
    $errors = []; // Reset errors;
    foreach ($fields as $key => $value) {
        $form[$key] ? null : array_push($errors, $value);
    }
    // $form['last_name'] ? null : array_push($errors, 'Veuillez renseigner votre nom');
    // $form['first_name'] ? null : array_push($errors, 'Veuillez renseigner votre prénom');
    // $form['email'] ? null : array_push($errors, 'Veuillez renseigner votre email');
    // $form['phone'] ? null : array_push($errors, 'Veuillez renseigner votre téléphone');
    // $form['concern'] ? null : array_push($errors, 'Veuillez renseigner le sujet de votre message');
    // $form['message'] ? null : array_push($errors, 'Veuillez renseigner votre message');

    // If no errors -> pursue
    if (sizeof($errors) < 1) {
        // 4.
        $data = [];
        foreach ($fields as $key => $value) {
            $data[$key] = escape_data($form[$key]);
        }
        // $data['last_name'] = escape_data($form['last_name']);
        // $data['first_name'] = escape_data($form['first_name']);
        // $data['email'] = escape_data($form['email']);
        // $data['phone'] = escape_data($form['phone']);
        // $data['concern'] = escape_data($form['concern']);
        // $data['message'] = escape_data($form['message']);

        // 5.
        send_mail($data);

        // 6.
        $email_has_been_sent = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<!-- dev: laruche — https://laruche.io -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hybrid Concept</title>
    <meta name="description" content="Vente, location et installation de systèmes de sonorisation, d’éclairage et de materiel DJ; au cœur de Genève.">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <img src="/images/logo/logo.svg" alt="Hybrid Concept - Logo">
    </header>
	<main>
        <section class="first-section">
            <div class="container">
                <h1>Vente, location et installation de systèmes de sonorisation, d’éclairage et de materiel DJ; au cœur de Genève.</h1>
                <h2>Une expérience de plus de 25 ans dans le domaine de la sonorisation et de l’éclairage professionnels nous permet de vous proposer les solutions les mieux adaptées à vos besoins et à vos budgets.</h2>
            </div>
        </section>
		<section class="second-section">
            <div class="container">
                <article>
                    <h3>Partenariat</h3>
                    <p>Avec nos clients, nous privilégions une relation de partenariat, nous pensons dialogue et long terme en intégrant les possibilités d’extension dès la conception de leurs projets.</p>
                </article>
                <article>
                    <h3>Maintenance et dépannage</h3>
                    <p>Nous élaborons avec vous un programme personnalisé de maintenance et d’actualisation de votre installation en fonction de vos besoins. Notre département SAV / dépannage est à votre disposition.</p>
                </article>
            </div>
		</section>
		<section class="third-section">
			<div class="container">
                <h3>Vous avez un projet? Parlons-en!</h3>
    			<p>Quelle que soit votre activité, nous avons la réponse, nous concevrons ensemble un système complet et performant.</p>
    			<div class="contact">
    				<a href="mailto:info@hybrid-concept.ch">
    					<div class="link">
    						<img src="/images/icons/icon-mail.svg" alt="Mail">
    						<span>info@hybrid-concept.ch</span>
    					</div>
    				</a>
    				<a href="tel:+41229400865">
    					<div class="link">
    						<img src="/images/icons/icon-phone.svg" alt="Phone">
    						<span>+41 22 940 08 65</span>
    					</div>
    				</a>
    			</div>
            </div>
		</section>
		<section class="fourth-section">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.1095540383935!2d6.1373856!3d46.2082756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64d9efbc8a23%3A0xc9cdfa3b3c9ec4c6!2sHybrid%20Concept%2C%20Donati!5e0!3m2!1sfr!2sch!4v1638192797715!5m2!1sfr!2sch" width="1200" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <h4>Adresse</h4>
			<p>Rue Benjamin-Franklin 4-6, 1201 Genève</p>
		</section>
		<section class="form-section">
            <div class="container">
                <?php
                if ($email_has_been_sent) {
                    echo "<h5>Votre demande nous as été transmise. Nous nous en occupons dans les plus brefs délais.</h5>";
                } else {
                ?>
                <h5>N’hésitez pas à nous contacter pour toutes demandes</h5>
                    <?php
                    if (sizeof($errors) > 0) {
                        echo "<ul>";
                        foreach ($errors as $error) {
                            echo "<li>" . $error . "</li>";
                        }
                        echo "</ul>";
                    }
                    ?>

        			<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                        <input type="text" name="subject" class="hide-robot">
        				<div class="identity">
        					<input type="text" name="last_name" placeholder="Nom">
        					<input type="text" name="first_name" placeholder="Prénom" required>
        				</div>
        				<div class="identity">
        					<input type="text" name="email" placeholder="E-mail" required>
        					<input type="text" name="phone" placeholder="Téléphone" required>
        				</div>
        				<input type="text" name="concern" placeholder="Concerne" required>
        				<textarea name="message" rows="5" placeholder="Message" required></textarea>
        				<p class="button-submit"><button type="submit" name="submit">ENVOYER</button></p>
        			</form>
                <?php } ?>
            </div>
		</section>
	</main>
    <footer>
        <p><bold>&copy; <a href="https://wild-design.ch/" target="_blank">WILD-DESIGN.CH</a></bold> – Tous droits reservés Hybrid Concept A. D. Sàrl</p>
    </footer>
</body>
</html>
