<?php
class UsuarioModel{
    public $id;
    public $user;
    public $email;
    public $nombre;
    public $apellido;
    public $tipo;
    public $urlImagen;

    public static function generarJsonDeListaDeUsuarios(){
        include_once('controllers/admin/Administrador.php');
        //include_once('SessionManager.php');
        //$sessionManager = new SessionManager();
        $admin = new Administrador();

        $vista = $admin->getListaUsuarios();
        $datoslen = count($vista);
        $listaDeEventos = array();
        for($i = 0; $i < $datoslen; $i++){
            $usuario = new UsuarioModel();
            $et = $vista[$i];
            $evento->id = $et[0];
            $evento->user = $et[1];
            $evento->email = $et[2];
            $evento->nombre = $et[3];
            $evento->apellido = $et[4];
            $evento->tipo = $et[5];
            $evento->urlImagen = $et[6];
            $listaDeUsuarios[] = $usuario;
        }
        return json_encode($listaDeUsuarios, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    }
}
//$jsonListaDeEventos = Evento::generarJsonDeListaDeEventos();
//    var x = JSON.parse('<?php echo $jsonListaDeEventos; >');
?>
