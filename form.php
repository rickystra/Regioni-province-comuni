<?php
include_once('config/config.php');
include_once('class/data.class.php');

$mysqli = new data(HOST, USERNAME, PASSWORD, DATABASE);
$regioni = $mysqli->getRegioni();
?>
<!doctype html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Untitled Document</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/italia.js"></script>
    </head>

    <body>
    <form>
    	<p><label for="regione">Regione</label>
        <select name="regione" id="regione" class="dinamiche">
        	<option value="">Seleziona...</option>
        	<?php foreach($regioni as $val): ?>
            <option value="<?php echo $val['cod_regione']; ?>"><?php echo $val['regione']; ?></option>
            <?php endforeach; ?>
        </select></p>
        <p><label for="provincia">Provincia</label>
        <select name="provincia" id="provincia" class="dinamiche">
        	<option value="">Seleziona...</option>
        </select></p>
        <p><label for="comune">Comune</label>
        <select name="comune" id="comune">
        	<option value="">Seleziona...</option>
        </select></p>
        <p><label for="cap">Cap</label><input type="text" name="cap" id="cap" readonly="readonly"/></p>
    </form>
    </body>
</html>
