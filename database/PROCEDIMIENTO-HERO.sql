USE superhero;

SELECT * FROM alignment;  -- Bandos

SELECT * FROM attribute; -- Atributos

SELECT * FROM colour;	-- Lista de colores

SELECT * FROM comic;	-- No se utilizará

SELECT * FROM gender;	-- Género

SELECT * FROM publisher; -- Casa publicación

SELECT * FROM race;		-- Razas                                                                                                       

SELECT * FROM superhero;  -- Super heroes

SELECT * FROM superpower;  -- No se utilizará

-- PROCEDIMIENTOS 

DELIMITER $$
CREATE PROCEDURE spu_publisher_buscar(IN _publisher_name VARCHAR(50))
BEGIN
	SELECT 
		SUP.id,
        PUB.publisher_name,
        SUP.superhero_name,
        SUP.full_name,
        GEN.gender,
        RAC.race
		FROM superhero SUP
        INNER JOIN publisher PUB ON PUB.id = SUP.publisher_id
        INNER JOIN gender GEN ON GEN.id = SUP.gender_id
        INNER JOIN race RAC ON RAC.id = SUP.race_id
        WHERE PUB.publisher_name = _publisher_name
        ORDER BY PUB.publisher_name;

END $$

CALL spu_publisher_buscar ("ABC Studios");

DELIMITER $$
CREATE PROCEDURE spu_publisher_listar()
BEGIN
	SELECT 
    id,
    publisher_name
    FROM publisher
    ORDER BY publisher_name;
END $$

CALL spu_publisher_listar;

DELIMITER $$
CREATE PROCEDURE spu_bando_contar()
BEGIN
	SELECT 
    ALI.alignment,
    COUNT(ALI.alignment) cantidad
    FROM superhero SUP
    INNER JOIN alignment ALI ON ALI.id = SUP.alignment_id
    GROUP BY ALI.alignment;
END $$


CALL spu_bando_contar;

DELIMITER $$
CREATE PROCEDURE spu_publisher_contarAlign(IN _publisher_name VARCHAR(50))
BEGIN
	SELECT 
    ALI.alignment,
    COUNT(ALI.alignment) total
    FROM superhero SUP
    INNER JOIN alignment ALI ON ALI.id = SUP.alignment_id
    INNER JOIN publisher PUB ON PUB.id = SUP.publisher_id
    WHERE PUB.publisher_name = _publisher_name
    GROUP BY ALI.alignment;
END $$

CALL spu_publisher_contarAlign ('DC Comics');