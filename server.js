const express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');

const app = express();
const port = 3000;

// Middleware
app.use(cors());
app.use(express.json());

// Conectar a la base de datos MongoDB
mongoose.connect('mongodb://localhost:27017/db_programadorestic', { useNewUrlParser: true, useUnifiedTopology: true });

// Definir el esquema y el modelo
const productoSchema = new mongoose.Schema({
    id: Number,
    nombre: String,
    precio: Number,
    cantidad: Number
});

const Producto = mongoose.model('Producto', productoSchema);

// Ruta para obtener todos los productos
app.get('/productos', async (req, res) => {
    try {
        const productos = await Producto.find();
        res.json(productos);
    } catch (error) {
        res.status(500).send(error);
    }
});

app.listen(port, () => {
    console.log(`Servidor corriendo en http://localhost:${port}`);
});


// Ruta para eliminar un producto por ID
app.delete('/productos/:id', async (req, res) => {
    try {
        const producto = await Producto.findOneAndDelete({ id: req.params.id });
        if (!producto) {
            return res.status(404).send();
        }
        res.send(producto);
    } catch (error) {
        res.status(500).send(error);
    }
});
