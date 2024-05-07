
//avance
SELECT usuarios.id_usuario,usuarios.curp, usuarios.tipo,avance.avance FROM usuarios INNER JOIN avance ON usuarios.id_usuario =avance.id_usuario;

