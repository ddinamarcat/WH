<section class="generic-content fixed-sub-menu">
    <div class="sub-menu-header gc-width">
        <h2 class="header-h2 h2-miembros">EVENTOS DE <span>WORKING HOUSE</span></h2>
        <input type="button" name="nuevousuario" class="boton-agregar" value="+ NUEVO" onclick="FormManager.crearEvento();"/>
    </div>
</section>
<section class="grid-content grid-size-eventos separador-vertical grid-eventos" style="margin-top:100px;">
    <div>
        <article class="grid-cell eventos hidden" style="display:none;">
            <div>
                <h2>Nada</h2>
            </div>
            <ul id="dia-eventos">
            </ul>
        </article>
        <article class="grid-cell eventos" style="display:none;">
            <h2 class="en-header">Eventos <span>actuales</span></h2>
            <ul id="act-eventos">
            </ul>
        </article>
        <article class="grid-cell eventos">
            <h2 class="en-header">Eventos <span>pr&oacute;ximos</span></h2>
            <ul id="prox-eventos">
            </ul>
        </article>
        <article class="grid-cell eventos">
            <h2 class="en-header">Eventos <span>pasados</span></h2>
            <ul id="pas-eventos">
            </ul>
        </article>
    </div>
</section>
<section class="grid-content grid-size-eventos separador-vertical grid-eventos">
    <div>
        <div id="calendario" class="calendario-wraper"></div>
    </div>
</section>
<template id="evento-modal">
    <section>
        <figure class="afiche-modal">
            <img class="preview" src="img/eventos/trevor.png" alt="afiche"/>
            <div class="boton-archivo btn btn-primary" style="float:none;position:absolute;left:0px;bottom:0px;">
                <span><p>CAMBIAR IMAGEN</p></span>
                <input type="file" name="afiche" class="editable archivo" imgTarget="preview" autocomplete="off" value=""/>
            </div>
        </figure>
        <form method="POST" action="eventos/guardar.php" class="tevento-modal">
            <input type="text" name="titulo" id="h2-evento-modal" class="editable" autocomplete="off"/>
            <div id="pevento-modal" class="pevento-modal">
                <textarea name="descripcion" class="editable" value="" autocomplete="off"></textarea>
            </div>
            <div id="inievento-modal" class="devento-modal">
                <p><span>Inicio: </span></p>
                <input type="text" name="inicio" class="editable" autocomplete="off"/>
            </div>
            <div id="finevento-modal" class="devento-modal">
                <p><span>Fin: </span></p>
                <input type="text" name="fin" class="editable" value="" autocomplete="off"/>
            </div>
            <div id="expevento-modal" class="devento-modal">
                <p><span>Expone(n): </span></p>
                <input class="editable" name="participantes" value="" autocomplete="off"/>
            </div>
            <div id="valevento-modal" class="devento-modal">
                <p><span>Valor: </span></p>
                <input class="editable" name="valor" inputType="currency" currencyType="CLP" value="" autocomplete="off"/>
            </div>
            <div id="cupevento-modal" class="devento-modal">
                <p><span>Cupos: </span></p>
                <input type="text" name="cupos" class="editable" value="" autocomplete="off"/>
            </div>
            <div id="idievento-modal" class="devento-modal">
                <p><span>Idioma: </span></p>
                <input type="text" name="idioma" class="editable" value="" autocomplete="off"/>
            </div>
            <div id="lugevento-modal" class="devento-modal">
                <p><span>Lugar: </span></p>
                <input type="text" name="lugar" class="editable" value="" autocomplete="off"/>
            </div>
            <div id="orgevento-modal" class="devento-modal oevento-modal">
                <p><span>Organiza: </span></p>
                <input type="text" class="editable" name="organizado" value="" autocomplete="off"/>
            </div>
            <div id="insevento-modal" class="devento-modal oevento-modal">
                <p><span>Inscripcion: </span></p>
                <input type="text" class="editable" name="urlinscripcion" value="" autocomplete="off"/>
            </div>
            <div class="botones-evento">
                <input type="button" class="boton-inscripcion edit-button boton-guardar" value="GUARDAR" onclick="FormManager.guardar(this)"/>
                <div class="boton-estado">
                    <input class="editable estado-evento" type="checkbox" name="estado" value="1"/>
                    <label for="estado" class="label-estado">P&Uacute;BLICO</label>
                </div>
                <div class="boton-estado">
                    <input class="editable destacado-evento" type="checkbox" name="destacado" value="1"/>
                    <label for="estado" class="label-estado">DESTACADO</label>
                </div>
                <input class="idevento editable" type="hidden" name="idevento" value=""/>
            </div>
            <input type="hidden" name="urlAfiche" class="urlAfiche editable" value=""/>
            <input type="hidden" name="urlImagenHome" class="urlImagenHome editable" value=""/>
            <input type="hidden" name="urlThumbnail" class="urlThumbnail editable" value=""/>
        </form>
    </section>
</template>
