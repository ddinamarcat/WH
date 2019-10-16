<section class="generic-content gc-width grid-size-noticias separador-vertical">
    <h2 class="header-h2 h2-miembros"><span>NOTICIAS</span></h2>
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
                    <li>
                        <div>
                            <h3>Obama destruye Cuba </h3><span>(Sábado 15 de Febrero, 2016)</span>
                        </div>
                        <p>En la madrugada de este Sábado, Obama lanza un misil nuclear en la isla de Cuba, ha sido nefasto y otra cosa otra cosa mas, porque una cosa es una cosa y otra cosa es otra cosa (grandes pensadores). Podemos hackear cualquier hosting y hacerle un ataque DDOS... no se metan con el FBI y mas challa y challa y bla bla bla mas texto y mas texto pñara probar el overflow de este contenedor</p>
                    </li>
                    <li>
                        <div>
                            <h3>Se reconstruye Chile </h3><span>(Martes 7 de Junio, 2016)</span>
                        </div>
                        <p>Chile empieza a progresar debido a que Farkas don&oacute; la cifra de 1.000.000.000.000 de pesos. El gobierno no lo podia creer, algunos dijeron que todo era un plan de la KGB en conjunto con la CIA para volver a poner en el poder a Hitler resucitado. Estan trabajando para traer a Hitler a la vida con una tecnologia no verificable.</p>
                    </li>
                    <li>
                        <div>
                            <h3>Chicotea crea un Holding </h3><span>(Martes 7 de Junio, 2016)</span>
                        </div>

                        <p>La CEO de Chicotea, Fran Juarez, ha anunciado que empezara la conformacion de un holding de empresas asosciados con ECOFOR. En esta mañana la maxima directiva de Chicotea nos ha dado a conocer sus planes: "...ha sido muy facil atraer a empresarios grandes, debido a nuestro exito posicionado en el mercado regional y nacional..."</p>
                    </li>
                </ul>
            </div>
        </article>
    </div>
</section>
<template id="noticia-modal">
    <section class="noticia-modal">
        <figure class="preview-modal">
            <img class="preview" src="img/eventos/trevor.png" alt="afiche"/>
            <div class="boton-archivo btn btn-primary" style="display:none;">
                <span><p>SUBIR</p></span>
                <input type="file" name="afiche" class="editable archivo" imgTarget="preview" autocomplete="off" value=""/>
            </div>
        </figure>
        <form method="POST" action="noticias/guardar.php" class="tnoticia-modal">
            <p class="editable publicacion-modal"></p>
            <h2 class="editable h2-noticia-modal"></h2>
            <p id="pnoticia-modal" class="pnoticia-modal invitado">
            </p>

            <div class="botones-noticia">
                <p class="publicado-por"><span>Publicado por:&nbsp; </span></p>
                <p class="autor-noticia"></p>
                <div class="fb-share" style="float:right;">
                    <img src="img/boton-fb.png" alt="Logo Facebook"/>
                    <p>Compartir</p>
                </div>
            </div>
            <input type="hidden" name="urlAfiche" class="urlAfiche editable" value=""/>
            <input type="hidden" name="urlImagenHome" class="urlImagenHome editable" value=""/>
            <input type="hidden" name="urlThumbnail" class="urlThumbnail editable" value=""/>
        </form>
    </section>
</template>
