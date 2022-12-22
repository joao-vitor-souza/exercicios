CREATE TABLE `usuarios` ( 
    `cod` INT NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`cod`), 
    UNIQUE (`email`)
    ) ENGINE = InnoDB;