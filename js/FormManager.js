class FormManager{
    constructor(){

    }
    static bindAceptarDialog(func){
        var mw = document.getElementById("dialog-section");
        var botonAceptar = mw.querySelector(".boton-aceptar");
        botonAceptar.addEventListener("click",func);
        botonAceptar.addEventListener("click",function(){FormManager.hideDialog()});
        var botonDeclinar = mw.querySelector(".boton-declinar");
        botonDeclinar.addEventListener("click",function(){FormManager.hideDialog()});

    }
    static showDialog(){
        var mw = document.getElementById("dialog-section");
        mw.classList.remove("hidden");
        mw.classList.remove("fadeout-modal");
        window.setTimeout(function(){
            mw.classList.add("fadein-modal");
        },10);
    }
    static hideDialog(){
        var mw = document.getElementById("dialog-section");
        mw.classList.remove("fadein-modal");
        mw.classList.add("fadeout-modal");
        window.setTimeout(function(){
            mw.classList.add("hidden");
        },400);
    }
    static crearEvento(){
        //prueba = boton;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        //prueba = respuesta;
        respuesta.setOnSuccess(function(xhr){
            var res = JSON.parse(xhr.responseText);
            var data = {};
            if(res){
                data.id = res.id;
                data.urlAfiche = "img/afichePredeterminado.png";
                data.urlThumbnail = "img/aficheThumbnailPredeterminado.png";
                data.urlImagenHome = "img/aficheHomePredeterminado.png";
                data.titulo = "T\u00edtulo";
                data.descripcion = "Texto";
                var ahoraText = calendarioManager.generarStringDateTime(new Date());
                data.inicio = ahoraText;
                data.fin = ahoraText;
                data.participantes = "No se han ingresado";
                data.precio = 0;
                data.cupos = 20;
                data.organizado = "Working House";
                data.lugar = "Orompello #178, Concepci\u00f3n";
                data.estado = 0;
                data.urlInscripcion = "welcu.com";
                eventos[eventos.length] = data;
                eventos.sort(function(a,b) {return (a.inicio < b.inicio) ? 1 : ((b.inicio < a.inicio) ? -1 : 0);} );
                var divEvento = eventosManager.generarEvento(data);
                eventosManager.generarListaDeEventos();
                eventosManager.generarEventoModal(divEvento.children[1].children[0]);
                modalManager.showModal();

            }
        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Algo salió mal");
        });
        respuesta.setOnServerError(function(xhr){
            window.alert("Algo salió mal (server error)");
        });
        var data = {}
        data["titulo"] = "Titulo";
        data["descripcion"] = "Texto";
        //Se envian los datos a travpes de Ajax
        client.doPost("eventos/crear.php","jsondata="+JSON.stringify(data),respuesta);
    }
    static agendarVisita(boton){
        var formulario = boton.form;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var datos = this.extractAndFormatData(formulario);
        respuesta.setOnSuccess(function(xhr){
            var texto = boton.parentNode.querySelector(".exito-visita");
            texto.style = "display:block;";
        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Está mal: "+xhr.responseText);
        });
        respuesta.setOnAppError(function(xhr){
            window.alert("¡Ya registraste tu visita, espera y te contactaremos a la brevedad!");
        });
        //Se envian los datos a travpes de Ajax
        client.doPost(formulario.action,"jsondata="+JSON.stringify(datos),respuesta);
    }
    static borrarEvento(boton){
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var id = {};
        var ev = boton.attributes.ev;
        id["id"] = boton.attributes.ev.id;
        var datos = id;
        respuesta.setOnSuccess(function(xhr){
            eventos = removeFromContainer(eventos,ev);
            eventosManager.generarListaDeEventos();
            window.alert("¡El evento fue borrado con éxito!");
        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Hubo un problema al borrar el evento");
        });
        respuesta.setOnAppError(function(xhr){
            window.alert("Hubo un problema al borrar el evento");
        });
        //Se envian los datos a travpes de Ajax
        client.doPost("eventos/borrar.php","jsondata="+JSON.stringify(datos),respuesta);
    }
    static setAceptarDialog(){
        var dialog = document.getElementById("dialog-content");
        var aceptar = document.getElementById("dialogo-aceptar");
        while(dialog.firstElementChild) dialog.removeChild(dialog.firstElementChild);
        dialog.appendChild(document.importNode(aceptar.content,true));
    }
    static borrarNoticia(boton){
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var id = {};
        var ev = boton.attributes.ev;
        id["id"] = boton.attributes.ev.id;
        var datos = id;
        respuesta.setOnSuccess(function(xhr){
            noticias = removeFromContainer(noticias,ev);
            noticiasManager.generarLista();
            window.alert("La noticia fue eliminada con éxito");
        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Está mal: "+xhr.responseText);
        });
        respuesta.setOnAppError(function(xhr){
            window.alert("¡Ya registraste tu visita, espera y te contactaremos a la brevedad!");
        });
        //Se envian los datos a travpes de Ajax
        client.doPost("noticias/borrar.php","jsondata="+JSON.stringify(datos),respuesta);
    }
    static guardar(boton){
        var formulario = boton.form;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var datos = this.extractAndFormatData(formulario);
        respuesta.setOnSuccess(function(xhr){
            FormManager.replaceOldData(formulario)
            FormManager.sortData(eventos);
            eventosManager.generarListaDeEventos();
            window.alert("¡El evento fue guardado con éxito!");

        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Está mal: "+xhr.responseText);
        });
        //Se envian los datos a travpes de Ajax
        client.doPost(formulario.action,"jsondata="+JSON.stringify(datos),respuesta);
    }
    static suscribir(boton){
        var formulario = boton.form;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var datos = this.extractAndFormatData(formulario);
        respuesta.setOnSuccess(function(xhr){
            window.alert("¡Gracias por suscribirte!");
            boton.disabled = true;
        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Algo salió mal: ");
        });
        respuesta.setOnAppError(function(xhr){
            window.alert("¡Gracias, pero ya estás suscrito!");
        });
        //Se envian los datos a travpes de Ajax
        client.doPost(formulario.action,"jsondata="+JSON.stringify(datos),respuesta);
    }
    static crearNoticia(){
        //prueba = boton;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        //prueba = respuesta;
        respuesta.setOnSuccess(function(xhr){
            var res = JSON.parse(xhr.responseText);
            var data = {};
            if(res){
                data.id = res.id;
                data.urlAfiche = "img/noticiaPredeterminado.png";
                data.urlImagenHome = "img/noticiaHomePredeterminado.png";
                data.urlThumbnail = "img/noticiaThumbnailPredeterminado.png";
                data.titulo = "T\u00edtulo";
                data.descripcion = "Texto";
                var ahora = new Date();
                var minutos = ahora.getMinutes();
                if(minutos == "0") minutos = "00";
                var ahoraText = ahora.getFullYear()+"/"+(ahora.getMonth()+1)+"/"+ahora.getDate()+" "+ahora.getHours()+":"+minutos;
                data.fechaPublicacion = ahoraText;
                data.estado = 0;
                data.destacado = 0;
                data.idUsuario = nombreUsuario+" "+apellidoUsuario;
                noticias[noticias.length] = data;
                noticias.sort(function(a,b) {return (a.fechaPublicacion < b.fechaPublicacion) ? 1 : ((b.fechaPublicacion < a.fechaPublicacion) ? -1 : 0);} );
                var divNoticia = noticiasManager.generarNoticia(data);
                divNoticia.attributes.ev = data;
                noticiasManager.generarLista();
                noticiasManager.generarNoticiaModal(divNoticia);
                modalManager.showModal();

            }
        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Algo salió mal");
        });
        respuesta.setOnServerError(function(xhr){
            window.alert("Algo salió mal (server error)");
        });
        var data = {}
        data["titulo"] = "Titulo";
        data["descripcion"] = "Texto";
        //Se envian los datos a travpes de Ajax
        client.doPost("noticias/crear.php","jsondata="+JSON.stringify(data),respuesta);
    }

    static guardarNoticia(boton){
        //prueba = boton;
        var formulario = boton.form;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var datos = this.extractAndFormatData(formulario);
        respuesta.setOnSuccess(function(xhr){
            FormManager.replaceOldData(formulario)
            FormManager.sortData(eventos);
            noticiasManager.generarLista();
            window.alert("¡La noticia fue guardada con éxito!");

        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Está mal: "+xhr.responseText);
        });
        //Se envian los datos a travpes de Ajax
        client.doPost(formulario.action,"jsondata="+JSON.stringify(datos).escapeSpecialChars(),respuesta);
    }
    static guardarImagenEvento(file){
        //debe ser un input
        if(file.nodeName.toLowerCase() != "input") return;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();

        respuesta.setOnSuccess(function(xhr){
            var form = file.parentNode.parentNode.parentNode.querySelector("form");
            var imagenes = JSON.parse(xhr.responseText);
            var urlAfiche = form.querySelector(".urlAfiche");
            var urlImagenHome = form.querySelector(".urlImagenHome");
            var urlThumbnail = form.querySelector(".urlThumbnail");
            var preview = file.parentNode.parentNode.querySelector(".preview");
            urlAfiche.value = imagenes["urlAfiche"];
            urlImagenHome.value = imagenes["urlImagenHome"];
            urlThumbnail.value = imagenes["urlThumbnail"];
            preview.src = imagenes["urlAfiche"];

        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Está mal: "+xhr.responseText);
        });
        //Se envian los datos a travpes de Ajax
        client.upload("eventos/image.php",file,respuesta);
    }


    static guardarImagenNoticia(file){
        //debe ser un input
        if(file.nodeName.toLowerCase() != "input") return;
        var client = new Rest("");
        var respuesta = new OnHTTPResponse();
        var form = file.form;

        respuesta.setOnSuccess(function(xhr){
            var imagenes = JSON.parse(xhr.responseText);
            var urlAfiche = form.querySelector(".urlAfiche");
            var urlImagenHome = form.querySelector(".urlImagenHome");
            var urlThumbnail = form.querySelector(".urlThumbnail");
            var preview = form.parentNode.querySelector(".preview");
            console.log(form);
            urlAfiche.value = imagenes["urlAfiche"];
            urlImagenHome.value = imagenes["urlImagenHome"];
            urlThumbnail.value = imagenes["urlThumbnail"];
            preview.src = imagenes["urlAfiche"];

        });
        respuesta.setOnClientError(function(xhr){
            window.alert("Está mal: "+xhr.responseText);
        });
        //Se envian los datos a travpes de Ajax
        client.upload("noticias/image.php",file,respuesta);
    }
    /* Obtiene y formatea, automaticamente, los datos del formulario, a partir
       de los input y textarea que tengan la clase editable */
    static extractAndFormatData(form){
        var editables = form.getElementsByClassName("editable");
        var data = {};
        var l = editables.length;
        var actual = null;
        for(var i=0;i<l;i++){
            actual = editables[i];
            if(actual.type == "checkbox"){
                if(actual.checked)actual.value="1";
                else actual.value = "0";
            }
            data[actual.name] = encodeURIComponent(actual.value.trim().escapeSpecialChars());
        }
        return data;
    }
    static replaceOldData(form){
        var oldData = form.attributes.ev;
        var contenedor = form.parentNode;
        var editables = form.getElementsByClassName("editable");
        var data = {};
        var l = editables.length;
        var actual = null;
        for(var i=0;i<l;i++){
            actual = editables[i];
            if(actual.type == "checkbox"){
                if(actual.checked)actual.value="1";
                else actual.value = "0";
            }
            oldData[actual.name] = actual.value.trim();
        }
        //return data;
    }
    static sortData(datos){
        datos.sort(function(a,b) {return (a.inicio < b.inicio) ? 1 : ((b.inicio < a.inicio) ? -1 : 0);} );
    }
    static turnEditable(button){
        var form = button.form;
        form.classList.add("edit");
        var editables = form.getElementsByClassName("editable");
        this.createInputs(form,editables);
        this.setOnClickListeners(editables);
    }
    static createInputs(form,editables){
        var l = editables.length;
        var i = 0;
        var input = null;
        var editable = null;
        for(i=0;i<l;i++){
            editable = editables[i];
            input = document.createElement("input");
            editable.attributes.input = input;
            input.type = "hidden";
            input.name = editables[i].attributes.inputName.value;
            input.value = "";
            form.appendChild(input);
        }
    }
    static setOnClickListeners(editables){
        var l = editables.length;
        var i = 0;
        var input = null;
        for(i=0;i<l;i++){
            editables[i].addEventListener("click",function(){FormManager.getDataFromDialog(this);})
        }
    }
    static getDataFromDialog(editable){
        //var dialog = this.createDialog();
        FormManager.showDialog();
    }
}
/*******************************************************/
/** functions to remove an object from another object **/
/*******************************************************/
function getIndex(container,object){
    var t = container.length;
    for(var i=0;i<t;i++) if(container[i] == object) return i;
    return undefined;
}
function removeFromContainer(container, object){
    var pos = getIndex(container,object);
    if(pos == undefined) return undefined;

    var leftSide = container.slice(0,pos);
    var rightSide = container.slice(pos+1,container.length);
    var t = rightSide.length;
    for(var i=0;i<t;i++) leftSide.push(rightSide[i]);
    return leftSide;
}
String.prototype.escapeSpecialChars = function() {
    return this.replace(/\n/g, "&#10;")
               .replace(/\r/g, "&#13;")
};
String.prototype.unescapeSpecialChars = function() {
    return this.replace(/&#10;/g, "\n")
               .replace(/&#13;/g, "\r")
};
String.prototype.unescapeHTMLNewLine = function() {
    return this.replace(/&#10;/g, "<br/>")
               .replace(/&#13;/g, "<br/>")
};
