<?php
/**
 * Created by PhpStorm.
 * User: etienne
 * Date: 08/11/18
 * Time: 10:10
 */

function spin($txt)
{
    $pattern = '#\{([^{}]*)\}#msi';
    $test = preg_match_all($pattern, $txt, $out);
    if (!$test)
        return $txt;

    $a_trouver = array();


    foreach ($out[0] as $id => $match) {
        if ($id == 0) {
        $choisir = explode("|", $out[1][$id]);
        $a_trouver[] = $match;
        foreach ($choisir as $key => $value) {
            echo spin($reponse = str_replace($a_trouver, $value, $txt)) . '<br>';
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Spin</title>
  </head>
  <body>

<div class="container mt-4">
  <form method="post" action="">
      <div class="form-group">
          <label for="exampleFormControlTextarea1" class="text-info">Spin</label>
          <textarea class="form-control" id="text" rows="3" style="height: 200px;" name="text">{ Je|Tu|Il } mange des { frites | steacks | glaces } et je cherche un { stage | emploi | patron chouette comme Yavuz qui mettra Julie et Etienne ensemble en P3 }.</textarea>
      </div>
      <input class="btn btn-info" type="submit" value="Spin" name="spin" />
  </form>
</div>

<div class="container mt-2 border border-info" align="center">
<?php
echo spin(@$_POST['text']);
?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<!--{ Je|Tu|Il } mange des { frites | steacks | glaces }.-->