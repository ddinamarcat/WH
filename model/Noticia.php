<?php
class Noticia{
    public $id;
    public $titulo;
    public $descripcion;
    public $idUsuario;
    public $fechaPublicacion;
    public $urlImagenHome;
    public $urlThumbnail;
    public $urlAfiche;
    public $destacado;
    public $estado;
    public static function generarJsonDeListaDeNoticias(){
        include_once('controllers/admin/Administrador.php');
        //include_once('SessionManager.php');
        //$sessionManager = new SessionManager();
        $admin = new Administrador();

        $vista = $admin -> getListaNoticias();
        $datoslen = count($vista);
        $listaDeNoticias = array();
        for($i = 0; $i < $datoslen; $i++){
            $noticia = new Noticia();
            $nt = $vista[$i];
            $noticia->id = $nt[0];
            $noticia->titulo = $nt[1];
            $noticia->descripcion = $nt[2];
            $noticia->idUsuario = $nt[3];
            $noticia->fechaPublicacion = $nt[4];
            $noticia->urlImagenHome = $nt[5];
            $noticia->urlThumbnail = $nt[6];
            $noticia->urlAfiche = $nt[7];
            $noticia->destacado = $nt[8];
            $noticia->estado = $nt[9];
            $listaDeNoticias[] = $noticia;
        }
        return json_encode($listaDeNoticias, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

    }
}
//$jsonListaDeEventos = Evento::generarJsonDeListaDeEventos();
//    var x = JSON.parse('<?php echo $jsonListaDeEventos; >');
?>
