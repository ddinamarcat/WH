<?php
class Suscriptor{
    public $id;
    public $email;
    public static function generarJsonDeListaDeNoticias(){
        include_once('controllers/admin/Administrador.php');
        //include_once('SessionManager.php');
        //$sessionManager = new SessionManager();
        $admin = new Administrador();

        $vista = $admin->getListaSuscriptores();
        $datoslen = count($vista);
        $listaDeSuscriptores = array();
        for($i = 0; $i < $datoslen; $i++){
            $suscriptor = new Suscriptor();
            $nt = $vista[$i];
            $suscriptor->id = $nt[0];
            $suscriptor->email = $nt[1];
            $listaDeSuscriptores[] = $suscriptor;
        }
        return json_encode($listaDeNoticias, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    }
}
//$jsonListaDeEventos = Evento::generarJsonDeListaDeEventos();
//    var x = JSON.parse('<?php echo $jsonListaDeEventos; >');
?>
