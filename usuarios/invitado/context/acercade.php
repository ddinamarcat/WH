<section class="generic-content gc-width" style="margin-top:40px;">
    <section class="small-box info-sala">
        <article class="sala">
            <img src="img/arrowbox_wh.svg" alt="Boton cambio"/>
            <span class="large-box que-es-wh">
                <h3>&iquest;QU&Eacute; ES WORKING HOUSE?</h3>
                <div>
                    <p>Working House es un espacio dise&ntilde;ado para albergar a trabajadores m&oacute;viles, profesionales freelance y todo aquel que disfrute de una forma de trabajo din&aacute;mica e independiente.</p>
                    <p>La primera casa de Co-Work en Concepci&oacute;n abre sus puertas para ofrecer una alternativa c&oacute;moda y flexible, con espacios que invitan a la conexi&oacute;n, la creatividad y la colaboraci&oacute;n.</p>
                    <p>Working House busca convertirse en una plataforma de negocios, a trav&eacute;s de nuevas din&aacute;micas de trabajo, instancias de participaci&oacute;n y motivaci&oacute;n, adem&aacute;s del acceso a herramientas digitales para todos sus usuarios.</p>
                </div>
            </span>
            <div class="imagen-patron">
                <img src="img/que-es-wh.png"/>
                <div></div>
            </div>
        </article>
    </section>
</section>

<section class="generic-content gc-width grid-size-5">
    <div>
        <article class="grid-cell cell-icon" templateId="aiu-espacioscw" onclick="contextManager.contextList['acercade'].cambiarSubseccion(this.attributes.templateId.value);">
            <div><img src="img/icono2.svg" /></div>
        </article>
        <article class="grid-cell cell-icon" templateId="aiu-espaciosev" onclick="contextManager.contextList['acercade'].cambiarSubseccion(this.attributes.templateId.value);">
            <div><img src="img/icono3.svg" /></div>
        </article>
        <article class="grid-cell cell-icon" templateId="aiu-salareuniones" onclick="contextManager.contextList['acercade'].cambiarSubseccion(this.attributes.templateId.value);">
            <div><img src="img/icono4.svg" /></div>
        </article>
        <article class="grid-cell cell-icon" templateId="aiu-aceleradora" onclick="contextManager.contextList['acercade'].cambiarSubseccion(this.attributes.templateId.value);">
            <div><img src="img/icono5.svg" /></div>
        </article>
        <article class="grid-cell cell-icon" templateId="aiu-cafe" onclick="contextManager.contextList['acercade'].cambiarSubseccion(this.attributes.templateId.value);">
            <div><img src="img/icono1.svg" /></div>
        </article>
    </div>
</section>

<section class="generic-content gc-width">
    <section id="contenido-ad" class="anim-in generic-content gc-width">
        <section class="large-box blackbg-white-text">
            <h2 class="general-title">ESPACIOS DE COWORK</h2>
            <section id="lista-general" class="list-of-articles">

            </section>
            <img src="img/arrowbox_wh.svg" alt="Boton cambio" onclick="contextManager.contextList['acercade'].slide.next();">
        </section>
    </section>
</section>
<template id="aiu-cafe">
    <section class="large-box blackbg-white-text">
        <h2 class="general-title">WH CAF&Eacute;</h2>
        <section id="lista-general" class="list-of-articles">
            <article class="mostrar articulo-general">
                <h3 class="h3-articulo"></h3>
                <p class="descripcion-articulo">Pr&oacute;ximamente</p>
                <span class="small-box imagen-patron">
                    <img src="img/wh-cafe.png"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
        </section>
    </section>
</template>
<template id="aiu-espacioscw">
    <section class="large-box blackbg-white-text">
        <h2 class="general-title">ESPACIOS DE COWORK</h2>
        <section id="lista-general" class="list-of-articles">
            <article class="articulo-general oculto">
                <h3 class="h3-articulo">LOUNGE</h3>
                <p class="descripcion-articulo">&Aacute;rea lounge es la secci&oacute;n de nuestra casa de cowork cuenta con escritorios compartidos para incentivar el ecosistema de trabajo colaborativo. Se aplica a cualquier membres&iacute;as con excepci&oacute;n de la FULL.</p>
                <span class="small-box imagen-patron">
                    <img src="img/lounge2.jpg"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
            <article class="articulo-general oculto">
                <h3 class="h3-articulo">WORKCENTER</h3>
                <p class="descripcion-articulo">&Aacute;rea de nuestro cowork en la que cada cual tiene su escritorio, designados seg&uacute;n la combinaci&oacute;n entre los requerimientos del cliente y la disponibilidad al momento de integrarse al cowork.</p>
                <span class="small-box imagen-patron">
                    <img src="img/workcenter1.jpg"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
        </section>
        <img src="img/arrowbox_wh.svg" alt="Boton cambio" onclick="contextManager.contextList['acercade'].slide.next();">
    </section>
</template>
<template id="aiu-espaciosev">
    <section class="large-box blackbg-white-text">
        <h2 class="general-title">ESPACIOS PARA EVENTOS</h2>
        <section id="lista-general" class="list-of-articles">
            <article class="articulo-general mostrar">
                <h3 class="h3-articulo">GARAGE ROOM</h3>
                <p class="descripcion-articulo">Tiene capacidad m&aacute;xima de 30 personas equipado con Proyector de Alta definici&oacute;n, Pizarra y mobiliario. Internet WIFI y acceso independiente. Se ofrece servicio de Coffee Break y Kit Tecnol&oacute;gico con costo adicional y previa reserva.</p>
                <p class="info-articulo"><span>Hora: </span>$14.900</p>
                <p class="info-articulo"><span>Medio día: </span>$44.700 /  (9:15-14:15hrs) / (14:15-19:15hrs)</p>
                <p class="info-articulo"><span>Dia completo (10hrs): </span>$74.500</p>
                <span class="small-box imagen-patron">
                    <img src="img/garage-room.jpg"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
        </section>
    </section>
</template>
<template id="aiu-salareuniones">
    <section class="large-box blackbg-white-text">
        <h2 class="general-title">SALAS DE REUNIONES</h2>
        <section id="lista-general" class="list-of-articles">
            <article class="articulo-general oculto">
                <h3 class="h3-articulo">R8</h3>
                <p class="descripcion-articulo">
Sala acondicionada para reuniones de ocho personas con pantalla LED Alta Definición de 48″. Incluye pizarra y acceso internet WIFI. Se ofrece servicio de Coffee Break y Kit Tecnológico con costo adicional y previa reserva.</p>
                <p class="info-articulo"><span>Hora: </span>$8.900</p>
                <p class="info-articulo"><span>Medio día: </span>$35.600 / Mañana (9:15-14:15hrs) / Tarde (14:15-19:15hrs)</p>
                <p class="info-articulo"><span>Dia completo (10hrs): </span>$53.400</p>
                <span class="small-box imagen-patron">
                    <img src="img/salar8.jpg"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
            <article class="articulo-general oculto">
                <h3 class="h3-articulo">R6</h3>
                <p class="descripcion-articulo">
Espacio ideal para reuniones peque&ntilde;as. Su capacidad es para seis personas, y provee pizarra y acceso internet WIFI. Se ofrece servicio de Coffee Break y Kit Tecnol&oacute;gico con costo adicional y previa reserva.</p>
                <p class="info-articulo"><span>Hora: </span>$5.900</p>
                <p class="info-articulo"><span>Medio día: </span>$23.600 / Mañana (9:15-14:15hrs) / Tarde (14:15-19:15hrs)</p>
                <p class="info-articulo"><span>Dia completo (10hrs): </span>$35.400</p>
                <span class="small-box imagen-patron">
                    <img src="img/salar6.jpg"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
        </section>
        <img src="img/arrowbox_wh.svg" alt="Boton cambio" onclick="contextManager.contextList['acercade'].slide.next();">
    </section>
</template>
<template id="aiu-aceleradora">
    <section class="large-box blackbg-white-text">
        <h2 class="general-title">WORKSHOP SESSIONS</h2>
        <section id="lista-general" class="list-of-articles">
            <article class="articulo-general mostrar">
                <h3 class="h3-articulo"></h3>
                <p class="descripcion-articulo">
                        Programa de asesor&iacute;a de negocios que Working House desarrolla para potenciar el ecosistema de emprendimiento en la región del Biobío.
                        Consta de siete sesiones donde distintos mentores les darán las herramientas prácticas para fortalecer su propuesta de negocio y hacerla viable en el tiempo. El objetivo final es que los proyectos postulen a fondos públicos a través de patrocinadores o incubadoras nacionales y/o puedan levantar financiamiento privado por medio de inversionistas y dar inicio a sus proyectos. </p>
                <span class="small-box imagen-patron">
                    <img src="img/ws.png"/>
                    <div></div>
                </span>
                <p class="fecha-principal"></p>
            </article>
        </section>
    </section>
</template>
