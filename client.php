<html>
    <body>
        <div align='center'></div>
        <form method='POST'>
            <div>
                <div>
                    <label>Adicione a Mensagem</label>
                    <input type="text" name="txtMessage">
                    <input type="submit" name="btnSend" value="Send">
                </div>
                <?php
                    $host="127.0.0.1";
                    $port=20205;

                    if(isset($_POST['btnSend'])){
                        $msg= $_REQUEST['txtMessage'];
                        $sock = socket_create(AF_INET, SOCK_STREAM, 0);
                        socket_connect($sock, $host, $port);

                        socket_write($sock, $msg, strlen($msg));

                        $reply = socket_read($sock, 1924);
                        $reply = trim($reply);
                        $reply = "Servidor diz:\t".$reply;
                    }

                ?>
                <div style="margin-top: 10px;">
                        <textarea rows = '10' cols='30'>
                            <?php echo @$reply; ?>
                        </textarea>
                    
                </div>
                </div>
        </form>
</body>
</html>