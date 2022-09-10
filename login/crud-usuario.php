<?php 
	require_once('conexion.php');
	require_once('usuario.php');
	
	class CrudUsuario{

		public function __construct(){}

		// esta funcion inserta los datos del usuario
		public function insertar($usuario){
			$db=DB::conectar();
			$insert=$db->prepare('INSERT INTO USUARIOS VALUES(NULL,:nombre, :clave)');
			$insert->bindValue('nombre',$usuario->getNombre());
			// encripta la clave
			$pass=password_hash($usuario->getClave(),PASSWORD_DEFAULT);
			$insert->bindValue('clave',$pass);
			$insert->execute();
		}

		//esta funcion obtiene el usuario para el login
		public function obtenerUsuario($nombre, $clave){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM USUARIOS WHERE nombre=:nombre'); // AND clave=:clave
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			$usuario=new Usuario();
			// esta condicion verifica si la clave es correcta
			if (password_verify($clave, $registro['clave'])) {				
				// si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setId($registro['Id']);
				$usuario->setNombre($registro['nombre']);
				$usuario->setClave($registro['clave']);
			}			
			return $usuario;
		}

		// esta funcion usca el nombre del usuario si existe y retorna al final la variable usado
		public function buscarUsuario($nombre){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM USUARIOS WHERE nombre=:nombre');
			$select->bindValue('nombre',$nombre);
			$select->execute();
			$registro=$select->fetch();
			if($registro['Id']!=NULL){
				$usado=False;
			}else{
				$usado=True;
			}	
			return $usado;
		}
	}
?>