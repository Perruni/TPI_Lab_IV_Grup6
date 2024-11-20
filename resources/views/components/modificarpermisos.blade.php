@props(['permiso'])

<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
          </svg>
       
    </button>

    <form action="{{ route('actualizar-permisos') }}" method="POST" class="dropdown-menu">
        @csrf
        <input type="hidden" name="invitado_id" value="{{ $invitadoId }}">
        <input type="hidden" name="event_id" value="{{ $eventId }}">

        <div class="col-md-6 mb-3">
            <label for="permiso">Modificar Permisos</label>
            <div>
                <input type="checkbox" id="verEvento" name="permisos[]"
                @if ($permiso->verEvento)
                checked
                @endif
                value="verEvento">                
                <label for="verEvento">Ver Evento</label>
            </div>
            <div>
                <input type="checkbox" id="invitar" name="permisos[]"
                @if ($permiso->invitar)
                checked
                @endif
                value="invitar">
                <label for="invitar">Invitar</label>
            </div>
            <div>
                <input type="checkbox" id="eliminarInvitado" name="permisos[]"
                @if($permiso->eliminarIvitado)
                checked
                @endif
                value="eliminarInvitado">
                <label for="eliminarInvitado">Eliminar Invitado</label>
            </div>
            <div>
                <input type="checkbox" id="modificar" name="permisos[]"
                @if($permiso->modificar)
                checked
                @endif
                value="modificar">
                <label for="modificar">Modificar Evento</label>
            </div>
            <div>
                <input type="checkbox" id="eliminarEvento" name="permisos[]"
                @if($permiso->eliminarEvento)
                checked
                @endif
                value="eliminarEvento">
                <label for="eliminarEvento">Eliminar Evento</label>
            </div>
            <div>
                <input type="checkbox" id="darPermisos" name="permisos[]"
                @if($permiso->darPermisos)
                checked
                @endif
                value="darPermisos">
                <label for="darPermisos">Dar Permisos</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Permisos</button>
    </form>
</div>