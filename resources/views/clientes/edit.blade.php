<h3>Novo Cliente</h3>

<form action="{{ route('clientes.update', $infoCliente['id']) }}" method="POST">       <!-- essa rota requer um método PUT, mas o php não fornece -->
    @csrf
    @method('PUT') <!-- aqui ele transforma o POST em PUT -->
    <input type="text" name="nome" value="{{ $infoCliente['nome'] }}">  <!-- sempre precisa de um input name para o servidor lembrar -->
    <button>Salvar</button>
</form>