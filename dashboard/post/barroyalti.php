<?php

if(isset($_POST['semester'])){
    $semester = $_POST['semester'];
    $tahunSatu = $_POST['tahunsatu'];
    $tahunDua = $_POST['tahundua'];

    echo "
        <script>
            var semester = '" . $semester . "';
            var tahunSatu = '" . $tahunSatu . "';
            var tahunDua = '" . $tahunDua . "';
            
            var url = '../?1aS=' + semester + '&2aS=' + tahunSatu + '&3aS=' + tahunDua;
            window.location.href = url;
        </script>
    ";
}

?>