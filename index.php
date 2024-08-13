<!-- ------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelaria</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <div class="cabecalho">
    <h2 class = "MensagemBemVindo">Bem vindo(a) a papelaria Royal Tecidos, escolha o quanto de cada produto você irá levar: </h2>
    </div>

    <?php
    include ("back.php")
    ?> 
<table>
  <tr>
    <th>Produto</th>
    <th>Preço</th>
    <th>Quantidade em estoque</th>
  </tr>
  <tr>
    <td>Lápis do tipo 2</td>
    <td>R$1,50</td>
    <td>
        <?= $QtnLapis?>
    </td>
  </tr>
  <tr>
    <td>Caneta Esferográfica azul</td>
    <td>R$2,00</td>
    <td>
        <?= $QtnCaneta?>
    </td>
  </tr>
  <tr>
    <td>Borracha Latex</td>
    <td>R$3,50</td>
    <td>
        <?= $QtnBorracha?>
    </td>
  </tr>
</table>

<br>

<form class = "FormularioUser" method="POST">

    <label class = "Labels" for="">Digite o número de lápis:</label>
    <input class = "InputNumerico" type="number" id="NumeroDeLapis" name="NumeroDeLapis" min="0" max="15">

    <br>

    <label class = "Labels" for="">Digite o número de canetas:</label>
    <input class = "InputNumerico" type="number" id="NumeroDeCanetas" name="NumeroDeCanetas" min="0" max="15">

    <br>

    <label class = "Labels" for="">Digite o número de borrachas:</label>
    <input class = "InputNumerico" type="number" id="NumeroDeBorrachas" name="NumeroDeBorrachas" min="0" max="15">

    <br>


    <input class = "BotaoCalcula" type="submit" value="Calcular preço">

    

    <div>
        <?php if ($MensagemFinal): ?>
            <p class="mensagemFinal"><?php echo $MensagemFinal; ?></p>
        <?php endif; ?>
    </div>

</form>

</body>
</html>