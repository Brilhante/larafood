@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
</ol>
    <h1><a href="{{ route('profiles.create') }}" class="btn btn-dark">ADD</a> Perfis</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250" >Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>
                            {{ $profile->name }}
                        </td>
                        <td style="width= 10rem">
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-sm btn-warning">VER</a>
                            <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-lock"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $profiles->appends($filters)->links('vendor.pagination.bootstrap-4') !!}
            @else
            {!! $profiles->links('vendor.pagination.bootstrap-4') !!}
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop