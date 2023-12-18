USE superhero;

SELECT * FROM superhero;
SELECT * FROm colour;
SELECT * FROM race;
-- CANTIDAD DE SUPERHEROES
SELECT  COUNT(*) 'total' FROM superhero;

-- MOSTRAR CLAVE PRIMARIA, NOMBRE Y COLOR DE OJOS | Consulta multitabla => Utilizar pseudónimos, alias
-- CUIDADO: Solo debemos utilizar INNER JOIN con FK NOT NULL
-- Para FK NULL, utilizar LEFT JOIN
SELECT 
	SUP.id, 
    SUP.superhero_name, 
    COL.colour
	FROM superhero SUP
	INNER JOIN colour COL ON SUP.eye_colour_id = COL.id;

-- ¿Cuántos superheroes existen de acuerdo al color de ojo? | Consultas de resumen
-- ELIMInAR LAS PK
-- Identificar los campos redundantes
SELECT 
    COL.colour,
    COUNT(SUP.superhero_name) 'total'
	FROM superhero SUP
	INNER JOIN colour COL ON SUP.eye_colour_id = COL.id
    GROUP BY COL.colour;
    
-- Mostrar los superheroes que NO indicaron una raza
SELECT * 
	FROM superhero 
    WHERE race_id IS NULL;

-- Consulta PK, nombre, raza, color piel
SELECT
	SUP.id,
    SUP.superhero_name,
    RAC.race,
    COL.colour
    FROM superhero SUP
    LEFT JOIN race RAC ON SUP.race_id = RAC.id
    INNER JOIN colour COL ON SUP.skin_colour_id = COL.id;

-- Mostrar PK, nombre, color de ojos, color de cabellos y color de piel
SELECT
	SUP.id,
    SUP.superhero_name,
    COL1.colour 'colour_eye',
    COL2.colour 'colour_hair',
    COL3.colour 'colour_skin'
    FROM superhero SUP
    INNER JOIN colour COL1 ON SUP.eye_colour_id = COL1.id
    INNER JOIN colour COL2 ON SUP.hair_colour_id = COL2.id
    INNER JOIN colour COL3 ON SUP.skin_colour_id = COL3.id;
    
-- MOSTRAR LOS SUPERHEROES DE TODAS LAS CASAS PUBLICADORAS a excepción de 3, 7, 9, 23, 25
SELECT
	id,
	superhero_name,
    publisher_id
    FROM superhero
    WHERE publisher_id NOT IN (3, 7, 9, 23, 25);

-- Mostrar los superheroes cuyo nombre inicie con la letra S
-- Búsqueda exacta  =
-- Búsqueda aproximada 
SELECT 
	id,
    superhero_name
    FROM superhero
    WHERE superhero_name LIKE 'S%';

-- Mostrrar los superheroes que tenga una N como ultimo caracter de nombre
SELECT 
	id,
    superhero_name
    FROM superhero
    WHERE superhero_name LIKE '%N';

-- Mostrar los superheroes que su primera letra sea B, la última sea una N
SELECT 
	id,
    superhero_name
    FROM superhero
    WHERE superhero_name LIKE 'B%N';

-- Mostrar superheroes que contengan letras "HAR" en cualquier parte del nombre
SELECT 
	id,
    superhero_name
    FROM superhero
    WHERE superhero_name LIKE '%HAR%';

-- Mostrar nombre de superheroes que inicien con una vocal
SELECT 
	id,
    superhero_name
    FROM superhero
    WHERE 
		superhero_name LIKE 'a%' OR
        superhero_name LIKE 'e%' OR 
        superhero_name LIKE 'i%' OR 
        superhero_name LIKE 'o%' OR 
        superhero_name LIKE 'u%';

-- Mostrar nombre de superheroe que NO inicie con una vocal.
SELECT *
    FROM superhero
    WHERE 
		superhero_name NOT LIKE 'a%' AND 
        superhero_name NOT LIKE 'e%' AND 
        superhero_name NOT LIKE 'i%' AND 
        superhero_name NOT LIKE 'o%' AND 
        superhero_name NOT LIKE 'u%';

-- MOSTRAR NOMBRE DE SUPERHEROE QUE NO FINALICE EN UNA VOCAL
SELECT *
	FROM superhero
    WHERE
		superhero_name NOT LIKE '%A' AND
        superhero_name NOT LIKE '%E' AND 
        superhero_name NOT LIKE '%I' AND 
        superhero_name NOT LIKE '%O' AND 
        superhero_name NOT LIKE '%U';
        
-- Mostrar superheroes que tenga una estatura superior o igual a 100 pero inferior a 200
SELECT * 
	FROM superhero
	WHERE
		height_cm >= 100 AND height_cm < 200;

SELECT *
	FROM superhero
    WHERE
		height_cm BETWEEN 100 AND 200;

-- Mostrar los superheroes cuya raza inicie con cualquier letra a excepción de la A
SELECT 
	SUP.id,
    SUP.superhero_name,
    RAC.race
    FROM superhero SUP
    INNER JOIN race RAC ON SUP.race_id =  RAC.id
    WHERE RAC.race NOT LIKE('A%');

-- Mostrar los 10 primero superhero con mayor peso
SELECT *
	FROM superhero
    WHERE 
		weight_kg IS NOT NULL AND
        weight_kg > 0 
    ORDER BY weight_kg DESC
    LIMIT 10;

-- Mostrar los 5 superheroes más bajos (Excepcion de los null i 0)
SELECT *
	FROM superhero
    WHERE 
		height_cm IS NOT NULL AND
        height_cm > 0 
    ORDER BY height_cm
    LIMIT 5;
		

SELECT * FROM superhero;
SELECT * FROM race;    