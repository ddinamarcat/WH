<?php
class Evento{
    public $id;
    public $inicio;
    public $fin;
    public $urlImagenHome;
    public $urlThumbnail;
    public $urlAfiche;
    public $titulo;
    public $descripcion;
    public $participantes;
    public $urlInscripcion;
    public $idioma;
    public $precio;
    public $cupos;
    public $organizado;
    public $destacado;
    public $estado;
    public static function generarJsonDeListaDeEventos(){
        include_once('controllers/admin/Administrador.php');
        //include_once('SessionManager.php');
        //$sessionManager = new SessionManager();
        $admin = new Administrador();

        $vista = $admin->getListaEventos();
        $datoslen = count($vista);
        $listaDeEventos = array();
        for($i = 0; $i < $datoslen; $i++){
            $evento = new Evento();
            $et = $vista[$i];
            $evento->id = $et[0];
            $evento->inicio = $et[1];
            $evento->fin = $et[2];
            $evento->urlImagenHome = $et[3];
            $evento->urlThumbnail = $et[4];
            $evento->urlAfiche = $et[5];
            $evento->titulo = $et[6];
            $evento->descripcion = $et[7];
            $evento->participantes = $et[8];
            $evento->urlInscripcion = $et[9];
            $evento->idioma = $et[10];
            $evento->precio = $et[11];
            $evento->cupos = $et[12];
            $evento->organizado = $et[13];
            $evento->destacado = $et[14];
            $evento->lugar = $et[15];
            $evento->estado = $et[16];
            $listaDeEventos[] = $evento;
        }
        return json_encode($listaDeEventos, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    }
}
//$jsonListaDeEventos = Evento::generarJsonDeListaDeEventos();
//    var x = JSON.parse('<?php echo $jsonListaDeEventos; >');
?>
