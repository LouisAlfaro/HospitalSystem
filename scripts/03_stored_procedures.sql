DELIMITER $$

--  hospital_registrar
CREATE PROCEDURE hospital_registrar(
    IN pGerente VARCHAR(255),
    IN pCondicion VARCHAR(255),
    IN pSede VARCHAR(255),
    IN pDistrito VARCHAR(255)
)
BEGIN
    INSERT INTO hospital (gerente, condicion, sede, distrito)
    VALUES (pGerente, pCondicion, pSede, pDistrito);
END $$

--  hospital_actualizar
CREATE PROCEDURE hospital_actualizar(
    IN pId INT,
    IN pGerente VARCHAR(255),
    IN pCondicion VARCHAR(255),
    IN pSede VARCHAR(255),
    IN pDistrito VARCHAR(255)
)
BEGIN
    UPDATE hospital
    SET gerente = pGerente,
        condicion = pCondicion,
        sede = pSede,
        distrito = pDistrito
    WHERE id = pId;
END $$

--  hospital_eliminar
CREATE PROCEDURE hospital_eliminar(
    IN pId INT
)
BEGIN
    DELETE FROM hospital WHERE id = pId;
END $$

--  hospital_listar
CREATE PROCEDURE hospital_listar(
    IN pGerente VARCHAR(255),
    IN pCondicion VARCHAR(255),
    IN pSede VARCHAR(255),
    IN pDistrito VARCHAR(255)
)
BEGIN
    SELECT * FROM hospital
    WHERE (pGerente IS NULL OR pGerente = '' OR gerente LIKE CONCAT('%', pGerente, '%'))
      AND (pCondicion IS NULL OR pCondicion = '' OR condicion LIKE CONCAT('%', pCondicion, '%'))
      AND (pSede IS NULL OR pSede = '' OR sede LIKE CONCAT('%', pSede, '%'))
      AND (pDistrito IS NULL OR pDistrito = '' OR distrito LIKE CONCAT('%', pDistrito, '%'));
END $$

DELIMITER ;
