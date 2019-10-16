<?php

class ImagenRedimensionada{
    private $url;
    private $fileInfo;
    private $image;
    private $ext;
    private $ratio;
    private $preUrl;

    public function __construct($url){
        $this->url = $url;

        $this->fileInfo = getimagesize($url);
        // Sacamos la extensión del archivo
        $explodedurl = explode(".", $url);
        $ext = strtolower($explodedurl[count($explodedurl) - 1]);
        $this->preUrl = $explodedurl[0];
        //echo $this->preUrl.", ".$url;
        if ($ext == "jpeg") $ext = "jpg";
        $this->ext = $ext;

        // Dependiendo de la extensión llamamos a distintas funciones
        switch ($ext) {
            case "jpg":
                $this->image = imagecreatefromjpeg($url);
                break;
            case "png":
                $this->image = imagecreatefrompng($url);
                break;
            case "gif":
                $this->image = imagecreatefromgif($url);
                break;
        }
    }

    public function prepararImagen($width, $height){
        // Obtenemos la relación de aspecto
        $this->ratio = $this->fileInfo[0] / $this->fileInfo[1];
        return imagecreatetruecolor($width, $height);

    }

    public function generarImagen($width, $height, $posx, $posy, $append){
        $thumb = $this->prepararImagen($width, $height);
        // Calculamos las nuevas dimensiones
        $newheight = round($width / $this->ratio);
        $newwidth = round($height * $this->ratio);

        if($this->fileInfo[1]>$this->fileInfo[0]){ //Si la orientacion de la foto es vertical
            // La redimensionamos
            imagecopyresampled($thumb, $this->image, 0, 0, $posx, $posy, $width, $newheight, $this->fileInfo[0], $this->fileInfo[1]);
            //genera imagen jpg en la url definida en el constructor
            imagejpeg($thumb,$this->preUrl.$append.".jpg", 80);

        } elseif($this->fileInfo[0] >= $this->fileInfo[1]){ //Si la orientacion de la foto es horizontal
            // La redimensionamos
            imagecopyresampled($thumb, $this->image, 0, 0, $posx, $posy, $newwidth, $height, $this->fileInfo[0], $this->fileInfo[1]);
            // genera imagen jpg en la url definida en el constructor
            imagejpeg($thumb,$this->preUrl.$append.".jpg", 80);
        }
        return $this->preUrl.$append.".jpg";

    }

}
class ImagenEventoRedimensionada extends ImagenRedimensionada{
    public function generarImagenHome(){
        return $this->generarImagen(389,356,0,200,"home");
    }
    public function generarImagenThumb(){
        return $this->generarImagen(141,200,0,0,"thumb");
    }
}
class ImagenNoticiaRedimensionada extends ImagenRedimensionada{
    public function generarImagenHome(){
        return $this->generarImagen(389,356,0,0,"home");
    }
    public function generarImagenThumb(){
        return $this->generarImagen(141,200,0,0,"thumb");
    }
}

?>
