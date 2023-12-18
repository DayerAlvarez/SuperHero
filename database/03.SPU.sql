USE superhero;

/* CREAR PROCECDIMIENTO QUE MUESTRE LOS NOMBRES DE SPU DE ACUERDO A UN PRIMER CARACTER 
INGRESADO COMO VARIABLE */
-- VENTAJA = Reutilización
DELIMITER $$
CREATE PROCEDURE spu_superhero_search_character(IN _character CHAR(1))
BEGIN
	SELECT * FROM superhero
    WHERE superhero_name LIKE(CONCAT(_character,'%'));
END $$

-- BUSQUEDA DE TERMINO DENTRO DEL NOMBRE COMPLETO DEL SUPERHEROE
DELIMITER $$
CREATE PROCEDURE spu_superhero_search(IN _datos VARCHAR(30))
BEGIN
	SELECT * FROM superhero
    WHERE full_name LIKE(CONCAT('%',_datos,'%'));
END $$

-- CREAREMOS UNA VISTA 1 Nunca puede ir variables,order by
CREATE VIEW vs_superhero_full
AS
	SELECT * 
        FROM superhero
        WHERE
			weight_kg IS NOT NULL AND
            weight_kg > 0;

-- PROCEDIMIENTO PARA DEVOVLER LOS N SUPERHEROES MÄS PESADO O MÄS LIGEROS
DELIMITER $$
CREATE PROCEDURE spu_superhero_list_weight
(
	IN _nrows			INT, -- Representa cantidad de regtistrs a recuperar
    IN _type		 	CHAR(1) -- L => Light(Ligero) | H => Heavy(Pesado)
)
BEGIN
	IF _type = 'L' THEN
		SELECT * FROM vs_superhero_full ORDER BY weight_kg LIMIT _nrows;
    END IF;
    
    IF _type = 'H' THEN
		SELECT * FROM vs_superhero_full ORDER BY weight_kg LIMIT _nrows;
    END IF;
END $$

-- REEMPLAZAR FULL NAME '-' POR EL SUPERHERO_NAME
SELECT
	id,
    superhero_name,
    CASE 
		WHEN full_name = '-' OR full_name IS NULL THEN CONCAT(superhero_name, ' X')
        WHEN full_name != '-' THEN full_name
	END 'full_name'
    FROM superhero;

CALL spu_superhero_list_weight(3, 'H');
CALL spu_superhero_weight(1);
CALL spu_superhero_search('sup');
CALL spu_superhero_search_character('R');
SELECT * FROM superhero;
-- Búsqueda de tosos los superheros (FULL_NAME = '-')
SELECT * FROM superhero WHERE full_name = '-';
SELECT * FROM superhero WHERE full_name IS NULL;