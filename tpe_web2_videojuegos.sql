-- Created by Redgate Data Modeler (https://datamodeler.redgate-platform.com)
-- Last modification date: 2026-04-30 23:28:30.619
-- tables
-- Table: EDITOR
CREATE TABLE EDITOR (
    id_editor int NOT NULL AUTO_INCREMENT,
    nombre_empresa varchar(50) NOT NULL,
    pais varchar(20) NOT NULL,
    sitio_web varchar(100) NOT NULL,
    CONSTRAINT UK_NOMBRE_EMPRESA_EDITOR UNIQUE (nombre_empresa),
    CONSTRAINT PK_EDITOR PRIMARY KEY (id_editor)
);
-- Table: VIDEO_JUEGO
CREATE TABLE VIDEO_JUEGO (
    id_juego int NOT NULL AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    descripcion text NOT NULL,
    precio decimal(6, 2) NOT NULL,
    fecha_lanzamiento date NOT NULL,
    FK_id_editor int NOT NULL,
    CONSTRAINT PK_VIDEO_JUEGO PRIMARY KEY (id_juego),
    CONSTRAINT UK_TITULO_JUEGO UNIQUE (titulo),
    CONSTRAINT CK_PRECIO_POSITIVO CHECK (precio >= 0)
);
-- foreign keys
-- Reference: VIDEO_JUEGO_EDITOR (table: VIDEO_JUEGO)
ALTER TABLE VIDEO_JUEGO
ADD CONSTRAINT VIDEO_JUEGO_EDITOR FOREIGN KEY (FK_id_editor) REFERENCES EDITOR (id_editor) ON DELETE RESTRICT;
-- End of file.