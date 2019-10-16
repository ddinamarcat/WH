<section class="generic-content gc-width grid-size-eventos separador-vertical grid-eventos">
    <h2 class="header-h2"><span>EVENTOS</span></h2>
    <div>
        <article class="grid-cell eventos hidden">
            <h2 class="en-header">Nada</h2>
            <ul id="dia-eventos">
            </ul>
        </article>
        <article class="grid-cell eventos">
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
<section class="generic-content gc-width grid-size-eventos separador-vertical grid-eventos">
    <div>
        <div id="calendario" class="calendario-wraper"></div>
    </div>
</section>
<template id="evento-modal">
    <figure id="afiche-modal" class="afiche-modal">
        <img src="img/eventos/trevor.png" alt="afiche">
    </figure>
    <div class="tevento-modal">
        <h2 id="h2-evento-modal" class="editable" inputName="titulo" inputType="title"></h2>
        <div id="pevento-modal" class="pevento-modal">
            <p class="editable" inputName="descripcion" inputType="textarea"></p>
        </div>
        <div id="inievento-modal" class="devento-modal">
            <p><span>Inicio: </span></p>
            <p class="editable" inputName="inicio" inputType="datetime"></p>
        </div>
        <div id="finevento-modal" class="devento-modal">
            <p><span>Fin: </span></p>
            <p class="editable" inputName="fin" inputType="datetime"></p>
        </div>
        <div id="expevento-modal" class="devento-modal">
            <p><span>Expone(n): </span></p>
            <p class="editable" inputName="participantes" inputType="text"></p>
        </div>
        <div id="valevento-modal" class="devento-modal">
            <p><span>Valor: </span></p>
            <p class="editable" inputName="valor" inputType="currency" currencyType="CLP"></p>
        </div>
        <div id="cupevento-modal" class="devento-modal">
            <p><span>Cupos: </span></p>
            <p class="editable" inputName="cupos" inputType="number"></p>
        </div>
        <div id="orgevento-modal" class="devento-modal oevento-modal">
            <p><span>Organiza: </span></p>
            <p class="editable" inputName="organizado"></p>
        </div>

        <div class="botones-evento">
            <a id="insevento-modal" href="#" class="context-changer boton-inscripcion" templateId="membresia" target="_blank" mark="1">INSCR&Iacute;BETE</a>
            <div class="fb-share">
                <img src="img/boton-fb.png" alt="Logo Facebook"/>
                <p>Compartir</p>
            </div>
        </div>
    </div>
</template>
