<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo "La connexion a échoué : " . $erreur->getMessage();
}

if (isset($_POST['envoyer'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if ($name && $email && $phone && $message) {
        try {
            $sql = "INSERT INTO utilisateurs (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':message', $message);
            
            $stmt->execute();
            echo "Votre message a été envoyé avec succès !";
        } catch (PDOException $e) {
            echo "Erreur lors de l'envoi : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gael-Portfolio</title>
</head>
<body>
    <!--DEBUT MENU-->
    <nav class="nav-bar">
        <ul>
            <img src="images/computer-fill.png" alt="logo">
            <li class="logo">gaellokossou</li>
        </ul>
        <a><img src="images/github-fill.png" alt="github"></a>
        <a><img src="images/linkedin-box-fill.png" alt="linkedin"></a>
        <a><img src="images/instagram-line.png" alt="instagram"></a>
        <a><img src="images/mail-line.png" alt="mail"></a>
        <a><img src="images/phone-fill.png" alt="phone"></a>
        <a><img src="images/whatsapp-line.png" alt="whatsapp"></a>
    </nav>
    <!--FIN MENU-->

    <section id="acceuil-id" class="acceuil">
        <div class="acceuil-div">
            <div class="description">
                    <p>Avant toute chose je me presente. Je suis actuellement etudiant en Troisieme annee de Genie Logiciel a l'EPL : Ecole Polytechnique de Lome. Je vous presente mon portfolio qui retrace mon experience professionnelle.</p><br>
                    <p>Au fil de mes formations et de mes experiences, je me suis specialise dans le domaine du developpement web et du community management.</p>
                    <p>Je vous invite a telecharger mon CV ci-dessous pour mieux eplorer mes competences.</p>
                    <button class="btn"><a href="LXKG_CV.pdf"><img src="images/download-2-fill.png" alt="download-logo"></a>telecharger</button>
            </div>
            <div class="formulaire">
                <p>Vous recherchez un développeur web ?</p>
                <p>Contactez-moi ici</p>
                <form method="post" action="">
                    <!-- Name Field -->
                    <div>
                        <label for="name">Nom et prénoms</label><br>
                        <input name="name" required type="text" id="name" placeholder="Entrez votre nom">
                    </div>
                    <!-- Email Field -->
                    <div>
                        <label for="email">Email</label><br>
                        <input name="email" required type="email" id="email" placeholder="Email">
                    </div>
                    <!-- Phone Field -->
                    <div>
                        <label for="phone">Numéro de téléphone</label><br>
                        <input name="phone" required type="tel" id="phone" placeholder="Numéro de téléphone">
                    </div>
                    <!-- Message Field -->
                    <div class="message">
                        <label for="message">Message</label><br>
                        <input name="message" required type="text" id="message" placeholder="Message">
                    </div>
                    <button type="submit" class="btn" name="envoyer">ENVOYER</button>
                </form>
            </div>
            <div class="logo-anim">
                <img src="images/moi.png" alt="">
            </div>
        </div>
        </section>
        <section class="competence">
            <div class="skill">
                <div class="outer">
                    <div class="inner">
                        <div id="number">
                            65%
                        </div>
                    </div>  
                </div>
                <div class="img-p">
                    <img src="images/user-fill.png" alt="">
                    <p>DÉVELOPPEMENT PYTHON</p>
                </div>
                <svg class="svg-1" xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                    <defs>
                       <linearGradient id="GradientColor">
                          <stop offset="0%" stop-color="#e91e63" />
                          <stop offset="100%" stop-color="#673ab7" />
                       </linearGradient>
                    </defs>
                    <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                </svg>
            </div>
            <div class="skill">
                <div class="outer">
                    <div class="inner">
                        <div id="number-1">
                            50%
                        </div>
                    </div>  
                </div>
                <div class="img-p">
                    <img src="images/user-fill.png" alt="">
                    <p>FRAMEWORK DJANGO</p>
                </div>
                <svg class="svg-2" xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                    <defs>
                       <linearGradient id="GradientColor">
                          <stop offset="0%" stop-color="#e91e63" />
                          <stop offset="100%" stop-color="#673ab7" />
                       </linearGradient>
                    </defs>
                    <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                </svg>
            </div>

            <div class="skill">
                <div class="outer">
                    <div class="inner">
                        <div id="number-2">
                            80%
                        </div>
                    </div>  
                </div>
                <div class="img-p">
                    <img src="images/user-fill.png" alt="">
                    <p>Gestion de projet</p>
                </div>
                <svg class="svg-3" xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                    <defs>
                       <linearGradient id="GradientColor">
                          <stop offset="0%" stop-color="#e91e63" />
                          <stop offset="100%" stop-color="#673ab7" />
                       </linearGradient>
                    </defs>
                    <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                </svg>
            </div>

            
            <div class="skill">
                <div class="outer">
                    <div class="inner">
                        <div id="number-3">
                            30%
                        </div>
                    </div>  
                </div>
                <div class="img-p">
                    <img src="images/user-fill.png" alt="">
                    <p>UI/UX SUR FIGMA</p>
                </div>
                <svg class="svg-4" xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                    <defs>
                       <linearGradient id="GradientColor">
                          <stop offset="0%" stop-color="#e91e63" />
                          <stop offset="100%" stop-color="#673ab7" />
                       </linearGradient>
                    </defs>
                    <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                </svg>
            </div>

            <div class="skill">
                <div class="outer">
                    <div class="inner">
                        <div id="number-4">
                            80%
                        </div>
                    </div>  
                </div>
                <div class="img-p">
                    <img src="images/user-fill.png" alt="">
                    <p>UML & SQLite</p>
                </div>
                <svg class="svg-5" xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                    <defs>
                       <linearGradient id="GradientColor">
                          <stop offset="0%" stop-color="#e91e63" />
                          <stop offset="100%" stop-color="#673ab7" />
                       </linearGradient>
                    </defs>
                    <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                </svg>
            </div>
        </section>

        <script>
            let number = document.getElementById("number");
            let counter = 0;
            setInterval(() => {
                if(counter == 65){
                    clearInterval();
                }else{
                    counter += 1;
                    number.innerHTML = counter + "%";
                }
                
            }, 30);

            let number1 = document.getElementById("number-1");
            let counter1 = 0;
            setInterval(() => {
                if(counter1 == 50){
                    clearInterval();
                }else{
                    counter1 += 1;
                    number1.innerHTML = counter1 + "%";
                }
                
            }, 30);

            let number2 = document.getElementById("number-2");
            let counter2 = 0;
            setInterval(() => {
                if(counter2 == 80){
                    clearInterval();
                }else{
                    counter2 += 1;
                    number2.innerHTML = counter2 + "%";
                }
                
            }, 30);

            let number3 = document.getElementById("number-3");
            let counter3 = 0;
            setInterval(() => {
                if(counter3 == 30){
                    clearInterval();
                }else{
                    counter3 += 1;
                    number3.innerHTML = counter3 + "%";
                }
                
            }, 30);

            let number4 = document.getElementById("number-4");
            let counter4 = 0;
            setInterval(() => {
                if(counter2 == 80){
                    clearInterval();
                }else{
                    counter4 += 1;
                    number4.innerHTML = counter4 + "%";
                }
                
            }, 30);
        </script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>