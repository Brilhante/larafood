@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
</ol>
    <h1><a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a> Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="270" >Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>
                            {{ $plan->name }}
                        </td>
                        <td>
                            R$ {{ number_format($plan->price, 2, ',', '.')  }}
                        </td>
                        <td style="width= 10rem">
                            <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-sm btn-primary">Detalhes</a>
                            <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-sm btn-warning">VER</a>
                            <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-sm btn-info"><i class="fas fa-address-book"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $plans->appends($filters)->links('vendor.pagination.bootstrap-4') !!}
            @else
            {!! $plans->links('vendor.pagination.bootstrap-4') !!}
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