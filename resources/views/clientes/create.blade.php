<h3>Novo Cliente</h3>

<form action="{{ route('clientes.store') }}" method="POST">       <!-- essa rota requer um método POST -->
    @csrf
    <input type="text" name="nome">  <!-- sempre precisa de um input name para o servidor lembrar -->
    <button>Salvar</button>
</form>