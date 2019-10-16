var noticiasManager = {
    noticias : null,
    noticiasDestacadas : null,
    noticiasPrincipal: null,
    noticiaActual : null,
    noticiasHome : [],
    maxNoticias: null,
    lockNoticia: new AnimationLock(),
    generarListaNoticiasHome : function(){
        var cont = 0;
        var l = noticias.length;
        var max = 3;
        var lista = this.noticiasPrincipal;
        for(var i = 0; i<l; i++){
            if(noticias[i].destacado == 1){
                this.noticiasHome.push(noticias[i]);
                cont++;
            }
            if(cont == max) break;
        }
        this.maxNoticias = cont;
    },

    iniciarCambioDeNoticiasAutomatico : function(lockNoticia){
        var nt = noticiasManager;
        this.noticiaActual = 0;
        while(this.noticiasPrincipal.firstElementChild) this.noticiasPrincipal.remove(this.noticiasPrincipal.firstElementChild);
        noticiasManager.cambioDeNoticiasAutomatico(lockNoticia);

    },
    cambioDeNoticiasAutomatico: function(lockNoticia){
        if(lockNoticia.lock != 1) return;
        var lp = this.noticiasPrincipal;
        if(lp.firstElementChild){
            lp.firstElementChild.classList.remove("mostrar");
            lp.firstElementChild.classList.add("oculto");
            this.noticiaActual = (this.noticiaActual+1)%this.maxNoticias;
            lp.appendChild(this.generarNoticiaHome(this.noticiasHome[this.noticiaActual]));
            window.setTimeout(function(){
                lp.removeChild(lp.firstElementChild);
                lp.firstElementChild.classList.remove("oculto");
                lp.firstElementChild.classList.add("mostrar");

            },100);
        }
        else{
            lp.appendChild(this.generarNoticiaHome(this.noticiasHome[this.noticiaActual]));
            lp.firstElementChild.classList.remove("oculto");
            lp.firstElementChild.classList.add("mostrar");
        }

        window.setTimeout(function(){
            noticiasManager.cambioDeNoticiasAutomatico(lockNoticia);

        },8000);

    },
    cambioDeNoticiaManual : function(){
        this.lockNoticia.lock += 1;
        var lp = noticiasManager.noticiasPrincipal;
        var actualT = lp.firstElementChild;
        if(actualT.classList.contains("mostrar"))actualT.classList.remove("mostrar");
        if(!actualT.classList.contains("oculto"))actualT.classList.add("oculto");

        this.noticiaActual = (this.noticiaActual+1)%this.maxNoticias;

        var proxT = this.generarNoticiaHome(this.noticiasHome[this.noticiaActual]);
        lp.appendChild(proxT);
        window.setTimeout(function(){
            lp.removeChild(lp.firstElementChild);
            if(lp.firstElementChild.classList.contains("oculto"))lp.firstElementChild.classList.remove("oculto");
            if(!lp.firstElementChild.classList.contains("mostrar"))lp.firstElementChild.classList.add("mostrar");

        },100);
        window.setTimeout(function(){
            noticiasManager.lockNoticia.lock -= 1;
            noticiasManager.cambioDeNoticiasAutomatico(noticiasManager.lockNoticia);

        },8000);
    },

    generarLista: function(){
        var l = noticias.length;
        var i = 0;
        var noti = this.noticias;
        var notid = this.noticiasDestacadas;
        while(noti.firstChild) noti.removeChild(noti.firstChild);
        while(notid.firstChild) notid.removeChild(notid.firstChild);
        for(i = 0; i < l; i++){
            this.noticias.appendChild(this.generarNoticia(noticias[i]));
            if(noticias[i].destacado == 1){
                notid.appendChild(this.generarNoticiaDestacada(noticias[i]));
            }
        }
    },

    generarNoticiaDestacada : function(nt){
        var noti = document.createElement("li");
        noti.attributes.ev = nt;
        noti.addEventListener("click",function(){
            noticiasManager.generarNoticiaModal(this);

            modalManager.showModal();
        });

        var header = document.createElement("div");
        noti.appendChild(header);

        var titulo = document.createElement("h3");
        var tit = null;
        if(nt.titulo.length > 31) tit = nt.titulo.substr(0,31)+"...";
        else tit = nt.titulo;
        titulo.innerHTML = tit;
        header.appendChild(titulo);

        var fechaSpan = document.createElement("span");
        var fecha = new Date(nt.fechaPublicacion.replace(/-/g,"/"));
        fechaSpan.innerHTML = "("+calendarioManager.generarStringFecha(fecha)+")";
        header.appendChild(fechaSpan);

        var descripcion = document.createElement("p");
        var desc = null;
        if(nt.descripcion.length > 160) desc = nt.descripcion.substr(0,160)+"...";
        else desc = nt.descripcion;
        descripcion.innerHTML = desc;
        noti.appendChild(descripcion);
        return noti;
    },

    generarNoticia : function(nt){
        var noti = document.createElement("li");
        var contImagen = document.createElement("figure");
        contImagen.attributes.ev = nt;
        contImagen.addEventListener("click",function(){
            noticiasManager.generarNoticiaModal(this);

            modalManager.showModal();
        });
        contImagen.classList.add("imagen-noticia");
        noti.appendChild(contImagen);
        var imag = document.createElement("img");
        imag.src = nt.urlThumbnail;

        contImagen.appendChild(imag);

        var divContenido = document.createElement("div");
        divContenido.attributes.ev = nt;
        divContenido.addEventListener("click",function(){
            noticiasManager.generarNoticiaModal(this);

            modalManager.showModal();
        });

        divContenido.classList.add("info-noticia");
        noti.appendChild(divContenido);

        var fechaParrafo = document.createElement("p");
        var fecha = new Date(nt.fechaPublicacion.replace(/-/g,"/"));
        fechaParrafo.innerHTML = "("+calendarioManager.generarStringFecha(fecha)+")";
        divContenido.appendChild(fechaParrafo);
        var titulo = document.createElement("h3");
        titulo.classList.add("header-noticia");
        titulo.innerHTML = nt.titulo;
        divContenido.appendChild(titulo);

        var descrip = document.createElement("p");
        descrip.classList.add("resumen-noticia");
        var desc = null;
        if(nt.descripcion.length > 170) desc = nt.descripcion.substr(0,170)+"...";
        else desc = nt.descripcion;
        descrip.innerHTML = desc;
        divContenido.appendChild(descrip);

        fechaParrafo.classList.add("fecha-noticia")
        var publicaParrafo = document.createElement("p");
        publicaParrafo.innerHTML = "Publicado por: ";
        publicaParrafo.classList.add("publicador-noticia");
        var autor = document.createElement("span");
        autor.innerHTML = nt.idUsuario;
        publicaParrafo.appendChild(autor);
        divContenido.appendChild(publicaParrafo);




        var botonBorrar = document.createElement("img");
        botonBorrar.classList.add("boton-borrar");
        botonBorrar.src = "img/boton-borrar.png";
        botonBorrar.alt = "Eliminar evento";
        botonBorrar.attributes.ev = nt;
        var otroCont = document.createElement("div");
        otroCont.appendChild(botonBorrar);
        otroCont.style = "height:44px;";
        noti.appendChild(otroCont);

        botonBorrar.addEventListener("click",function(){
            var boton = this;
            FormManager.setAceptarDialog();
            FormManager.bindAceptarDialog(function(){
                FormManager.borrarNoticia(boton);
            });
            FormManager.showDialog();
        });
        return noti;

    },

    generarNoticiaHome: function(nt){
        var noti = document.createElement("article");
        noti.classList.add("oculto");
        var spanImg = document.createElement("span");
        spanImg.classList.add("small-box");
        spanImg.classList.add("imagen-patron");
        noti.appendChild(spanImg);
        var foto = document.createElement("img");
        foto.src = nt.urlImagenHome;
        spanImg.appendChild(foto);
        spanImg.appendChild(document.createElement("div"));
        var titulo = document.createElement("h3");
        titulo.innerHTML = nt.titulo;
        if(nt.titulo.length > 36) titulo.innerHTML = nt.titulo.substr(0,36)+"...";
        noti.appendChild(titulo);
        var divParrafo = document.createElement("div");
        noti.appendChild(divParrafo);
        var descrip = document.createElement("p");
        descrip.innerHTML = nt.descripcion;
        if(nt.descripcion.length > 260) descrip.innerHTML = nt.descripcion.substr(0,260)+"...";
        divParrafo.appendChild(descrip);
        var fecha = document.createElement("span");
        fecha.innerHTML = calendarioManager.generarStringFecha(new Date(nt.fechaPublicacion.replace(/-/g,"/")));
        noti.appendChild(fecha);

        return noti;
    },
    generarNoticiaModal : function(viewEv){

        var cm = calendarioManager;
        var noticia = document.importNode(contextManager.contextList["noticias"].plantillaNoticiaModal,true);
        var ev = viewEv.attributes.ev;
        var modal = document.getElementById("modal-content");
        modal.innerHTML = noticia.innerHTML;
        noticia = modal;
        /* Afiche */
        var afiche = noticia.querySelector(".preview-modal").children[0];
        var archivo = noticia.querySelector(".cambiar-imagen").children[1];
        afiche.src = ev.urlAfiche;
        afiche.alt = "afiche";
        afiche.attributes.ev = ev;
        archivo.onchange = function(){
            FormManager.guardarImagenNoticia(this);
        };
        /*Texto*/
        var publicacion = noticia.querySelector(".publicacion-modal");
        var fecha = new Date(ev.fechaPublicacion.replace(/-/g,"/"));

        publicacion.value = calendarioManager.generarStringDateTime(fecha);

        var titulo = noticia.querySelector(".h2-noticia-modal");
        titulo.value = ev.titulo;
        titulo.attributes.ev = ev;
        titulo.form.attributes.ev = ev;

        var descripcion = noticia.querySelector("#pnoticia-modal").children[0];
        descripcion.value = ev.descripcion.unescapeSpecialChars();
        descripcion.attributes.ev = ev;
        var autor = noticia.querySelector(".autor-noticia");
        autor.innerHTML = ev.idUsuario;
//'titulo', 'descripcion','urlafiche','urlthumbnail','urlimagenhome','destacado','estado'

        var destacado = noticia.querySelector(".destacado-noticia");
        destacado.value = ev.destacado;
        if(ev.destacado == 1) destacado.click();
        destacado.attributes.ev = ev;

        var idnoticia = noticia.querySelector(".idnoticia");
        idnoticia.value = ev.id;
        var preview = noticia.querySelector(".preview");
        preview.src = ev.urlAfiche;
        var urlAfiche = noticia.querySelector(".urlAfiche");
        urlAfiche.value = ev.urlAfiche;
        var urlImagenHome = noticia.querySelector(".urlImagenHome");
        urlImagenHome.value = ev.urlImagenHome;
        var urlThumbnail = noticia.querySelector(".urlThumbnail");
        urlThumbnail.value = ev.urlThumbnail;

        var estado = noticia.querySelector(".estado-noticia");
        estado.value = ev.estado;
        if(ev.estado == 1) estado.click();
        estado.attributes.ev = ev;
        //editable
    },
    inicializar : function(){
        noticiasManager.noticias = document.getElementById("lista-noticias");
        //noticiasManager.base64Decode();
        noticiasManager.noticiasDestacadas = document.getElementById("noticias-destacadas");
        noticiasManager.generarLista();
    },

    inicializarNoticiasPrincipal : function(){
        noticiasManager.noticiasPrincipal = document.getElementById("noticias-principal");
        noticiasManager.generarListaNoticiasHome();
        noticiasManager.iniciarCambioDeNoticiasAutomatico(this.lockNoticia);
    }

}
