function DestinoCard({ destino, esFavorito, onFavorito, mostrarDetalles, onDetalles }) {
  return (
    <article className="destino-card">

      <img src={destino.imagen} alt={destino.nombre} />

      <div className="destino-info">

        <span className="categoria">{destino.categoria}</span>

        <h3>{destino.nombre}</h3>

        <p className="ubicacion">📍 {destino.ubicacion}</p>

        <p className="precio">Desde {destino.precio}</p>

        {mostrarDetalles && (
          <div className="detalles">
            <p>{destino.descripcion}</p>
            <p>{destino.detalles}</p>
          </div>
        )}

        <div className="botones">
          <button className="boton-agregar" onClick={onFavorito}>
            {esFavorito ? '♥ Quitar favorito' : '♡ Agregar favorito'}
          </button>

          <button className="boton-detalles" onClick={onDetalles}>
            {mostrarDetalles ? 'Ocultar detalles' : 'Ver detalles'}
          </button>
        </div>

      </div>
    </article>
  );
}

export default DestinoCard;