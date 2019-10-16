class UserManager{
    constructor(){
        this.listaDeUsuarios = usuarios;
    }
    generarUsuario(urlImagen, nombreUsuario, tipoUsuario){
        var usuario = document.createElement("div");
        usuario.classList.add("miembro");

        var figure = document.createElement("figure");
        usuario.appendChild(figure);

        var image = document.createElement("img");
        image.src = urlImagen;
        image.alt = "Miembro";
        figure.appendChild(image);

        var nombre = document.createElement("p");
        nombre.classList.add("nombre");
        nombre.innerHTML = nombreUsuario;
        usuario.appendChild(nombre);

        var tipo = document.createElement("p");
        tipo.innerHTML = tipoUsuario;
        usuario.appendChild(tipo);

        var botonBorrar = document.createElement("img");
        botonBorrar.src="img/boton-borrar.png";
        botonBorrar.alt="Eliminar usuario";
        botonBorrar.classList.add("boton-borrar");
        botonBorrar.classList.add("borrar-usuario");
        botonBorrar.addEventListener("click",function(){
            window.alert("Borrando...");
        });
        usuario.appendChild(botonBorrar);
        return usuario;

    }

    generarListaDeUsuarios(){
        var total = this.listaDeUsuarios.length;
        var i = 0;
        var contenedor = document.querySelector(".lista-de-usuarios");
        while(contenedor.firstChild) contenedor.removeChild(contenedor.firstChild);
        var usuario = null;
        var tipoUsuario = "challa";
        for(i = 0; i < total; i++){
            usuario = this.listaDeUsuarios[i];
            if(usuario.tipo == 1) tipoUsuario = "Administrador";
            contenedor.appendChild(this.generarUsuario(usuario.urlImagen, usuario.nombre+" "+usuario.apellido,tipoUsuario));
        }
    }
}
