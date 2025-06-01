@extends('layouts.layoutDash')
@section('title', 'Registro de Comedor')
@section('links')
    <a href="{{ route('R_comedor') }}" class="navbar-brand nav-link">Registro de Comedor/</a>
@endsection

@section('content')
    @section('titulo', 'Registro de Comedor')
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .btn-minimal {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 0.25rem;
            border: 1px solid transparent;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            line-height: 1.5;
            font-family: 'Segoe UI', Roboto, sans-serif;
            cursor: pointer;
        }
        
        .btn-icon-right {
            flex-direction: row-reverse;
        }
        
        .material-symbols-outlined {
            font-size: 1.1rem;
            vertical-align: middle;
        }
        
        /* Botón Cancelar - Gris (acción neutra) */
        .btn-cancel {
            background-color: #f5f5f5;
            color: #616161;
            border: 1px solid #e0e0e0;
        }
        .btn-cancel:hover {
            background-color: #eeeeee;
        }
        
        /* Botón Editar - Azul */
        .btn-edit { background-color: #e3f2fd; color: #1976d2; }
        .btn-edit:hover { background-color: #bbdefb; }
        
        /* Botón Eliminar - Rojo */
        .btn-delete { background-color: #ffebee; color: #d32f2f; }
        .btn-delete:hover { background-color: #ffcdd2; }
        
        /* Botón Guardar - Verde */
        .btn-save { background-color: #e8f5e9; color: #388e3c; }
        .btn-save:hover { background-color: #c8e6c9; }
        
        /* Botón Añadir - Morado */
        .btn-add { background-color: #f3e5f5; color: #7b1fa2; }
        .btn-add:hover { background-color: #e1bee7; }
        
        /* Botón Descargar - Naranja */
        .btn-download { background-color: #fff3e0; color: #f57c00; }
        .btn-download:hover { background-color: #ffe0b2; }
    </style>
</head>
<body>
    <div class="container py-4">
        <h4 class="mb-4">Set Completo de Botones</h4>
        
        <div class="d-flex flex-wrap gap-2 mb-4">
            <!-- Botón Cancelar -->
            <button class="btn-minimal btn-cancel">
                <span class="material-symbols-outlined">close</span>
                Cancelar
            </button>
            
            <!-- Botón Guardar -->
            <button class="btn-minimal btn-save">
                <span class="material-symbols-outlined">save</span>
                Guardar
            </button>
            
            <!-- Botón Editar -->
            <button class="btn-minimal btn-edit">
                <span class="material-symbols-outlined">edit</span>
                Editar
            </button>
            
            <!-- Botón Eliminar -->
            <button class="btn-minimal btn-delete">
                <span class="material-symbols-outlined">delete</span>
                Eliminar
            </button>
        </div>
        
        <h4 class="mt-5 mb-3">Ejemplo de Formulario</h4>
        <div class="card p-3" style="max-width: 500px;">
            <div class="mb-3">
                <label class="form-label">Nombre del proyecto</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <button class="btn-minimal btn-cancel btn-icon-right">
                    Cancelar
                    <span class="material-symbols-outlined">close</span>
                </button>
                <button class="btn-minimal btn-save btn-icon-right">
                    Guardar cambios
                    <span class="material-symbols-outlined">save</span>
                </button>
            </div>
        </div>
        
        <h4 class="mt-5 mb-3">Variantes de Iconos</h4>
        <div class="d-flex flex-wrap gap-2">
            <!-- Cancelar con icono a la derecha -->
            <button class="btn-minimal btn-cancel btn-icon-right">
                Descartar
                <span class="material-symbols-outlined">cancel</span>
            </button>
            
            <!-- Versión compacta (solo icono) -->
            <button class="btn-minimal btn-cancel" title="Cancelar">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <!-- Alternativa con otro icono -->
            <button class="btn-minimal btn-cancel">
                <span class="material-symbols-outlined">undo</span>
                Revertir
            </button>
        </div>
    </div>
@endsection