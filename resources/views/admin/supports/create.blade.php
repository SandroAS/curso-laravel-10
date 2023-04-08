<h1>Nova Dúvida</h1>

<x-alert />

<form action="{{ route('supports.store') }}" method="POST">
  @include('admin.suports.partials.form')
</form>