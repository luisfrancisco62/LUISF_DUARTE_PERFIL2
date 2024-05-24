//PARTE 4: CONOCIMIENTOS EN LINUX Y MANEJO BASE DE DATOS MONGODB

	// Conectarse a la base de datos MongoDB
	use db_programadorestic;

	// Crear una colección llamada productos
	db.createCollection("productos");

	// Insertar al menos tres documentos en la colección productos
	db.productos.insertMany([
		{
			"id": 1,
			"nombre": "Lic.Windows11",
			"precio": 20.00,
			"cantidad": 15
	},
		{
			"id": 2,
			"nombre": "Lic.Office365",
			"precio": 50.00,
			"cantidad": 50
	},
		{
			"id": 3,
			"nombre": "Lic.Kaspersky",
			"precio": 20.00,
			"cantidad": 22
	}
	]);

// FUNCIÓN PARA OBTENER EL PRECIO DE UN PRODUCTO POR SU NOMBRE

	function getPriceByName(name) {
		return db.productos.findOne({"nombre": name})["precio"];
	
	
