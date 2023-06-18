<?php
$host = "127.0.0.1";
$port = 20205;
set_time_limit(0);

$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("Nao foi possivel criar o socket\n");
$result = socket_bind($sock, $host, $port) or die("Nao foi possivel vincular ao socket\n");

$result = socket_listen($sock, 3) or die("Nao foi possivel setar o socket para escutar\n");
echo "Ouvindo conexoes\n";

class Chat
{
    function readline(){
        return rtrim(fgets(STDIN));
    }
}

    do{
        $accept = socket_accept($sock) or die("Nao foi possivel aceitar a conexao de entrada.");
        $msg = socket_read($accept, 1024) or die("Nao foi possivel ler a entrada");

        $msg = trim($msg);
        echo "\nClient diz:$msg\n";

        $line = new chat();
        echo "Adicione resposta:";
        $reply = $line->readline();

        socket_write($accept, $reply, strlen($reply)) or die("Nao foi possivel escrever a saida\n");
   
    } while(true);

    socket_close($accept, $sock);
?>