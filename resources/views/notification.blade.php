<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CREDENCIAMENTO VIA WEB</title>
</head>
<body>
    <div class="container text-center m-1">
        <h1 class="lead mt-3">DADOS DO CREDENCIAMENTO FEITO NO SITE </h1>
        <?php 
        foreach ($_POST  as $k=>$v) {
           if ($k!="_token" and $k!="Send_mail") {
             echo "<p><b>".strtoupper($k)."</b>:".strtoupper($v)."</p>";
           }
        }
        echo "<hr>";
        echo "Gerado em ".date("d/m/Y - H:i:s");
        ?>
    </div>
</body>
</html>