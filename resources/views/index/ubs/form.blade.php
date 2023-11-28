<div>
    <input name='CNES_UBS' value="{{ isset($ubs)? $ubs->CNES_UBS : old('CNES_UBS') }}">
    <input name='Nome' value="{{ isset($ubs)? $ubs->Nome : old('Nome') }}">
    <input name='Telefone' value="{{ isset($ubs)? $ubs->Telefone : old('Telefone') }}">
    <input name='Logradouro' value="{{ isset($ubs)? $ubs->Logradouro : old('Logradouro') }}">
    <input name='Cidade' value="{{ isset($ubs)? $ubs->Cidade : old('Cidade') }}">
    <input name='Estado' value="{{ isset($ubs)? $ubs->Estado : old('Estado') }}">
    <input name='Numero' value="{{ isset($ubs)? $ubs->Numero : old('Numero') }}">
    <input name='Complemento' value="{{ isset($ubs)? $ubs->Complemento : old('Complemento') }}">

    <button type="submit">Submit</button>
</div>
