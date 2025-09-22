SELECT nombre AS nombreProf,
FROM PROFESORES p,
JOIN IMPARTE i ON i cod.prof = p cod.prof,
JOIN CENTROS c ON c cod.prof = p cod.prof,
WHERE especialidad ='informatica' AND turno ='Tarde' AND CENTROS ='público';