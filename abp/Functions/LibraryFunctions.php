<?php
//LIBRERIA DE FUNCIONES


//Funciones para la creación automática de formulario a partir de array

  //Versión que tiene en cuenta el rol
function createForm2($listFields, $fieldsDef, $strings, $values, $required, $noedit, $rol) {
    foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
        for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
            //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
            if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                switch ($fieldsDef[$i]['type']) {
                    case 'text':
                        if (isset($fieldsDef[$i]['texto'])) {
                            $str = "\t" . $strings[$fieldsDef[$i]['texto']];
                        } else {
                            $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        }
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (!isset($required[$field])) {
                                $str .= 'required';
                            } else {
                                $str .= '';
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'date':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'email':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'search':
                        break;
                    case 'url': //las url muestran enlace en otra pestaña
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                        $str .= " <br>\n";
                        echo $str;
                        break;
                    case 'tel':
                        break;
                    case 'password':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'number':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'checkbox':
                        $str = "\t" . $fieldsDef[$i]['value'];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $rolActual = consultarRol($_SESSION['login']);
                        $func = consultarFuncionalidadesRol($rolActual);
                        if ($rol === $rolActual && in_array($field, $func)) { //No se permite quitar funcionalidades a su propio rol
                            $str .= ' checked ';
                            $str .= ' onclick="javascript: return false;" ';
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                    case 'radio':
                        break;
                    case 'file':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ><br>\n";
                        echo $str;
                        break;
                        ;
                    case 'select':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']] . ": <select name='" . $fieldsDef[$i]['name'] . "'";
                        if ($noedit || $noedit[$field]) {
                            $str .= ' readonly ';
                        }
                        if ($fieldsDef[$i]['multiple'] == 'true') {
                            $str = $str . " multiple ";
                        }
                        $str = $str . " >";
                        foreach ($fieldsDef[$i]['options'] as $value) {
                            $str1 = "<option value = '" . $value . "'";
                            if (isset($values[$fieldsDef[$i]['name']])) {
                                if ($values[$fieldsDef[$i]['name']] == $value) {
                                    $str1 .= " selected ";
                                }
                            }
                            $str1 .= ">" . $value . "</option>";
                            $str = $str . $str1;
                        }
                        $str = $str . "</select><br>\n";
                        echo $str;
                        break;
                    case 'textarea':
                        break;
                    default:
                } //search, url, tel, email, password, date pickers, number, checkbox, radio y file
            }
        }
    }
}
    //version que tiene en cuenta las paginas
function createForm3($listFields, $fieldsDef, $strings, $values, $required, $noedit, $pags) {
    foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
        for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
            //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
            if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                switch ($fieldsDef[$i]['type']) {
                    case 'text':
                        if (isset($fieldsDef[$i]['texto'])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['texto']] . "</label>";
                        } else {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . ":</label>";
                        }
                        $str .= "  <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " id = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                $str .= 'required';
                            } else {
                                $str .= '';
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'date':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ><br>";
                        echo $str;
                        break;
                    case 'email':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ></li>";
                        echo $str;
                        break;
                    case 'search':
                        break;
                    case 'url':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                        $str .= " </li>";
                        echo $str;
                        break;
                    case 'tel':
                        break;
                    case 'password':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>\n";
                        echo $str;
                        break;
                    case 'number':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>\n";
                        echo $str;
                        break;
                    case 'checkbox':
                        $str = "<li>" . $fieldsDef[$i]['value'];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        if (in_array($field, $pags)) {
                            $str .= ' checked ';
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'radio':
                        break;
                    case 'file':
                        $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                        $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                        ;
                    case 'select':
                        $str = "\t" . $strings[$fieldsDef[$i]['name']] . ": <select name='" . $fieldsDef[$i]['name'] . "'";
                        if ($noedit || $noedit[$field]) {
                            $str .= ' readonly ';
                        }
                        if ($fieldsDef[$i]['multiple'] == 'true') {
                            $str = $str . " multiple ";
                        }
                        $str = $str . " >";
                        foreach ($fieldsDef[$i]['options'] as $value) {
                            $str1 = "<option value = '" . $value . "'";
                            if (isset($values[$fieldsDef[$i]['name']])) {
                                if ($values[$fieldsDef[$i]['name']] == $value) {
                                    $str1 .= " selected ";
                                }
                            }
                            $str1 .= ">" . $value . "</option>";
                            $str = $str . $str1;
                        }
                        $str = $str . "</select></li>";
                        echo $str;
                        break;
                    case 'textarea':
                        break;
                    default:
                }
            }
        }
    }
}
  //versión genérca
function createForm($listFields, $fieldsDef, $strings, $values, $required, $noedit) {
    foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
        for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
            //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
            if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                switch ($fieldsDef[$i]['type']) {
                    case 'text':
                        if (isset($fieldsDef[$i]['texto'])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['texto']] . "</label>";
                        } else {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        }
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " id = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (!isset($required[$field])) {
                                $str .= 'required';
                            } else {
                                $str .= '';
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'date':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }

                        echo $str;
                        break;
                    case 'email':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= '';
                                } else {
                                    $str -= ' required  ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }


                        echo $str;
                        break;
                    case 'search':
                        break;
                    case 'url':
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                            $str .= "<a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                            $str .= " <br>\n";
                            echo $str;
                        }
                        break;
                    case 'time':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ></li>";
                        echo $str;
                        break;

                    case 'datetime-local':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }

                        $str .= "" . " ></li>";
                        echo $str;
                        break;

                    case 'password':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= "required" . " ></li>";
                        echo $str;
                        break;
                    case 'number':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                        $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'checkbox':
                        if (isset($strings[$fieldsDef[$i]['value']])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['value']] . "</label>";
                        } else {
                            $str = "<li><label>" . $fieldsDef[$i]['value'] . "</label>";
                        }
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                    case 'radio':
                        break;
                    case 'file':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        $str .= "<input type = '" . $fieldsDef[$i]['type'] . "'";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                        } else {
                            $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                        }
                        if ($fieldsDef[$i]['pattern'] <> '') {
                            $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                        }
                        if ($fieldsDef[$i]['validation'] <> '') {
                            $str .= " " . $fieldsDef[$i]['validation'];
                        }
                        if (is_bool($required)) {
                            if (!$required) {
                                $str .= ' ';
                            } else {
                                $str .= ' required ';
                            }
                        } else {
                            if (isset($required[$field])) {
                                if (!$required[$field]) {
                                    $str .= ' ';
                                } else {
                                    $str -= ' required ';
                                }
                            }
                        }
                        if (is_bool($noedit)) {
                            if ($noedit) {
                                $str .= ' readonly ';
                            }
                        } else {
                            if (isset($noedit[$field])) {
                                if ($noedit[$field]) {
                                    $str .= ' readonly ';
                                }
                            }
                        }
                        $str .= " ></li>";
                        echo $str;
                        break;
                        ;
                    case 'select':
                        $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>" . "<select name='" . $fieldsDef[$i]['name'] . "'";
                        if ($noedit || $noedit[$field]) {
                            $str .= ' readonly ';
                        }
                        if ($fieldsDef[$i]['multiple'] == 'true') {
                            $str = $str . " multiple ";
                        }
                        $str = $str . " >";
                        foreach ($fieldsDef[$i]['options'] as $value) {
                            $str1 = "<option value = '" . $value . "'";
                            if (isset($values[$fieldsDef[$i]['name']])) {
                                if ($values[$fieldsDef[$i]['name']] == $value) {
                                    $str1 .= " selected ";
                                }
                            }
                            $str1 .= ">" . $value . "</option>";
                            $str = $str . $str1;
                        }
                        $str = $str . "</select></li>";
                        echo $str;
                        break;
                    case 'textarea':
                         if (isset($fieldsDef[$i]['texto'])) {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        } else {
                            $str = "<li><label>" . $strings[$fieldsDef[$i]['name']] . "</label>";
                        }
                        $str .= "<" . $fieldsDef[$i]['type'] . "";
                        $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                        $str .= " rows = '" . $fieldsDef[$i]['rows'] . "'";
                        $str .= " cols = '" . $fieldsDef[$i]['cols'] . "'";
                        if (isset($values[$fieldsDef[$i]['name']])) {
                            $str .= " >" . $values[$fieldsDef[$i]['name']] . "";
                        }else {
                             $str .= " >";
                        }
                        $str .= " </textarea>";
                        echo $str;
                        break;
                    default:
                }
            }
        }
    }
}
 //Evalúa si el usuario se ha autenticado
function IsAuthenticated() {
    session_start();
    if (!isset($_SESSION['login'])) {
        return false;
    } else {
        return true;
    }
}



//Añade al array los nombre de las paginas disponibles
function AñadirPaginasTitulos($array) {
    $mysqli = new mysqli("localhost", "ET3Grupo2", "ET3Grupo2", "ET3Grupo2");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT PAGINA_NOM from PAGINA';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        array_push($array, $tipo['PAGINA_NOM']);
    }
    return $array;
}

//Añade al formulario de definicion las entradas correspondientes a las paginas disponibles
function AñadirPaginas($array) {
    $mysqli = new mysqli("localhost", "ET3Grupo2", "ET3Grupo2", "ET3Grupo2");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = 'SELECT PAGINA_NOM from PAGINA';
    $result = $mysqli->query($sql);
    while ($tipo = $result->fetch_array()) {
        $array[count($array)] = array(
            'type' => 'checkbox',
            'name' => 'funcionalidad_paginas[]',
            'value' => $tipo['PAGINA_NOM'],
            'size' => 20,
            'required' => true,
            'pattern' => '',
            'validation' => '',
            'readonly' => false);
    }
    return $array;
}

//Genera un link para la página a partir de un nombre
function GenerarLinkPagina($PAGINA_NOM) {
    $link = str_replace(" ", "_", $PAGINA_NOM);
    $s = '../Views/';
    $s .= $link;
    $s .= '_Vista.php';
    return $s;
}

/*
//Genera el link de un controlador a partir del nombre de la funcionalidad
function GenerarLinkControlador($CON_NOM) {
    $link = str_replace(" ", "_", $CON_NOM);
    $s = '../Controllers/';
    $s .= $link;
    $s .= '_Controller.php';
    return $s;
}
*/

//Devuelve el nombre de una funcionalidad a partir de su id
function ConsultarNombreFuncionalidad($idFuncionalidad) {
    $mysqli = new mysqli("localhost", "root", "", "gymgest");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT nombreFuncionalidad FROM FUNCIONALIDAD WHERE idFuncionalidad='" . $idFuncionalidad . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['nombreFuncionalidad'];
}
//Devuelve el nombre de una funcionalidad a partir de su id
function ConsultarIDRol($nombreRol) {
    $mysqli = new mysqli("localhost", "root", "", "gymgest");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT idRol FROM ROL WHERE nombreRol='" . $nombreRol . "'";
    $result = $mysqli->query($sql)->fetch_array();
    return $result['idRol'];
}


//añade a la pagina default los enlaces correspondientes a las funcionalidades
function añadirFuncionalidades($NOM) {
    include '../Locates/Strings_' . $NOM['IDIOMA'] . '.php';
    $mysqli = new mysqli("localhost", "root", "", "gymgest");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $rol = "SELECT tipoUsuario FROM USUARIO  WHERE userName='" . $NOM['login'] . "'";
    $sql = "SELECT idFuncionalidad, idRol FROM Funcionalidad_Rol WHERE idRol=(" . $rol . ")";
    if (!($resultado = $mysqli->query($sql))) {
        echo 'Error en la consulta sobre la base de datos';
    } else {
        while ($fila = $resultado->fetch_array()) {
            $funcionalidad = ConsultarNombreFuncionalidad($fila['idFuncionalidad']);
            switch ($funcionalidad) {;
                            case "GESTION FUNCIONALIDADES":
                                ?><li><span><a style="font-size:20px;" href='../Controllers/FUNCIONALIDAD_Controller.php'><?php echo $strings['Gestión de Funcionalidades'] ?></a></span></li> <?php
                                break;
                            case "GESTION PAGINAS":
							 ?><li><span><a style="font-size:20px;" href='../Controllers/PAGINA_Controller.php'><?php echo $strings['Gestión de Páginas'] ?></a></span></li> <?php
                                 break;
                            case "GESTION ROLES":
							 ?><li><span><a style="font-size:20px;" href='../Controllers/ROL_Controller.php'><?php echo $strings['Gestión de Roles'] ?></a></span></li> <?php
                                break;
                            case "GESTION ENTRENADORES":
							 ?><li><span><a style="font-size:20px;" href='../Controllers/USUARIOS_Controller.php'><?php echo $strings['Gestión de Entrenadores'] ?></a></span></li> <?php
                                break;
                            case "GESTION DEPORTISTAS":
							 ?><li><span><a style="font-size:20px;" href='../Controllers/USUARIOS_Controller.php'><?php echo $strings['Gestión de Deportistas'] ?></a></span></li> <?php
                                break;
                            case "GESTION aCTIVIDADES GRUPALES":
							 ?><li><span><a style="font-size:20px;" href='../Controllers/ACTIVIDADGRUPAL_Controller.php'><?php echo $strings['Gestión de Actividades Grupales'] ?></a></span></li> <?php
                               break;
                            case "GESTION INSTALACIONES":
							 ?><li><span><a style="font-size:20px;" href='../Controllers/INSTALACION_Controller.php'><?php echo $strings['Gestión de Instalaciones'] ?></a></span></li> <?php
                                break;

                            default:
						break;
                        }
                    }
                }
            }

//Genera los includes correspondientes a las paginas a las que se tiene acceso
function generarIncludes() {
                $toret = array();
                $mysqli = new mysqli("localhost", "root", "", "gymgest");
                if ($mysqli->connect_errno) {
                    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                $sql = "SELECT DISTINCT PAGINA.linkPagina FROM USUARIO_PAGINA, PAGINA  WHERE PAGINA.idPagina=USUARIO_PAGINA.idPagina AND USUARIO_PAGINA.username='" . $_SESSION['login'] . "'";
                if (!($resultado = $mysqli->query($sql))) {
                    echo 'Error en la consulta sobre la base de datos';
                } else {
                    while ($tupla = $resultado->fetch_array()) {
                        array_push($toret, $tupla['linkPagina']);
                    }
                }
                return $toret;
            }

//incluye select
function createForm4($listFields, $fieldsDef, $strings, $values, $required, $noedit) {
                foreach ($listFields as $field) { //miro todos los campos que me piden en su orden
                    for ($i = 0; $i < count($fieldsDef); $i++) { //recorro todos los campos de la definición de formulario para encontrarlo
                        //echo $field . ':' . $fieldsDef[$i]['required'] . '<br>';
                        if ($field == $fieldsDef[$i]['name'] || $field == $fieldsDef[$i]['value']) { //si es el que busco
                            switch ($fieldsDef[$i]['type']) {
                                case 'text':
                                    if (isset($fieldsDef[$i]['texto'])) {
                                        $str = "<li>" . $strings[$fieldsDef[$i]['texto']];
                                    } else {
                                        $str = "\t" . $strings[$fieldsDef[$i]['name']];
                                    }
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " id = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            $str .= 'required';
                                        } else {
                                            $str .= '';
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                case 'date':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                                    $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . ($values[$fieldsDef[$i]['name']]) . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= "required" . " ></li>";
                                    echo $str;
                                    break;
                                case 'email':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= "required" . " ></li>";
                                    echo $str;
                                    break;
                                case 'search':
                                    break;
                                case 'url':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <a target='_blank' href='" . $values[$fieldsDef[$i]['name']] . "'>Ver</a>";
                                    $str .= " </li>";
                                    echo $str;
                                    break;
                                case 'tel':
                                    break;
                                case 'password':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                case 'number':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " min = '" . $fieldsDef[$i]['min'] . "'";
                                    $str .= " max = '" . $fieldsDef[$i]['max'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                case 'checkbox':
                                    $str = "<li>" . $fieldsDef[$i]['value'];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    $str .= " size = '" . $fieldsDef[$i]['size'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ><br>\n";
                                    echo $str;
                                    break;
                                case 'radio':
                                    break;
                                case 'file':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']];
                                    $str .= " : <input type = '" . $fieldsDef[$i]['type'] . "'";
                                    $str .= " name = '" . $fieldsDef[$i]['name'] . "'";
                                    if (isset($values[$fieldsDef[$i]['name']])) {
                                        $str .= " value = '" . $values[$fieldsDef[$i]['name']] . "'";
                                    } else {
                                        $str .= " value = '" . $fieldsDef[$i]['value'] . "'";
                                    }
                                    if ($fieldsDef[$i]['pattern'] <> '') {
                                        $str .= " pattern = '" . $fieldsDef[$i]['pattern'] . "'";
                                    }
                                    if ($fieldsDef[$i]['validation'] <> '') {
                                        $str .= " " . $fieldsDef[$i]['validation'];
                                    }
                                    if (is_bool($required)) {
                                        if (!$required) {
                                            $str .= ' ';
                                        } else {
                                            $str .= ' required ';
                                        }
                                    } else {
                                        if (isset($required[$field])) {
                                            if (!$required[$field]) {
                                                $str .= ' ';
                                            } else {
                                                $str -= ' required ';
                                            }
                                        }
                                    }
                                    if (is_bool($noedit)) {
                                        if ($noedit) {
                                            $str .= ' readonly ';
                                        }
                                    } else {
                                        if (isset($noedit[$field])) {
                                            if ($noedit[$field]) {
                                                $str .= ' readonly ';
                                            }
                                        }
                                    }
                                    $str .= " ></li>";
                                    echo $str;
                                    break;
                                    ;
                                case 'select':
                                    $str = "<li>" . $strings[$fieldsDef[$i]['name']] . ": <select name='" . $fieldsDef[$i]['name'] . "'";
                                    if ($noedit || $noedit[$field]) {
                                        $str .= ' readonly ';
                                    }
                                    if ($fieldsDef[$i]['multiple'] == 'true') {
                                        $str = $str . " multiple ";
                                    }
                                    $str = $str . " >";
                                    foreach ($fieldsDef[$i]['options'] as $value) {
                                        $str1 = "<option value = '" . $value . "'";
                                        if (isset($values[$fieldsDef[$i]['name']])) {
                                            if ($values[$fieldsDef[$i]['name']] == $value) {
                                                $str1 .= " selected ";
                                            }
                                        }
                                        $str1 .= ">" . $value . "</option>";
                                        $str = $str . $str1;
                                    }
                                    $str = $str . "</select></li>";
                                    echo $str;
                                    break;
                                case 'textarea':
                                    break;
                                default:
                            }
                        }
                    }
                }
            }

			
			
			
			
			
			
			
			
			
			
			
			
function añadirFuncionalidadesNoLogin() {
   include '../Locates/Strings_Castellano.php';
                             //"GESTION INSTALACIONES":
				                    ?><li><span><a style="font-size:20px;" href='../Controllers/INSTALACIONES_Controller.php'><?php echo $strings['Gestión de Instalaciones'] ?></a></span></li><?php
				                   // break;
                             //"GESTION ACTIVIDADES GRUPALES":
                                    ?><li><span><a style="font-size:20px;" href='../Controllers/ACTIVIDADESGRUPALES_Controller.php'><?php echo $strings['Gestión de Actividades Grupales'] ?></a></span></li><?php
                                   // break;
                        }
                        
            ?>

