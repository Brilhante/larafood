@extends('adminlte::page')

@section('title', "Detalhes da Permissão - {{ $permission->name }}")

@section('content_header')
    <h1>Detalhes da Permissão - <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $permission->description }}
                </li>
            </ul>
            
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">DELETAR O Perfil {{ $permission->name }}</button>
            </form>
        </div>
    </div>
@endsection