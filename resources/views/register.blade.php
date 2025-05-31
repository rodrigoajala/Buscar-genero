<!-- resources/views/register.blade.php -->
<form action="{{ route('register.submit') }}" method="POST">
    @csrf

    {{-- MENSAGENS DE ERRO GERAIS --}}
    @if ($errors->any())
        <div style="color:red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- CAMPOS DO FORMULÁRIO --}}
    <label>Nome completo:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label>E-mail:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    {{-- GÊNERO MANUAL (caso seja necessário) --}}
    @if(session('require_gender'))
        <label>Selecione seu gênero:</label>
        <select name="manual_gender">
            <option value="male">Masculino</option>
            <option value="female">Feminino</option>
            <option value="other">Outro</option>
        </select>
    @endif

    <button type="submit">Registrar</button>
</form>
