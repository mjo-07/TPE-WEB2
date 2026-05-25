create table admin
(
    id_admin        int auto_increment
        primary key,
    nombre_apellido varchar(50)  not null,
    e_mail          varchar(100) not null,
    password        varchar(150) not null
);

create table editor
(
    id_editor      int auto_increment
        primary key,
    nombre_empresa varchar(50)  not null,
    descripcion    text         null,
    pais           varchar(20)  not null,
    sitio_web      varchar(100) not null,
    valoracion     int          null,
    imagen         varchar(400) null,
    constraint UK_NOMBRE_EMPRESA_EDITOR
        unique (nombre_empresa),
    constraint CK_VALORACION_EDITOR
        check (`valoracion` between 0 and 5)
);

create table video_juego
(
    id_juego          int auto_increment
        primary key,
    titulo            varchar(50)   not null,
    descripcion       text          not null,
    precio            decimal(6, 2) not null,
    resenia           text          null,
    fecha_lanzamiento date          not null,
    valoracion        int           null,
    imagen            varchar(400)  null,
    id_editor         int           not null,
    constraint UK_TITULO_JUEGO
        unique (titulo),
    constraint VIDEO_JUEGO_EDITOR
        foreign key (id_editor) references editor (id_editor),
    constraint CK_PRECIO_POSITIVO
        check (`precio` >= 0),
    constraint CK_VALORACION
        check (`valoracion` between 0 and 5)
);

INSERT INTO editor (id_editor, nombre_empresa, descripcion, pais, sitio_web, valoracion, imagen) VALUES (1, 'SCS SOFTWARE', 'SCS Software es una empresa checa de desarrollo de software. Creada en 1997 tiene la sede en Praga, República Checa. La empresa ha producido varios videojuegos para PC y Mac incluyendo la serie 18 Wheels of Steel, la serie Hunting Unlimited, OceanDive, Deer Drive, Bus Driver o Euro Truck Simulator y el último producido, American Truck Simulator. También ha desarrollado varios motores gráficos como Prism3D o Terreng.', 'Republica Checa', 'http://www.scssoft.com', 5, 'https://pbs.twimg.com/media/HDshueDbgAACA1U.jpg');
INSERT INTO editor (id_editor, nombre_empresa, descripcion, pais, sitio_web, valoracion, imagen) VALUES (2, 'ELECTRONIC ARTS', 'Electronic Arts Inc. (EA) es una empresa estadounidense desarrolladora y distribuidora de videojuegos, fundada por Trip Hawkins el 27 de mayo de 1982 en San Mateo, California. Sus oficinas centrales están en Redwood City, California. Tiene estudios en varias ciudades de Estados Unidos, en Canadá, Suecia, Corea del Sur, China, Inglaterra y España y otros países. Posee diversas subsidiarias, como EA Sports, encargada de los simuladores deportivos, EA Worldwide para los demás juegos, y subsidiarias adquiridas durante el tiempo como Firemonkeys Studios, BioWare, entre otras. Actualmente, desarrolla y publica juegos que incluyen los títulos de EA Sports FIFA, Madden NFL, NHL, NBA Live y UFC. Otras franquicias incluyen Battlefield, Need for Speed, Real Racing, Los Sims, Medal of Honor, Command & Conquer, Dead Space, Mass Effect, Dragon Age, Army of Two, Titanfall y Star Wars: The Old Republic, entre otros. Es el creador de EA App, plataformas de distribución digital de juegos en línea para ordenadores en donde se encuentran todos sus juegos.', 'Estados Unidos', 'http://www.ea.com', 5, 'https://media.contentapi.ea.com/content/dam/eacom/images/2019/10/ea-featured-image-generic-brand-logo.png.adapt.crop16x9.1023w.png');
INSERT INTO editor (id_editor, nombre_empresa, descripcion, pais, sitio_web, valoracion, imagen) VALUES (3, 'ACTIVISION', 'Activision Publishing, Inc. es una empresa de videojuegos estadounidense propiedad de Activision Blizzard. Fue el primer desarrollador y distribuidor independiente de este tipo de juegos, fundado el 1 de octubre de 1979 y con sede en Santa Mónica, California. Sus primeros productos fueron cartuchos para la videoconsola Atari 2600; en la actualidad, es la tercera mayor distribuidora de videojuegos, y ha creado diversos títulos, entre ellos Call of Duty. En enero de 2022, Microsoft anunció la compra del propietario de Activision, Activision Blizzard, por 68 700 millones de dólares y finalizó el 13 de octubre de 2023 aunque, la adquisición tuvo sus demoras en el proceso de la compra.', 'Inglaterra', 'http://www.activision.com', 3, 'https://media.licdn.com/dms/image/v2/D4E10AQGdJ2FFDxgKzg/videocover-low/videocover-low/0/1711564928125?e=2147483647&v=beta&t=BH8Kvi4RLp6ot-0xsAtnbAMZoElpEk__-zpx4LjLRjA');
INSERT INTO editor (id_editor, nombre_empresa, descripcion, pais, sitio_web, valoracion, imagen) VALUES (4, 'AMANITA DESING', 'Amanita Design es una compañía checa desarrolladora de videojuegos independientes, que fue fundada en 2003 por Jakub Dvorský. La compañía ha desarrollado varios videojuegos que han ganado los Premios Webby, como juegos educativos, minijuegos y publicidad, todos creados usando Adobe Flash. Su primer juego, Samorost, fue publicado en su página web en el 2003 y su último juego, Happy Game, fue lanzado al mercado en el 2021. Actualmente, su obra más popular es Machinarium, que salió a la venta en el 2009, y fue ganador del premio Excellence in Visual Art, del 12º Independent Festival Games.', 'Estados Unidos', 'http://www.amanita-design.net', 2, 'https://amanita-design.net/img/open-graph/amanita-design-og-image.jpg');
INSERT INTO editor (id_editor, nombre_empresa, descripcion, pais, sitio_web, valoracion, imagen) VALUES (6, 'NINTENDO', 'Nintendo Company, Ltd. (任天堂株式会社 Nintendō Kabushiki-gaisha?) es una empresa de entretenimiento dedicada a la investigación, desarrollo y distribución de software y hardware de videojuegos, y juegos de cartas, con sede en Kioto, Japón.[3] Su origen se remonta a 1889, cuando comenzó a operar como Nintendo Koppai tras ser fundada por el artesano Fusajirō Yamauchi[4] con el objetivo de producir y comercializar naipes hanafuda.[5] Tras incursionar en varias líneas de negocio durante la década de 1960 y adquirir una personalidad jurídica de empresa de capital abierto bajo la denominación actual, en 1977 distribuyó su primera videoconsola en Japón, la Color TV Game 15', 'Japón', 'https://www.nintendo.com', 5, '1779670420_98.webp');


INSERT INTO video_juego (id_juego, titulo, descripcion, precio, resenia, fecha_lanzamiento, valoracion, imagen, id_editor) VALUES (1, 'EURO TRUCK SIMULATOR 2', 'Simulador de conducción de camiones', 10.23, '¡Recorre Europa como el rey de la carretera, un camionero que entrega carga importante a través de distancias impresionantes! Con docenas de ciudades para explorar en el Reino Unido, Bélgica, Alemania, Italia, Países Bajos, Polonia y muchos más, tu resistencia, habilidad y velocidad se pondrán a prueba al máximo. Si tienes lo que se necesita para formar parte de la élite del transporte por carretera, ¡ponte al volante y demuéstralo!', '2012-05-03', 5, 'https://infiniteczechgames.com/wp-content/uploads/2023/11/Euro-Truck-Simulator-2-cover.jpg', 1);
INSERT INTO video_juego (id_juego, titulo, descripcion, precio, resenia, fecha_lanzamiento, valoracion, imagen, id_editor) VALUES (2, 'FC 26', 'Deportes, Fútbol', 89.90, 'Juega a tu manera en EA SPORTS FC™ 26 con regates más ágiles, una posición más inteligente de la IA y movimientos más nítidos y explosivos, todo basado en los comentarios de la comunidad. Los guardametas ahora reaccionan de manera más natural con una posición mejorada, las animaciones son más realistas, y los nuevos estilos de juego y roles de jugadores te ofrecen más formas de definir cómo juega tu equipo.', '2026-02-05', 5, 'https://j-gjuegosdigitales.com/cdn/shop/articles/fifa26_acab26b6-032f-420d-8c7e-d81cc495b795.jpg?v=1748994369', 2);
INSERT INTO video_juego (id_juego, titulo, descripcion, precio, resenia, fecha_lanzamiento, valoracion, imagen, id_editor) VALUES (3, 'CALL OF DUTY', 'Shooter, mundo abierto', 55.90, 'Call of Duty es un juego de disparos en primera persona, que tiene lugar en la Segunda Guerra Mundial. Fue lanzado a la venta el 29 de Octubre del 2003 para PC, publicado por Activision y desarollado por Infinity Ward. Fue la primera entrega de la saga Call of Duty, pero no fue ampliamente comercializado hasta la salida de Call of Duty Classics.', '2003-10-29', 5, 'https://www.callofduty.com/content/dam/atvi/callofduty/cod-touchui/store/games/bo6/Store_BO6PDP_Hero.webp', 3);
INSERT INTO video_juego (id_juego, titulo, descripcion, precio, resenia, fecha_lanzamiento, valoracion, imagen, id_editor) VALUES (4, 'MACHINARIUM', 'Puzzle', 5.60, 'Ayuda a Josef el robot a salvar a su novia Berta, secuestrada por la Hermandad del Sombrero Negro! Machinarium es un galardonado juego de puzle y aventura independiente desarrollado por los creadores de los populares juegos Samorost y Botanicula. Un pequeño robot que ha sido arrojado al desguace detrás de la ciudad debe regresar y enfrentarse a la Hermandad Black Cap y salvar a su amiga robot.', '2010-09-24', 4, 'https://store-images.s-microsoft.com/image/apps.8607.13567422022888456.9ac47249-49ed-4660-a55b-c0332989741f.ea9bcd25-19ba-4fc3-a254-384912fa6312', 4);
INSERT INTO video_juego (id_juego, titulo, descripcion, precio, resenia, fecha_lanzamiento, valoracion, imagen, id_editor) VALUES (6, 'F1 25', 'Simulacíon de conducción de carreras', 45.90, 'F1 25 es un videojuego de carreras desarrollado por Codemasters y publicado por EA Sports. Es la decimoctava entrada en la serie F1 y cuenta con la licencia para los campeonatos de Fórmula 1 y Fórmula 2 de la temporada 2025. El juego se lanzó el 30 de mayo de 2025[nota 1] en ediciones físicas y digitales en PlayStation 5, Microsoft Windows y Xbox Series X|S. El juego marca la primera entrada en un juego de Fórmula 1 que no se lanza en consolas de octava generación desde F1 2014, ya que F1 25 se centra en las consolas de la generación actual.', '2025-03-03', 5, '1779667382_maxresdefault.jpg', 2);
