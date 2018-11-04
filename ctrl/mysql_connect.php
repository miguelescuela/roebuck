<?php
	/*
	- Para SELECT, SHOW, DESCRIBE, EXPLAIN y otras sentencias que retornan un conjunto de resultados, 
	 mysql_query() devuelve un resource en caso de éxito, o FALSE en caso de error.
	- Para otros tipos de sentencias SQL, tales como INSERT, UPDATE, DELETE, DROP, etc, 
	mysql_query() devuelve TRUE(1) en caso de éxito o FALSE(0) en caso de error.
	- El conjunto de resultados devuelto debería ser pasado a mysql_fetch_array(), 
	y otras funciones para manejar las tablas del resultado, para acceder a los datos retornados.
	- Use mysql_num_rows() para averiguar cuántas filas fueron devueltas por la sentencia SELECT, 
	o mysql_affected_rows() para averiguar cuántas filas fueron afectadas por las sentencias DELETE, INSERT, REPLACE, o UPDATE.
	- mysql_query() también fallará y retornará FALSE si el usuario no está autorizado para acceder a la/s tabla/s a la/s que hace referencia la consulta. 	
	*/

	class db{

		private $servidor;
		private $usuario;
		private $password;
		private $bd;
		private $conexion;
		//static private $instancia = NULL;
		static $instance = NULL;

		public function __construct($servidor,$usuario,$password,$bd){
			$this->servidor = $servidor;
			$this->usuario = $usuario;
			$this->password = $password;
			$this->bd = $bd;
		}

		//Función de conexión
		public function conectar(){
			//$this->conexion = mysql_connect($this->servidor,$this->usuario,$this->password) or DIE(mysql_error());
			//mysql_select_db($this->bd, $this->conexion);
		
			$this->conexion = mysql_connect($this->servidor,$this->usuario,$this->password); //or DIE(mysql_error());
			mysql_select_db($this->bd, $this->conexion);
			mysql_query ("SET NAMES 'utf8'");
			if (!$this->conexion) {
				die('Could not connect: ' . mysql_error());
			}
			//echo 'Connected successfully';
		}
			
		public function desconectar(){
			mysql_close($this->conexion);
		}
		
		static public function getInstancia($servidor,$usuario,$password,$bd) {
			if (self::$instancia == NULL) {
				self::$instancia = new db($servidor,$usuario,$password,$bd);
			}
			return self::$instancia;
		}
		
		public static function getInstance($servidor,$usuario,$password,$bd){
			if (!(self::$instance instanceof self)){
				self::$instance=new self($servidor,$usuario,$password,$bd);
			}
			return self::$instance;
		}
		
		public function ejecutar($query){		
			$respuesta = mysql_query($query); // or die (mysql_error());	
			if (!$respuesta) {
				die('Invalid query: ' . mysql_error());
			}
			return $respuesta;	
		}		

		public function obtener_fila($stmt,$fila){
			if ($fila==0){
				$this->array = mysql_fetch_array($stmt);
			}else{
				mysql_data_seek($stmt,$fila);
				$this->array = mysql_fetch_array($stmt);
			}
			return $this->array;
		}
		
		public function fetch_array($stmt){
			return mysql_fetch_array($stmt);
		}

		public function num_rows($stmt){
			return mysql_num_rows($stmt);
		}

}

/*
$db = new MySQL();
$consulta = $db->consulta("SELECT id FROM mitabla1");
if($db->num_rows($consulta)>0){
  while($resultados = $db->fetch_array($consulta)){ 
   echo "ID: ".$resultados['id']."<br />"; 
 }
}
*/
?>