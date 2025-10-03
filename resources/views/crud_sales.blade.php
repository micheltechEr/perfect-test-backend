@extends('layout')

@section('content')
@php
    $isEdit = isset($product_sell);
@endphp
    <h1>{{ $isEdit ? 'Editar Venda' : 'Adicionar Venda' }}</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ $isEdit ? route('product_sell.update', $product_sell->id) : route('product_sell.store') }}" method="POST">
                @if($isEdit)
                    @method('PUT')
                @endif
                @csrf
                @include('partials._form_sell', ['product_sell' => $product_sell ?? null])
                <button type="submit" class="btn btn-primary">
                    {{ $isEdit ? 'Atualizar Venda' : 'Salvar Venda' }}
                </button>
            </form>
        </div>
    </div>
@endsection
