CREATE TABLE
    `productos`.`imagenes` (
        `COD_PRODUCTO` BIGINT AUTO_INCREMENT NOT NULL,
        `Nombre` VARCHAR(145) NOT NULL,
        `imagen` LONGTEXT NOT NULL,
        `Precio` BIGINT NOT NULL,
        PRIMARY KEY (`COD_PRODUCTO`)
    ) ENGINE = InnoDB;