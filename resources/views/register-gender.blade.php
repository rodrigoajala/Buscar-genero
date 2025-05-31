<!-- resources/views/register-gender.blade.php -->

<h2>Precisamos que você informe seu gênero</h2>

<form action="{{ route('register.submit') }}" method="POST">
    @csrf

    {{-- Exibir erros de validação --}}
    @if ($errors->any())
        <div style="color:red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Campos ocultos para preservar dados já fornecidos --}}
    <input type="hidden" name="name" value="{{ old('name', $name ?? '') }}">
    <input type="hidden" name="email" value="{{ old('email', $email ?? '') }}">

    {{-- Campo de seleção de gênero --}}
    <label for="manual_gender">Selecione seu gênero:</label>
    <select name="manual_gender" id="manual_gender" required>
        <option value="">Selecione...</option>
        <option value="male" {{ old('manual_gender') === 'male' ? 'selected' : '' }}>Masculino</option>
        <option value="female" {{ old('manual_gender') === 'female' ? 'selected' : '' }}>Feminino</option>
        <option value="other" {{ old('manual_gender') === 'other' ? 'selected' : '' }}>Outro</option>
    </select>

    <br><br>
    <button type="submit">Finalizar Registro</button>
</form>
