<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercicio 1</title>
</head>
<body>
    <form action="/respostaExer1" method="POST">
      @CSRF
      <input type="number" name="valor1"/>
      <input type="number" name="valor2"/>
      <button type="submit"><strong>Calcular</strong></button>
  </form>
</body>
</html>