class Principal extends Context{
    onStart(){
        //eventosManager.inicializarListaPrincipal();
        //noticiasManager.inicializarNoticiasPrincipal();
    }
    onStop(){
    }
}
class Eventos extends Context{
    constructor(menuElement){
        super(menuElement);
        var plantilla = this.context.querySelector("#evento-modal").content;
        this.plantillaEventoModal = document.createElement("div");
        this.plantillaEventoModal.appendChild(document.importNode(plantilla,true));
    }
    onStart(){

        eventosManager.inicializar();
    }
    onStop(){

    }
}
class Usuarios extends Context{
    onStart(){
        userManager.generarListaDeUsuarios();
    }
    onStop(){

    }
}
class Noticias extends Context{
    constructor(menuElement){
        super(menuElement);
        var plantilla = this.context.querySelector("#noticia-modal").content;
        this.plantillaNoticiaModal = document.createElement("div");
        this.plantillaNoticiaModal.appendChild(document.importNode(plantilla,true));
    }
    onStart(){
        noticiasManager.inicializar();
    }
    onStop(){

    }
}
class ContextManager extends ContextManagerBase{
    getContextFromTemplate(el){
        var contexto = null;
        var tId = el.attributes.templateId.value;
        if(tId == "principal") contexto = new Principal(el);
        else if(tId == "usuarios") contexto = new Usuarios(el);
        else if(tId == "eventos") contexto = new Eventos(el);
        else if(tId == "noticias") contexto = new Noticias(el);
        return contexto;
    }
}
function setHeight(inp){
    inp.style="height: auto;";
    inp.style="height: "+inp.scrollHeight+"px;";
}
