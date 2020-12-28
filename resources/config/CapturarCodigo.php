<?php

$idDispositivo = $_GET['id'];

$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
if ($socket === FALSE) {
    echo 'Falha ao criar socket: ' . socket_strerror(socket_last_error()) . "\n";
}

$CDport = 8898;
$sql = "SELECT CDV_IPV4 FROM CONTROL_DEVICE WHERE CDV_ID = $idDispositivo";
$res = mysqli_query($con, $sql);

if ($resultado = mysqli_fetch_assoc($res)) {
    $CDIP = $resultado["CDV_IPV4"];
}


if (!socket_bind($socket, $CDIP, $CDport)) {
    socket_close($socket);
    echo 'Falha ao atribuir parâmetros: ' . socket_strerror(socket_last_error()) . "\n";
}

$from = "";
$buf = '';
$cmdCapturado = '';


while ($buf != "]") {//pq o osvandre gosta desse [] para começar e terminar comandos!
    socket_recvfrom($socket, $buf, 12, 0, $from, $CDport);
    $cmdCapturado .= ',';
    $cmdCapturado .= $buf;
}
?>
