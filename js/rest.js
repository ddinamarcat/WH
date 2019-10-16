class OnHTTPResponse{
    constructor(){
        this.onSuccess = null;
        this.onServerError = null;
        this.onClientError = null;
        this.onAppError = null;
    }
    //para definir que se va hacer cuando se reciba un OK como resultado.
    setOnSuccess(func){
        this.onSuccess = func;
    }
    //para definir que se va hacer cuando se reciba un error 5XX.
    setOnServerError(func){
        this.onServerError = func;
    }
    //para definir que se va hacer cuando se reciba un error 4XX.
    setOnClientError(func){
        this.onClientError = func;
    }
    setOnAppError(func){
        this.onAppError = func;
    }

}
class HTTPRequest{
    constructor(resource,operation,data){
        this.resource = resource;
        this.operation = operation;
        this.message = this.dataToMessage(data);
        this.postMessage = "";
        this.getMessage = "";
        this.putMessage = "";
        this.deleteMessage = "";
    }
    dataToMessage(data){

    }
}
class Rest{
    // - host: es la direccion del sitio, sin recurso, que contiene el Web
    //         Service en cuestion.
    constructor(host){
        if(host[host.length-1] != '/') this.host = host+"/";
        else this.host = host;
        this.async = true;
    }
    //realiza una llamada asyncrona de los metodos http
    setAsync(){
        this.async = true;
    }
    //realiza una llamada sincronizada de los metodos http, no es recomendado,
    //a menos que se use en un "window.setTimeout(...)".
    setSync(){
        this.async = false;
    }
    //Usa el metodo POST de http sobre un recurso.
    //  - resource: es el recurso al cual se le quiere aplicar el metodo POST.
    //            (Ej: "/cursos" de "http://www.mydomain.com/cursos")
    //  - postdata: es un objeto que contiene la informacion a ser utilizada por
    //            el recurso. Este objeto sera transformado a JSON
    //  - actions: contiene las acciones que se van a llevar a cabo una vez que
    //             se haya haya realizado un metodo HTTP, haya sido exitosa o
    //             no.
    doPost(resource,postdata,actions){
        var onHTTPResponse = actions;
        var xhr = new XMLHttpRequest();

        xhr.open("POST", resource, this.async);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange = function(){
            if(this.readyState == 4){
                if(this.status < 300) onHTTPResponse.onSuccess(xhr);
                else if(this.status < 400) onHTTPResponse.onAppError(xhr);
                else if(this.status < 500) onHTTPResponse.onClientError(xhr);
                else if(this.status < 600) onHTTPResponse.onServerError(xhr);
            }
        };
        xhr.setRequestHeader("Content-type","application/json");
        xhr.send(postdata);
    }
    upload(resource,fileInput,actions){
        var onHTTPResponse = actions;
        var xhr = new XMLHttpRequest();
        var formulario = document.createElement("form");
        var archivo = null;
        formulario.enctype = "multipart/form-data";
        formulario.action = resource;
        formulario.type = "POST";
        archivo = fileInput.cloneNode(true);
        archivo.files = fileInput.files;
        formulario.appendChild(archivo);
        var fileData = new FormData(formulario);
        xhr.open("post", resource, this.async);
        xhr.onreadystatechange = function(){
            if(this.readyState == 4){
                if(this.status < 300) onHTTPResponse.onSuccess(xhr);
                else if(this.status < 400) window.alert("End of the world");
                else if(this.status < 500) onHTTPResponse.onClientError(xhr);
                else if(this.status < 600) onHTTPResponse.onServerError(xhr);
            }
        };
        xhr.send(fileData);
    }
}
