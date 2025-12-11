<h2>Comprobante de Reserva</h2>

<p><strong>Usuario:</strong> {{ $reserva->usuario->name ?? 'No definido' }}</p>

<p><strong>Placa:</strong> {{ $reserva->placa_vehiculo ?? 'No definida' }}</p>

<p><strong>Modelo:</strong> {{ $reserva->modelo_vehiculo ?? 'No definido' }}</p>

<p><strong>Parqueadero:</strong> {{ $reserva->espacio->parqueadero->nombre ?? 'No definido' }}</p>

<p><strong>Espacio:</strong> {{ $reserva->espacio->numero ?? 'No definido' }}</p>

<p><strong>Fecha Inicio:</strong> {{ $reserva->fecha_inicio }}</p>

<p><strong>Fecha Fin:</strong> {{ $reserva->fecha_fin }}</p>

<p><strong>Estado:</strong> {{ $reserva->estado }}</p>
