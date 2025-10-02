@if ($errors->any())
    <div class="alert alert-danger">
        Houve alguns problemas com os dados enviados.
    </div>
@endif

<div class="form-group">
    <label for="name">Nome do Produto</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="price">Preço</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}">
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>