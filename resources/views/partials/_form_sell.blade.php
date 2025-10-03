@if ($errors->any())
    <div class="alert alert-danger">
        Houve alguns problemas com os dados enviados.
    </div>
@endif

<h5>Informações do cliente</h5>
<div class="form-group">
    <label for="name">Nome do cliente</label>
    <input type="text" class="form-control" name="client_name" id="name" value="{{ old('client_name', $product_sell->client_name ?? '') }}">
    @error('client_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="client_email" id="email" value="{{ old('client_email', $product_sell->client_email ?? '') }}">
    @error('client_email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" name="client_cpf" id="cpf" placeholder="99999999999" value="{{ old('client_cpf', $product_sell->client_cpf ?? '') }}">
    @error('client_cpf')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<h5 class='mt-5'>Informações da venda</h5>
<div class="form-group">
    <label for="product">Produto</label>
    <select id="product" name="product_id" class="form-control">
        <option value="">Escolha...</option>
        
        @foreach ($products as $product)
            <option value="{{ $product->id }}" 
                {{ (old('product_id', $product_sell->product_id ?? '') == $product->id) ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="date">Data</label>
    <input type="text" class="form-control single_date_picker" name="product_sell_date" id="date" value="{{ old('product_sell_date', $product_sell->product_sell_date ?? '') }}">
    @error('product_sell_date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="quantity">Quantidade</label>
    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="1 a 10" value="{{ old('quantity', $product_sell->quantity ?? '') }}">
    @error('quantity')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="discount">Desconto</label>
    <input type="text" class="form-control" name="discount" id="discount" placeholder="100,00 ou menor" value="{{ old('discount', $product_sell->discount ?? '') }}">
    @error('discount')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select id="status" name="status" class="form-control">
        <option value="">Escolha...</option>
        <option value="Aprovado" {{ (old('status', $product_sell->status ?? '') == 'Aprovado') ? 'selected' : '' }}>Aprovado</option>
        <option value="Cancelado" {{ (old('status', $product_sell->status ?? '') == 'Cancelado') ? 'selected' : '' }}>Cancelado</option>
        <option value="Devolvido" {{ (old('status', $product_sell->status ?? '') == 'Devolvido') ? 'selected' : '' }}>Devolvido</option>
    </select>
</div>