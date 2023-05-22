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
    </div>
    <h1 class="titolo">Register</h1>
    <form action="server.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username" require>
        <label for="password">password</label>
        <input type="password" name="password">
        <label for="nome">cognome</label>
        <input type="text" name="cognome" >
        <label for="cognome">nome</label>
        <input type="text" name="nome" >
        <label for="cv">file del cv in pdf</label>
        <input type="file" name="file" value="scegli il tuo file">
        <label for="email">email</label>
        <input type="email" name="email" >
        <input type="submit" value="invia">
    </form>
    
</body>
</html>