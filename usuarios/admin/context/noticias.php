<section class="generic-content fixed-sub-menu">
    <div class="sub-menu-header gc-width">
        <h2 class="header-h2 h2-miembros">NOTICIAS DE <span>WORKING HOUSE</span></h2>
        <input type="button" name="nuevousuario" class="boton-agregar" value="+ NUEVO" onclick="FormManager.crearNoticia();"/>
    </div>
</section>
<section class="grid-content grid-size-noticias separador-vertical" style="margin-top:100px;">
    <div>
        <article class="grid-cell noticias">
            <h2 class="en-header"><span>Noticias</span></h2>
            <div>
                <ul id="lista-noticias">
                </ul>
            </div>
            <div>
                <div>
                    <h2>Destacado</h2>
                </div>
                <ul id="noticias-destacadas">
                </ul>
            </div>
        </article>
    </div>
</section>
<template id="noticia-modal">
    <section class="noticia-modal">
        <figure class="preview-modal">
            <img class="preview" src="img/eventos/trevor.png" alt="afiche"/>
        </figure>
        <form method="POST" action="noticias/guardar.php" class="tnoticia-modal">
            <input type="text" name="fechaPublicacion" class="editable publicacion-modal" autocomplete="off"/>
            <input type="text" name="titulo" class="editable h2-noticia-modal" autocomplete="off"/>
            <div id="pnoticia-modal" class="pnoticia-modal">
                <textarea name="descripcion" class="editable" value="" autocomplete="off"></textarea>
            </div>
            <p class="publicado-por"><span>Publicado por: </span></p>
            <p class="autor-noticia"></p>

            <div class="botones-noticia">
                <input type="button" class="boton-inscripcion edit-button boton-guardar" value="GUARDAR" onclick="FormManager.guardarNoticia(this)"/>
                <div class="boton-estado">
                    <input class="editable estado-noticia" type="checkbox" name="estado" value="1"/>
                    <label for="estado" class="label-estado">P&Uacute;BLICO</label>
                </div>
                <div class="boton-estado">
                    <input class="editable destacado-noticia" type="checkbox" name="destacado" value="1"/>
                    <label for="estado" class="label-estado">DESTACADO</label>
                </div>
                <div class="boton-archivo btn btn-primary cambiar-imagen">
                    <span><p>CAMBIAR IMAGEN</p></span>
                    <input type="file" name="afiche" class="archivo" imgTarget="preview" autocomplete="off" value=""/>
                </div>
                <input class="idnoticia editable" type="hidden" name="idnoticia" value=""/>
            </div>
            <input type="hidden" name="urlAfiche" class="urlAfiche editable" value=""/>
            <input type="hidden" name="urlImagenHome" class="urlImagenHome editable" value=""/>
            <input type="hidden" name="urlThumbnail" class="urlThumbnail editable" value=""/>
        </form>
    </section>
</template>
