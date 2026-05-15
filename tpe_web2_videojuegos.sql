create table editor
(
    id_editor      int auto_increment
        primary key,
    nombre_empresa varchar(50)  not null,
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
    id_juego           int auto_increment
        primary key,
    titulo             varchar(50)   not null,
    descripcion        text          not null,
    precio             decimal(6, 2) not null,
    fecha_lanzamiento  date          not null,
    requisitos_sistema text          null,
    valoracion         int           null,
    imagen             varchar(400)  null,
    FK_id_editor       int           not null,
    constraint UK_TITULO_JUEGO
        unique (titulo),
    constraint VIDEO_JUEGO_EDITOR
        foreign key (FK_id_editor) references editor (id_editor),
    constraint CK_PRECIO_POSITIVO
        check (`precio` >= 0),
    constraint CK_VALORACION
        check (`valoracion` between 0 and 5)
);

