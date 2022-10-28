<?php

echo "
    <form method='get' action='index.php'>
        <table class='table table-hover'>
            <tr>
                <td>Nome</td>
                <td><input type='text' name='nome' class='form-control'></td>
                <td>Cognome</td>
                <td><input type='text' name='cognome' class='form-control'></td>
                <td>Telefono</td>
                <td><input type='text' name='telefono' class='form-control'></td>
            </tr>
            <tr>
                <td>Sesso</td>
                <td>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <div class='input-group-text'>
                                <input type='radio' id='sessoF' name='sesso' value='F'>F
                                <input type='radio' id='sessoM' name='sesso' value='M'>M
                            </div>
                        </div>
                    </div>
                </td>
                <td colspan='2'>
                    <div class='input-group mb-3'>
                        <div class='input-group-prepend'>
                            <label class='input-group-text' for='inputGroupSelect01'>Gruppi</label>
                        </div>
                        <select name = 'idgruppo'>
                            <option value=-1>All</option>";
                            foreach ($righeGruppo as $riga){
                                echo "<option value=".$riga['ID'].">".$riga['NOME']."</option>";
                            }
echo "
                        </select>
                    </div>
                </td>
                <td colspan='2'>
                    <input type='hidden' name='action' value='confermanuovo'>
                    <input type='submit' value='OK' class='btn btn-primary'>
                </td>
            </tr>
        </table>
    </form>
";

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
        echo "<A HREF='viewListeContatto.php?oper=UPD&id=".$riga[0]."'>UPD</a>";
        echo "</td>";
        echo "<td>";
        echo "<A HREF='index.php?action=del&id=".$riga[0]."'>DEL</a>";
        echo "</td>";
        echo "</tr>";
    }
    ECHO "</TABLE>";
}
