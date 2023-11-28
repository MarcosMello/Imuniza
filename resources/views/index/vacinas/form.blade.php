<div>
    <input name='Lote' value="{{ isset($vacina)? $vacina->Lote : old('Lote') }}">
    <input name='Fabricante' value="{{ isset($vacina)? $vacina->Fabricante : old('Fabricante') }}">
    <input name='Nome_Vacina' value="{{ isset($vacina)? $vacina->Nome_Vacina : old('Nome_Vacina') }}">
    <input name='Validade' value="{{ isset($vacina)? $vacina->Validade : old('Validade') }}">
    <input name='Quantidade_Doses' value="{{ isset($vacina)? $vacina->Quantidade_Doses : old('Quantidade_Doses') }}">

    <button type="submit">Submit</button>
</div>
