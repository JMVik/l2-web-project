<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire de création de compte</title>
  <link rel="stylesheet" href="assets/css/styletest.css">
  <script src="assets/js/verif_form.js" defer></script>
</head>
<body>
  <h1>Créer un compte</h1>
  <form>
    <label for="email">E-mail :</label>
    <input type="email" id="email" name="email" required>
    <p class="error"></p>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Créer mon compte</button>
  </form>
</body>
</html>

