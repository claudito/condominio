-- drop trigger add_permiso_submenu
DELIMITER //

CREATE TRIGGER add_permiso_submenu
AFTER INSERT
   ON submenu FOR EACH ROW

BEGIN

INSERT INTO permiso_submenu(id_submenu,id_usuario)
SELECT new.id,u.id FROM usuario as u;

END

//


DROP trigger delete_permiso_submenu;

DELIMITER //

CREATE TRIGGER delete_permiso_submenu
AFTER DELETE
   ON submenu FOR EACH ROW

BEGIN

DELETE FROM permiso_submenu WHERE  id_submenu=old.id;

END




DELIMITER //
CREATE TRIGGER add_inquilino
AFTER INSERT
   ON propietario FOR EACH ROW
BEGIN
IF (new.tipo='SI')THEN
INSERT INTO inquilino(codigo_departamento,nombres,apellidos,dni,ruc,direccion,telefono,celular,correo,comentario)
VALUES(new.codigo_departamento,new.nombres,new.apellidos,new.dni,new.ruc,new.direccion,new.telefono,new.celular,new.correo,new.comentario);
else
INSERT INTO inquilino(codigo_departamento)VALUES(new.codigo_departamento);
END IF;

END //



INSERT INTO propietario(codigo_departamento,nombres,apellidos,dni,ruc,direccion,
	telefono,celular,correo,comentario,tipo)VALUES('1101','Luis',
	'Claudio','46794282','10467942820','SJL','997935085','997935085','megabyte1507@gmail.com',
	'--','SI')


DELIMITER //
CREATE TRIGGER add_permiso
AFTER INSERT
   ON usuario FOR EACH ROW

BEGIN

 INSERT  INTO permiso_submenu(id_submenu,id_usuario)
 SELECT sm.id,new.id from submenu as sm;

END; //



DELIMITER //
CREATE TRIGGER update_correlativo_propietario
AFTER INSERT
   ON propietario FOR EACH ROW
BEGIN

UPDATE correlativo SET numero=numero+1  WHERE codigo='PROP';

END; //