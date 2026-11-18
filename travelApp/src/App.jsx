import { useState } from 'react';
import Navbar from './components/Navbar';
import DestinoCard from './components/DestinoCard';
import './App.css';

function App() {

  const destinos = [
    {
      id: 1,
      nombre: 'Cancún',
      ubicacion: 'México',
      categoria: 'Playa',
      precio: '$5,500 MXN',
      descripcion: 'Disfruta de sus hermosas playas y aguas cristalinas.',
      detalles: 'Visita Playa Delfines, Isla Mujeres y disfruta del mar Caribe.',
      imagen: 'https://images.unsplash.com/photo-1510097467424-192d713fd8b2?w=800'
    },
    {
      id: 2,
      nombre: 'París',
      ubicacion: 'Francia',
      categoria: 'Cultura',
      precio: '$18,000 MXN',
      descripcion: 'Conoce la ciudad del amor y sus monumentos.',
      detalles: 'Visita la Torre Eiffel, el Museo del Louvre y el Arco del Triunfo.',
      imagen: 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=800'
    },
    {
      id: 3,
      nombre: 'Tokio',
      ubicacion: 'Japón',
      categoria: 'Cultura',
      precio: '$25,000 MXN',
      descripcion: 'Explora una ciudad llena de tecnología y tradición.',
      detalles: 'Conoce Shibuya, el templo Senso-ji y sus calles tradicionales.',
      imagen: 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=800'
    },
    {
      id: 4,
      nombre: 'Nueva York',
      ubicacion: 'Estados Unidos',
      categoria: 'Ciudad',
      precio: '$20,000 MXN',
      descripcion: 'Descubre una de las ciudades más famosas del mundo.',
      detalles: 'Visita Times Square, Central Park y la Estatua de la Libertad.',
      imagen: 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=800'
    }
  ];

  const [favoritos, setFavoritos] = useState([]);
  const [busqueda, setBusqueda] = useState('');
  const [detallesAbiertos, setDetallesAbiertos] = useState([]);
  const [mostrarFavoritos, setMostrarFavoritos] = useState(false);

  function agregarFavorito(id) {
    if (favoritos.includes(id)) {
      setFavoritos(favoritos.filter((favorito) => favorito !== id));
    } else {
      setFavoritos([...favoritos, id]);
    }
  }

  function cambiarDetalles(id) {
    if (detallesAbiertos.includes(id)) {
      setDetallesAbiertos(detallesAbiertos.filter((detalle) => detalle !== id));
    } else {
      setDetallesAbiertos([...detallesAbiertos, id]);
    }
  }

  const destinosFiltrados = destinos.filter((destino) => {
    const coincideBusqueda = destino.nombre.toLowerCase().includes(busqueda.toLowerCase());
    const coincideFavorito = !mostrarFavoritos || favoritos.includes(destino.id);

    return coincideBusqueda && coincideFavorito;
  });

  return (
    <div>
      <Navbar />

      <main className="contenedor" id="inicio">

        <section className="banner">
          <h1>Descubre tu próximo destino</h1>
          <p>Explora lugares increíbles y planea tus próximas vacaciones.</p>
        </section>

        <section className="favoritos-resumen" id="favoritos">
          <div>
            <h3>Destinos favoritos</h3>
            <p>Tu próxima aventura comienza aquí.</p>
          </div>

          <strong>{favoritos.length}</strong>
        </section>

        <section id="destinos">
          <h2>Explora destinos turísticos</h2>

          <input
            className="buscador"
            type="text"
            placeholder="Buscar destino turístico..."
            value={busqueda}
            onChange={(e) => setBusqueda(e.target.value)}
          />

          <button
            className="boton-favoritos"
            onClick={() => setMostrarFavoritos(!mostrarFavoritos)}
          >
            {mostrarFavoritos ? 'Mostrar todos' : 'Mostrar favoritos'}
          </button>

          <div className="destinos-container">
            {destinosFiltrados.map((destino) => (
              <DestinoCard
                key={destino.id}
                destino={destino}
                esFavorito={favoritos.includes(destino.id)}
                onFavorito={() => agregarFavorito(destino.id)}
                mostrarDetalles={detallesAbiertos.includes(destino.id)}
                onDetalles={() => cambiarDetalles(destino.id)}
              />
            ))}
          </div>

          {destinosFiltrados.length === 0 && (
            <p className="sin-resultados">No se encontraron destinos.</p>
          )}

        </section>
      </main>
    </div>
  );
}

export default App;