<?php 

	Class Model{

		private $server = "localhost:3306";
		private $username = "root";
		private $password = "";
		private $db = "php_crud";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "Error en la conexion a la base de datos" . $e->getMessage();
			}
		}

		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['password'])) {
					if (!empty($_POST['nombres']) && isset($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['password']) ) {
						
						$nombres = $_POST['nombres'];
						$apellidos = $_POST['apellidos'];
						$telefono = $_POST['telefono'];
						$email = $_POST['email'];
						$contraseña = $_POST['password'];

						$query = "INSERT INTO usuarios (nombres,apellidos,email,telefono,contraseña) VALUES ('$nombres','$apellidos','$email','$telefono','$contraseña')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('usuarios added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		public function fetch(){
			$data = null;

			$query = "SELECT * FROM usuarios";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){

			$query = "DELETE FROM usuarios where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single($id){

			$data = null;

			$query = "SELECT * FROM usuarios WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($id){

			$data = null;

			$query = "SELECT * FROM usuarios WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE usuarios SET nombres='$data[nombres]', apellidos='$data[apellidos]', email='$data[email]', telefono='$data[telefono]', contraseña='$data[password]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>