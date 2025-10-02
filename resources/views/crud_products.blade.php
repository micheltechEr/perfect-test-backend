@extends('layout')

@section('content')
    @php
        $isEdit = isset($product);
    @endphp

    <h1>{{ $isEdit ? 'Editar Produto' : 'Adicionar Produto' }}</h1>

    <div class='card'>
        <div class='card-body'>
            
            <form action="{{ $isEdit ? route('products.update', ['product' => $product->id]) : route('products.store') }}" method="POST">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                @include('partials._form', ['product' => $product ?? null])

                <button type="submit" class="btn btn-primary mt-3">
                    {{ $isEdit ? 'Atualizar Produto' : 'Salvar Produto' }}
                </button>
            </form>

        </div>
    </div>
@endsection