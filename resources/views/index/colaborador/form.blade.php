<div>
    <input name='UBS_CNES_UBS' value="{{ isset($colaborador)? $colaborador->UBS_CNES_UBS : old('UBS_CNES_UBS') }}">
    <input name='Matricula' value="{{ isset($colaborador)? $colaborador->Matricula : old('Matricula') }}">
    <input name='CPF' value="{{ isset($colaborador)? $colaborador->CPF : old('CPF') }}">
    <input name='Nome' value="{{ isset($colaborador)? $colaborador->Nome : old('Nome') }}">
    <input name='Data_Admissao' value="{{ isset($colaborador)? $colaborador->Data_Admissao : old('Data_Admissao') }}">
    <input name='Cargo' value="{{ isset($colaborador)? $colaborador->Cargo : old('Cargo') }}">

    <button type="submit">Submit</button>
</div>
