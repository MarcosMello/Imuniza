<div>
    <input name='Cidadao_Numero_SUS' value="{{ isset($vacinaAdministrada)? $vacinaAdministrada->Cidadao_Numero_SUS : old('Cidadao_Numero_SUS') }}">
    <input name='Vacinas_Lote' value="{{ isset($vacinaAdministrada)? $vacinaAdministrada->Vacinas_Lote : old('Vacinas_Lote') }}">
    <input name='Colaborador_CNES_UBS' value="{{ isset($vacinaAdministrada)? $vacinaAdministrada->Colaborador_CNES_UBS : old('Colaborador_CNES_UBS') }}">
    <input name='Colaborador_Matricula' value="{{ isset($vacinaAdministrada)? $vacinaAdministrada->Colaborador_Matricula : old('Colaborador_Matricula') }}">
    <input name='Data_Aplicacao' value="{{ isset($vacinaAdministrada)? $vacinaAdministrada->Data_Aplicacao : old('Data_Aplicacao') }}">
    <input name='Tipo_Vacina' value="{{ isset($vacinaAdministrada)? $vacinaAdministrada->Tipo_Vacina : old('Tipo_Vacina') }}">

    <button type="submit">Submit</button>
</div>
