<h1>Detalhes da dúvida {{ $support->id }}</h1>

<a href="{{ route('supports.index') }}">Voltar</a>

<ul>
  <li>Assunto: {{ $support->subject }}</li>
  <li>Status: {{ $support->status }}</li>
  <li>Descrição: {{ $support->body }}</li>
</ul>

<form action="{{ route('supports.destroy', $suppport->id) }}" method="POST">
  @csrf()
  @method('DELETE')
  <button type="submit">Deletar</button>
</form>
