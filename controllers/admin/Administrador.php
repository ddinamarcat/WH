<?php
class Administrador extends Usuario{
    public function __construct(){
        $this->bdd = $this->conectar();
	}

    public function getListaUsuarios(){
        global $namedb;
		if($this->bdd->conectar()){
			$sql = "SELECT idusuario, user, email, nombre, apellido, tipo, url_imagen FROM ".$namedb.".usuarios";
			$tdp = null;
			$parametros = null;
			$campos = array('idusuario', 'user', 'email', 'nombre', 'apellido', 'tipo', 'url_imagen');
			$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0],$campos[1],$campos[2],$campos[3],$campos[4], $campos[5], $campos[6]);
			if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
		}
    }

    public function getListaEventos(){
        global $namedb;
		if($this->bdd->conectar()){
			$sql = "SELECT idevento, inicio, fin, urlimagenhome, urlthumbnail, urlafiche, titulo, descripcion, participantes, urlinscripcion, idioma, precio, cupos, organizado, destacado, lugar, estado  FROM ".$namedb.".vista_eventos";
			$tdp = null;
			$parametros = null;
			$campos = array('idevento', 'inicio', 'fin', 'urlimagenhome', 'urlthumbnail', 'urlafiche', 'titulo', 'descripcion', 'participantes', 'urlinscripcion', 'idioma', 'precio', 'cupos', 'organizado','destacado','lugar','estado');
			$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0],$campos[1],$campos[2],$campos[3],$campos[4], $campos[5], $campos[6], $campos[7], $campos[8], $campos[9], $campos[10], $campos[11], $campos[12], $campos[13], $campos[14], $campos[15], $campos[16]);
			if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
		}
	}
    public function getEvento($id){
        global $namedb;
		if($this->bdd->conectar()){
			$sql = "SELECT idevento, inicio, fin, urlimagenhome, urlthumbnail, urlafiche, titulo, descripcion, participantes, urlinscripcion, idioma, precio, cupos, organizado, destacado, lugar, estado FROM ".$namedb.".vista_eventos WHERE idevento=? ;";
			$tdp = "i";
			$parametros = array($id);
			$campos = array('idevento', 'inicio', 'fin', 'urlimagenhome', 'urlthumbnail', 'urlafiche', 'titulo', 'descripcion', 'participantes', 'urlinscripcion', 'idioma', 'precio', 'cupos', 'organizado','destacado','lugar','estado');
			$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0],$campos[1],$campos[2],$campos[3],$campos[4], $campos[5], $campos[6], $campos[7], $campos[8], $campos[9], $campos[10], $campos[11], $campos[12], $campos[13], $campos[14], $campos[15], $campos[16]);
			if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
		}
	}
    public function borrarEvento($id){
        global $namedb;
		if($this->bdd->conectar()){
			$tdp = "i";
			$parametros = array($id);
			$campos = null;
			$r = $this->bdd->eliminar("eventos",$parametros,"idevento=?",$tdp);
			if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
		}
	}
    public function borrarNoticia($id){
        global $namedb;
		if($this->bdd->conectar()){
			$tdp = "i";
			$parametros = array($id);
			$campos = null;
			$r = $this->bdd->eliminar("noticias",$parametros,"idnoticia=?",$tdp);
			if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
		}
	}
    public function getNoticia($id){
        global $namedb;
		if($this->bdd->conectar()){
			$sql = "SELECT idnoticia, titulo, descripcion, idusuario, fechapublicacion, urlimagenhome, urlthumbnail, urlafiche, destacado, estado FROM ".$namedb.".vista_noticias WHERE idnoticia=? ;";
			$tdp = "i";
			$parametros = array($id);
			$campos = array('idnoticia', 'titulo', 'descripcion', 'idusuario', 'fechapublicacion', 'urlimagenhome', 'urlthumbnail', 'urlafiche', 'destacado', 'estado');
			$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0],$campos[1],$campos[2],$campos[3],$campos[4], $campos[5], $campos[6], $campos[7], $campos[8], $campos[9]);
			if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
		}
	}
    public function getListaNoticias(){
        global $namedb;
        if($this->bdd->conectar()){
            $sql = "SELECT idnoticia, titulo, descripcion, idusuario, fechapublicacion, urlimagenhome, urlthumbnail, urlafiche, destacado, estado FROM ".$namedb.".vista_noticias";

            $tdp = null;
            $parametros = null;
            $campos = array('idnoticia', 'titulo', 'descripcion', 'idusuario', 'fechapublicacion', 'urlimagenhome', 'urlthumbnail', 'urlafiche', 'destacado', 'estado');
            $r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0],$campos[1],$campos[2],$campos[3],$campos[4], $campos[5], $campos[6], $campos[7], $campos[8], $campos[9]);
            if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
        }
    }
    public function getListaSuscriptores(){
        global $namedb;
        if($this->bdd->conectar()){
            $sql = "SELECT idsuscriptor, email FROM ".$namedb.".suscriptores";

            $tdp = null;
            $parametros = null;
            $campos = array('idsuscriptor', 'email');
            $r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0],$campos[1]);
            if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
        }
    }
    public function insertarSuscriptor($valores){
        global $namedb;
        if($this->bdd->conectar()){
            $tdp = "s";
            $parametros = null;
            $campos = array('email');
            $r = $this->bdd->insertar("suscriptores",$valores,$tdp,$campos);
            if($r){
                $sql = "SELECT LAST_INSERT_ID() AS id FROM ".$namedb.".suscriptores LIMIT 1";
                $tdp = null;
                $parametros = null;
                $campos = array('id');
                $r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0]);
                $this->bdd->finalizar();
                if(count($r)!=0){
                    return $r;
                }
                else{
                    return false;
                }

            }
            $this->bdd->finalizar();
        }
        return false;
    }

    public function actualizarEvento($id,$valores){
        global $namedb;
        if($this->bdd->conectar()){
            //$sql = "UPDATE ".$namedb.".noticias SET inicio=?,fin=?,titulo=?,descripcion=?,participantes=?,urlinscripcion=?,idioma=?,precio=?,cupos=?,organizado=?,lugar=? WHERE idevento=?";

            $tdp = "sssssssiissssssii";
            $parametros = null;
            $valoreswhere = array($id);
            $campos = array('inicio', 'fin', 'titulo', 'descripcion', 'participantes', 'urlinscripcion', 'idioma', 'precio', 'cupos','organizado','lugar','estado','urlafiche','urlthumbnail','urlimagenhome','destacado');
            $r = $this->bdd->actualizar("eventos",$valores,$campos,$valoreswhere,"idevento=?",$tdp);
            if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
        }
    }
    public function insertarEvento($valores){
        global $namedb;
        if($this->bdd->conectar()){
            $tdp = "ss";
            $parametros = null;
            $campos = array('titulo', 'descripcion');
            $r = $this->bdd->insertar("eventos",$valores,$tdp,$campos);
            if($r){
        		$sql = "SELECT LAST_INSERT_ID() AS id FROM ".$namedb.".eventos LIMIT 1";
        		$tdp = null;
        		$parametros = null;
        		$campos = array('id');
        		$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0]);
                $this->bdd->finalizar();
        		if(count($r)!=0){
        			return $r;
        		}
        		else{
        			return false;
        		}

            }
            $this->bdd->finalizar();
        }
        return false;
    }


    public function actualizarNoticia($id,$valores){
        global $namedb;
        if($this->bdd->conectar()){
            $tdp = "ssissssiii";
            $parametros = null;
            $valoreswhere = array($id);
            $campos = array('titulo', 'descripcion', 'idusuario', 'fechapublicacion', 'urlafiche','urlthumbnail','urlimagenhome','destacado','estado');
            $r = $this->bdd->actualizar("noticias",$valores,$campos,$valoreswhere,"idnoticia=?",$tdp);
            if(count($r)!=0){
				return $r;
			}
			else{
				return false;
			}
        }
    }
    public function insertarNoticia($valores){
        global $namedb;
        if($this->bdd->conectar()){
            $tdp = "ssi";
            $parametros = null;
            $campos = array('titulo', 'descripcion','idusuario');
            $r = $this->bdd->insertar("noticias",$valores,$tdp,$campos);
            if($r){
        		$sql = "SELECT LAST_INSERT_ID() AS id FROM ".$namedb.".noticias LIMIT 1";
        		$tdp = null;
        		$parametros = null;
        		$campos = array('id');
        		$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0]);
                $this->bdd->finalizar();
        		if(count($r)!=0){
        			return $r;
        		}
        		else{
        			return false;
        		}

            }
            $this->bdd->finalizar();

        }
        return false;
    }





    public function insertarVisita($valores){
        global $namedb;
        if($this->bdd->conectar()){
            $tdp = "sss";
            $parametros = null;
            $campos = array('nombre', 'email', 'asunto');
            $r = $this->bdd->insertar("visitas",$valores,$tdp,$campos);
            if($r){
        		$sql = "SELECT LAST_INSERT_ID() AS id FROM ".$namedb.".eventos LIMIT 1";
        		$tdp = null;
        		$parametros = null;
        		$campos = array('id');
        		$r = $this->bdd->ejecutar($sql,$parametros,$tdp,$campos[0]);
                $this->bdd->finalizar();
        		if(count($r)!=0){
        			return $r;
        		}
        		else{
        			return false;
        		}

            }
            $this->bdd->finalizar();
        }
        return false;
    }
}




?>
