var prueba = null;
var eventosManager = {
    actEventos : null,
    proxEventos : null,
    pasEventos : null,
    diaEventos : null,
    listaPrincipal : null,
    eventoActual : null,
    lockEvento: new AnimationLock(),
    maxEventos: null,
    destacados: [],
    generarDestacados : function(){
        var cont = 0;
        var l = eventos.length;
        var max = 5;
        this.maxEventos = max;
        var lista = this.listaPrincipal;
        for(var i = 0; i<l; i++){
            if(eventos[i].destacado == 1){
                this.destacados.push(eventos[i]);
                cont++;
            }
            if(cont == max) break;
        }
        if(cont<max) this.maxEventos = cont;
    },
    generarImagenEvento : function(ev){
        var imagenEvento = document.createElement("img");
        imagenEvento.classList.add("oculto");
        imagenEvento.src = ev.urlImagenHome;
        return imagenEvento;
    },
    iniciarCambioDeEventosAutomatico : function(lock){
        var em = eventosManager;
        this.eventoActual = 0;
        while(this.listaPrincipal.firstElementChild) this.listaPrincipal.remove(this.listaPrincipal.firstElementChild);
        eventosManager.cambioDeEventosAutomatico(lock);
    },
    cambioDeEventosAutomatico: function(lockEvento){
        if(lockEvento.lock != 1) return;
        var em = this;
        prueba = lockEvento;
        var lp = this.listaPrincipal;
        if(lp.firstElementChild){
            //hide actual event
            lp.firstElementChild.classList.remove("mostrar");
            lp.firstElementChild.classList.add("oculto");
            //change to the next event and add it
            this.eventoActual = (this.eventoActual+1)%this.maxEventos;
            window.setTimeout(function(){
                //remove previous event and show the last inserted one
                lp.removeChild(lp.firstElementChild);
                lp.appendChild(em.generarEventoPrincipal(em.destacados[em.eventoActual]));
                lp.firstElementChild.classList.add("mostrar");
                lp.firstElementChild.classList.remove("oculto");

            },300);
        }
        else{
            lp.appendChild(this.generarEventoPrincipal(this.destacados[this.eventoActual]));
            lp.firstElementChild.classList.remove("oculto");
            lp.firstElementChild.classList.add("mostrar");
        }

        window.setTimeout(function(){
            eventosManager.cambioDeEventosAutomatico(lockEvento);

        },8000);

    },
    cambioDeEventoManual : function(){
        this.lockEvento.lock += 1;
        var lp = eventosManager.listaPrincipal;
        var actualT = lp.firstElementChild;
        if(actualT.classList.contains("mostrar"))actualT.classList.remove("mostrar");
        if(!actualT.classList.contains("oculto"))actualT.classList.add("oculto");

        this.eventoActual = (this.eventoActual+1)%this.maxEventos;

        var proxT = this.generarEventoPrincipal(this.destacados[this.eventoActual]);
        window.setTimeout(function(){
            lp.removeChild(lp.firstElementChild);
            lp.appendChild(proxT);
            if(lp.firstElementChild.classList.contains("oculto"))lp.firstElementChild.classList.remove("oculto");
            if(!lp.firstElementChild.classList.contains("mostrar"))lp.firstElementChild.classList.add("mostrar");

        },300);
        window.setTimeout(function(){
            eventosManager.lockEvento.lock -= 1;
            eventosManager.cambioDeEventosAutomatico(eventosManager.lockEvento);

        },8000);
    },
    generarEventoPrincipal : function(ev){
        var vista = document.createElement("article");
        vista.classList.add("articulo-general");
        vista.attributes.ev = ev;
        vista.addEventListener("click",function(){
            eventosManager.generarEventoModal(this);
            modalManager.showModal();
        });
        vista.classList.add("oculto");
        var titulo = document.createElement("h3");
        titulo.classList.add("h3-articulo");
        vista.appendChild(titulo);
        titulo.innerHTML = ev.titulo;
        var parrafo = document.createElement("p");
        parrafo.classList.add("descripcion-articulo");
        parrafo.innerHTML = ev.descripcion;
        vista.appendChild(parrafo);
        if(ev.descripcion.length > 260) parrafo.innerHTML = ev.descripcion.substr(0,260)+"...";

        var spanFoto = document.createElement("span");
        spanFoto.classList.add("small-box");
        spanFoto.classList.add("imagen-patron");
        vista.appendChild(spanFoto);
        var foto = document.createElement("img");
        foto.src = ev.urlImagenHome;
        spanFoto.appendChild(foto);
        spanFoto.appendChild(document.createElement("div"));
        var fecha = document.createElement("p");
        fecha.classList.add("fecha-principal");
        fecha.innerHTML = calendarioManager.generarStringFecha(new Date(ev.inicio.replace(/-/g,"/")));
        vista.appendChild(fecha);

        return vista;
    },
    generarListaDeEventos : function(){
        var l = eventos.length;
        var i = 0;
        var pe = eventosManager.proxEventos;
        var pase = eventosManager.pasEventos;
        var acte = eventosManager.actEventos;
        var ahora = new Date().getTime();
        while(pe.firstChild) pe.removeChild(pe.firstChild);
        while(pase.firstChild) pase.removeChild(pase.firstChild);
        while(acte.firstChild) acte.removeChild(acte.firstChild);
        var fini = null;
        var ffin = null;
        for(i = 0; i < l; i++){
            if(eventos[i].estado == 1){
                fini = new Date(eventos[i].inicio.replace(/-/g,"/"));
                ffin = new Date(eventos[i].fin.replace(/-/g,"/"));
                if(ahora < fini.getTime()) pe.appendChild(eventosManager.generarEvento(eventos[i]));
                else if((fini.getTime() < ahora) && (ahora < ffin.getTime())) acte.appendChild(eventosManager.generarEvento(eventos[i]));
                else pase.appendChild(eventosManager.generarEvento(eventos[i]));
            }
        }
    },
    generarListaDeEventosDelDia : function(divdia){
        var dia = divdia.attributes.dia;
        var l = eventos.length;
        var i = 0;
        var diasig = new Date(dia);
        diasig.setDate(diasig.getDate()+1);
        var evdia = eventosManager.diaEventos;
        //Se realiza un respaldo del listado de eventos, renderizado
        //en eventosManager.diaEventos, copiando la referencia, solo
        //si es que no existe la copia
        var diaAntSel = calendarioManager.diaSeleccionado;
        //Se realiza la copia del dia previamente seleccionado.
        if(diaAntSel.attributes.renderedList != undefined)
            diaAntSel.attributes.renderedList = evdia.innerHTML;
        while(evdia.firstChild) evdia.removeChild(evdia.firstChild);

        var fini = null; //fecha inicio del evento
        var ffin = null; //fecha termino del evento

        //para cada elemento de la variable eventos se busca las intersecciones
        //del rango correspondiente a las 24 horas del dia seleccionado, comenzando
        //desde las 00:00 hrs, con el intervalo del evento, considerando fechas y horas.
        for(i = 0; i < l; i++){
            //se obtiene los datos del inicio y fin del i-esimo evento
            if(eventos[i].estado == 1){
                fini = new Date(eventos[i].inicio.replace(/-/g,"/"));
                ffin = new Date(eventos[i].fin.replace(/-/g,"/"));
                //si hay alguna interseccion, entonces se agrega el evento
                if(!(((fini.getTime() < dia.getTime()) && (ffin.getTime() < dia.getTime())) || ((fini.getTime() > diasig.getTime()) && (ffin.getTime() > diasig.getTime())))) evdia.appendChild(eventosManager.generarEvento(eventos[i]));
            }
        }
    },
    generarEvento : function(ev){
        var t = document.createElement("li");
        t.classList.add("evento");
        t.setAttribute("date",ev.inicio.replace(/-/g,"/"));
        t.attributes.ev = ev;

        //crea seccion de imagen de afiche
        t.appendChild(document.createElement("div"));
        t.children[0].classList.add("img-evento");
        t.children[0].appendChild(document.createElement("img"));
        t.children[0].children[0].src = ev.urlThumbnail;
        t.children[0].children[0].alt = "Afiche evento";
        t.children[0].addEventListener("click",function(){
            eventosManager.generarAficheModal(this);

            modalManager.showModal();
        });

        //crea seccion de imagen de afiche
        var conte = document.createElement("div");
        conte.classList.add("conte-evento");
        t.appendChild(conte);

        //crea seccion que contiene la informacion en texto como titulo, descripcion
        //fecha de inicio, expositores
        var subconte = document.createElement("div");
        //onClickListener
        conte.appendChild(subconte);
        subconte.appendChild(document.createElement("h3"));
        subconte.children[0].innerHTML = ev.titulo;
        subconte.appendChild(document.createElement("ul"));
        var lista = subconte.children[1];
        lista.appendChild(document.createElement("li"));
        lista.children[0].innerHTML = "<span>Fecha - Hora:</span> "+ev.inicio;
        lista.appendChild(document.createElement("li"));
        var desc = null;
        if(ev.descripcion.length > 173) desc = ev.descripcion.substr(0,174)+"...";
        else desc = ev.descripcion;
        lista.children[1].innerHTML = "<span>Descripci\u00F3n:</span> "+desc;
        lista.appendChild(document.createElement("li"));
        lista.children[2].innerHTML = "<span>Expositor(es):</span> "+ev.participantes;
        conte.attributes.ev = ev;
        subconte.attributes.ev = ev;
        subconte.addEventListener("click",function(){
            eventosManager.generarEventoModal(this);

            modalManager.showModal();
        });

        //crea boton para la inscripcion
        var inp = document.createElement("a");
        inp.innerHTML = "INSCR\u00CDBETE";
        inp.href = ev.urlInscripcion;
        inp.target = "_blank";
        var otroCont = document.createElement("div");
        otroCont.appendChild(inp);
        conte.appendChild(otroCont);

        return t;
    },
    generarEventoModal : function(viewEv){
        var cm = calendarioManager;
        var evento = document.importNode(contextManager.contextList["eventos"].plantillaEventoModal,true);
        var ev = viewEv.attributes.ev;
        var modal = document.getElementById("modal-content");
        /* Afiche */
        var afiche = evento.querySelector("#afiche-modal").children[0];
        afiche.src = ev.urlAfiche;
        afiche.alt = "afiche";
        afiche.attributes.ev = ev;
        /*Texto*/
        var titulo = evento.querySelector("#h2-evento-modal");
        titulo.innerHTML = ev.titulo;
        titulo.attributes.ev = ev;

        var descripcion = evento.querySelector("#pevento-modal").children[0];
        descripcion.innerHTML = ev.descripcion.unescapeHTMLNewLine();
        descripcion.attributes.ev = ev;

        var inicio = evento.querySelector("#inievento-modal").children[1];
        inicio.innerHTML = calendarioManager.generarStringFechaHora(new Date(ev.inicio.replace(/-/g,"/")));
        inicio.attributes.ev = ev;

        var fin = evento.querySelector("#finevento-modal").children[1];
        fin.innerHTML = calendarioManager.generarStringFechaHora(new Date(ev.fin.replace(/-/g,"/")));
        fin.attributes.ev = ev;

        var expositores = evento.querySelector("#expevento-modal").children[1];
        expositores.innerHTML = ev.participantes;
        expositores.attributes.ev = ev;

        var valor = evento.querySelector("#valevento-modal").children[1];
        if(ev.precio == "0") valor.innerHTML = "entrada liberada";
        else valor.innerHTML = ev.precio;
        valor.attributes.ev = ev;

        var cupos = evento.querySelector("#cupevento-modal").children[1];
        cupos.innerHTML = ev.cupos;
        cupos.attributes.ev = ev;

        var organizado = evento.querySelector("#orgevento-modal").children[1];
        organizado.innerHTML = ev.organizado;
        organizado.attributes.ev = ev;

        var inscripcion = evento.querySelector("#insevento-modal");
        inscripcion.href = ev.urlInscripcion;
        modal.innerHTML = evento.innerHTML;

        var fbSharer = document.querySelector(".fb-share");

        fbSharer.addEventListener("click",function(){
            FB.ui({
              method: 'share',
              display: 'popup',
              href: document.origin+'/eventos/?id='+ev.id,
          }, function(response){});
        });
    },
    generarAficheModal : function(viewEv){
        var cm = calendarioManager;
        prueba = viewEv;
        var ev = viewEv.parentElement.attributes.ev;
        var modal = document.getElementById("modal-section");
        var cont = modal.children[0].children[1];
        while(cont.firstChild) cont.removeChild(cont.firstChild);
        /* Afiche */
        var contAfiche = document.createElement("figure");
        contAfiche.classList.add("solo-afiche-modal");
        var afiche = document.createElement("img");
        afiche.src = ev.urlAfiche;
        afiche.alt = "afiche";
        contAfiche.appendChild(afiche);
        cont.appendChild(contAfiche);

    },
    inicializar : function(){
        eventosManager.actEventos = document.getElementById("act-eventos");
        eventosManager.proxEventos = document.getElementById("prox-eventos");
        eventosManager.pasEventos = document.getElementById("pas-eventos");
        eventosManager.diaEventos = document.getElementById("dia-eventos");
        //eventosManager.base64Decode();
        calendarioManager.inicializar("calendario");
        calendarioManager.mueveCalendario();
        eventosManager.generarListaDeEventos();
    },
    inicializarListaPrincipal : function(){
        eventosManager.listaPrincipal = document.getElementById("eventos-principal");
        eventosManager.generarDestacados();
        eventosManager.iniciarCambioDeEventosAutomatico(eventosManager.lockEvento);
    }
};
