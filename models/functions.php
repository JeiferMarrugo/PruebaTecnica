<?php

require_once("conectar.php");


function mensaje_alert($tipo, $titulo, $texto)
{
    if ($tipo == 'success') {
        $mensaje = '
        <script>
            $(function() {
              var Toast = Swal.mixin({
                toast: true,
                position: \'top-end\',
                showConfirmButton: false,
                timer: 6000
              });

              Toast.fire({
                icon: \'success\',
                title: \'' . $titulo . '\',
                text: \'' . $texto . '\'
              });
            });
        </script>';
    } elseif ($tipo == 'info') {
        $mensaje = '
        <script>
            $(function() {
              var Toast = Swal.mixin({
                toast: true,
                position: \'top-end\',
                showConfirmButton: false,
                timer: 6000
              });

              Toast.fire({
                icon: \'info\',
                title: \'' . $titulo . '\',
                text: \'' . $texto . '\'
              });
            });
        </script>';
    } elseif ($tipo == 'warning') {
        $mensaje = '
        <script>
            $(function() {
              var Toast = Swal.mixin({
                toast: true,
                position: \'top-end\',
                showConfirmButton: false,
                timer: 6000
              });

              Toast.fire({
                icon: \'warning\',
                title: \'' . $titulo . '\',
                text: \'' . $texto . '\'
              });
            });
        </script>';
    } elseif ($tipo == 'error') {
        $mensaje = '
        <script>
            $(function() {
              var Toast = Swal.mixin({
                toast: true,
                position: \'top-end\',
                showConfirmButton: false,
                timer: 6000
              });

              Toast.fire({
                icon: \'error\',
                title: \'' . $titulo . '\',
                text: \'' . $texto . '\'
              });
            });
        </script>';
    } else {
        $mensaje = 'Error Menssage Function';
    }

    echo $mensaje;
}

