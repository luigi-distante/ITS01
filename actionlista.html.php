<?php
echo "<form action='index.php' method='get'>";
echo "<table class='table table-hover'>";
echo "<tr>";
echo "<td>";
    echo "<div class='input-group mb-3'>
            <div class='input-group-prepend'>
                <label class='input-group-text' for='inputGroupSelect01'>Gruppi</label>
            </div>";
    echo "<select name = 'idgruppo'>";
    echo "<option value=-1>All</option>";
    foreach ($righeGruppo as $riga){
        echo "<option value=".$riga['ID'].">".$riga['NOME']."</option>";
    }
    echo "</select>";
echo "</td>";
echo "<td>";
if (isset($_SESSION['filtro'])){
        $filtro = $_SESSION['filtro'];
        echo "Nome      <input type='text' name='nome' class='form-control' value=".$filtro->nome.">";
        echo "Cognome   <input type='text' name='cognome' class='form-control' value=".$filtro->cognome.">";
    }else{
        echo "Nome      <input type='text'  class='form-control' name='nome' >";
        echo "Cognome   <input type='text'  class='form-control' name='cognome' >";
    }
    echo "<input type='submit' value='Lista' class='btn btn-success'>";
    echo "<input type='hidden' name='action' value='listaContattiXidgruppo'>";
echo "</td>";
echo "</tr>";
echo "</form>";
/*
        <table class='table table-hover'>
            <tr>
                <td>Nome</td>
                <td><input type='text' name='nome' class='form-control'></td>
                <td>Cognome</td>
                <td><input type='text' name='cognome' class='form-control'></td>
                <td>Telefono</td>
                <td><input type='text' name='telefono' class='form-control'></td>
            </tr>
 
 */
if (isset($_GET['action']) && $_GET['action'] == 'upd'){

    echo "
        <form method='get' action='index.php'>
            Nome <input type='text' name='nome' value='".$rigaContatto['NOME']."'>
            Cognome <input type='text' name='cognome' value='".$rigaContatto['COGNOME']."'>
            Telefono <input type='text' name='telefono' value='".$rigaContatto['TELEFONO']."'>
            Sesso ";
            if ($rigaContatto['SESSO'] == 'M'){
                echo "<input type='radio' id='sessoM' name='sesso' value='M' checked='checked'/>";
            }else{
                echo "<input type='radio' id='sessoM' name='sesso' value='M' />";
            }
            echo "<label for='sessoM'>M</label>";
            if ($rigaContatto['SESSO'] == 'F'){
                echo "<input type='radio' id='sessoF' name='sesso' value='F' checked='checked'/>";
            }else{
                echo "<input type='radio' id='sessoF' name='sesso' value='F' />";
            }
            echo "<label for='sessoF'>F</label>";
    echo "
            Gruppo <select name='idgruppo'>;
            ";
            foreach ($righeGruppo as $riga){
                if ($riga['ID'] == $rigaContatto['IDGRUPPO']){
                    echo "<option selected value=".$riga['ID'].">".$riga['NOME']."</option>";
                }else{
                    echo "<option value=".$riga['ID'].">".$riga['NOME']."</option>";
                }                                        
            }
            echo    "</select>";
            echo "<input type='hidden' name='id' value='".$rigaContatto['ID']."'>";
            echo "<input type='hidden' name='action' value='confermaupd'>";
            echo "<input type='submit' value='OK'>";
        echo "</form>";

}

if (isset($righe)){
    ECHO "<TABLE BORDER=1 ALIGN=CENTER width='100%' class='w3-table-all w3-large'>";
        echo "<tr>";
        echo "<td>";
        echo 'NOME';
        echo "</td>";
        echo "<td>";
        echo 'COGNOME';
        echo "</td>";
        echo "<td>";
        echo 'SESSO';
        echo "</td>";
        echo "<td>";
        echo 'TELEFONO';
        echo "</td>";
        echo "<td>";
        echo 'GRUPPO';
        echo "</td>";
        echo "<td COLSPAN='2'>";
        echo 'OPERAZIONI';
        echo "</td>";
        echo "</tr>";
    foreach ($righe as $riga){  //per ogni elemento dell'array $righe che chiamerò $riga

        echo "<tr>";
        echo "<td>";                               
        echo $riga[1];
        echo "</td>";
        echo "<td>";
        echo $riga[2];
        echo "</td>";
        echo "<td>";
        echo $riga[4];
        echo "</td>";
        echo "<td>";
        echo $riga[3];
        echo "</td>";
        echo "<td>";
        echo $riga[7];
        echo "</td>";
        echo "<td>";
        echo "<A HREF='index.php?action=upd&id=".$riga[0]."'>UPD</a>";
        echo "</td>";
        echo "<td>";
        echo "<A HREF='index.php?action=del&id=".$riga[0]."'>DEL</a>";
        echo "</td>";
        echo "</tr>";
    }
    ECHO "</TABLE>";
}
