<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/register.css">
    <title>Document</title>
</head>
<body>
    <div class="navigazione">
            <a href="http://localhost/temaEsame/index.php">home</a>
            <a href="http://localhost/temaEsame/pages/register.php">register</a>
            <a href="http://localhost/temaEsame/pages/login.php">login</a>
            <a href="http://localhost/temaEsame/pages/esposizioni.php">esposizioni</a>
    </div>
    <h1 class="titolo">Register</h1>
    <form action="server.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" require>
        <label for="password">Password</label>
        <input type="password" name="password">
        <label for="cognome">Cognome</label>
        <input type="text" name="cognome" >
        <label for="nome">Nome</label>
        <input type="text" name="nome" >
        <label for="cv">File del cv in pdf</label>
        <input type="file" name="file" value="scegli il tuo file">
        <label for="email">E-mail</label>
        <input type="email" name="email" >
        <label for="dataN">Data nascita</label>
        <input type="date" name="dataN" >
        <label for="luogoN">Luogo nascita</label>
        <input type="text" name="luogoN" >
        <label for="qualifica">Qualifica</label>
        <select name="qualifica">
        <option value="amatore">Amatore</option>
        <option value="esperto_non_professionista">Esperto non professionista</option>
        <option value="professionista">Professionista</option>    
    </select>
        <input type="submit" value="invia">
    </form>
    <footer>
        <h1>contact as on</h1>
        <a href="https://www.instagram.com/">instagram</a>
        <a href="https://it-it.facebook.com/">facebook</a>
        <a href="https://twitter.com/?lang=it">twitter</a>
    </footer>
</body>
</html>