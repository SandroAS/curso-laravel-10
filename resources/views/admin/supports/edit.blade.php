<h1>Dúvida {{ $support->id }}</h1>

<x-alert />

<form action="{{ route('supports.update', $support->id) }}" method="POST">
  @method('PUT')
  @include('admin.suports.partials.form', [
    'support' => $support
  ])
</form>