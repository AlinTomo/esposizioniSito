<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/icon.ico">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="../style/home.css">
    <title>Home</title>
    
</head>
<body>
<?php 
    session_start();
    $ruolo=$_SESSION['id_ruolo']??null;
?>
   <?php include 'header'.$ruolo.'.html' ?>
    <div class="contenuto">
        <div class=info>
            <p>Siamo un'entusiasmante associazione culturale dedicata a promuovere l'arte, la cultura e l'educazione nella nostra comunità. Attraverso una vasta gamma di eventi, progetti e attività coinvolgenti, cerchiamo di ispirare e arricchire la vita delle persone che ci circondano.
    La nostra missione è quella di creare un ambiente stimolante e inclusivo in cui le persone possano esplorare e sviluppare le proprie passioni artistiche e culturali. Sosteniamo una vasta gamma di discipline, tra cui arte visiva, musica, teatro, danza, letteratura e molto altro ancora. Vogliamo incoraggiare l'espressione creativa e offrire opportunità per la crescita personale e professionale.</p>
        </div>
            <div class=maps>
                <h1>Dove trovarci</h1>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44653.75217499913!2d8.8026320901666!3d45.61346714535853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47868b905086b443%3A0x4618bcf6838e9e6e!2s21052%20Busto%20Arsizio%20VA!5e0!3m2!1sit!2sit!4v1684832756504!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </div>
    
</body>
<?php include 'footer.html' ?>
</html>