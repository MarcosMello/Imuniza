<div>
    <input name='Numero_SUS' value="{{ isset($cidadao)? $cidadao->Numero_SUS : old('Numero_SUS') }}">
    <input name='CPF' value="{{ isset($cidadao)? $cidadao->CPF : old('CPF') }}">
    <input name='Nome' value="{{ isset($cidadao)? $cidadao->Nome : old('Nome') }}">
    <input name='Data_de_nascimento' value="{{ isset($cidadao)? $cidadao->Data_de_nascimento : old('Data_de_nascimento') }}">
    <input name='Nome_da_mae' value="{{ isset($cidadao)? $cidadao->Nome_da_mae : old('Nome_da_mae') }}">
    <input name='Sexo' value="{{ isset($cidadao)? $cidadao->Sexo : old('Sexo') }}">
    <input name='Estado_civil' value="{{ isset($cidadao)? $cidadao->Estado_civil : old('Estado_civil') }}">
    <input name='Escolaridade' value="{{ isset($cidadao)? $cidadao->Escolaridade : old('Escolaridade') }}">
    <input name='Etnia' value="{{ isset($cidadao)? $cidadao->Etnia : old('Etnia') }}">
    <input name='Possui_plano' value="{{ isset($cidadao)? $cidadao->Possui_plano : old('Possui_plano') }}">
    <input name='Logradouro' value="{{ isset($cidadao)? $cidadao->Logradouro : old('Logradouro') }}">
    <input name='Numero' value="{{ isset($cidadao)? $cidadao->Numero : old('Numero') }}">
    <input name='Cidade' value="{{ isset($cidadao)? $cidadao->Cidade : old('Cidade') }}">
    <input name='Estado' value="{{ isset($cidadao)? $cidadao->Estado : old('Estado') }}">
    <input name='Complemento' value="{{ isset($cidadao)? $cidadao->Complemento : old('Complemento') }}">

    <button type="submit">Submit</button>
</div>
