<form class="form-control" id="regForm" action="">

<img src="{{ asset('/img/logo.png') }}">

<input type="hidden" id="_token" value="{{ csrf_token() }}">
<input type="hidden" id="step" value="{{ isset($step) ? $step : 0 }}">

<h1>Cadastro Sensacional:</h1>

<div class="tab">
  <p><input placeholder="Nome..." oninput="this.className = ''" id="name" value="{!! $user->name !!}" maxlength="100"></p>
  <p><input placeholder="Data de Nascimento..." oninput="this.className = ''" id="birthday" value="{!! $user->present()->getBirthday !!}"></p>
</div>

<div class="tab">
  <p><input placeholder="Endereço..." oninput="this.className = ''" id="address" value="{!! $user->address !!}"  maxlength="100"></p>
  <p><input placeholder="CEP..." oninput="this.className = ''" id="zipcode" value="{!! $user->zipcode !!}"></p>
  <p><input placeholder="Cidade..." oninput="this.className = ''" id="city" value="{!! $user->city !!}"  maxlength="100"></p>
  <p>
    <select id="state" onchange="this.className = ''">
        <option value="" >Estado...</option>
        <option value="AC" {!! $user->state == "AC" ? 'selected' : '' !!}>Acre</option>
        <option value="AL" {!! $user->state == "AL" ? 'selected' : '' !!}>Alagoas</option>
        <option value="AP" {!! $user->state == "AP" ? 'selected' : '' !!}>Amapá</option>
        <option value="AM" {!! $user->state == "AM" ? 'selected' : '' !!}>Amazonas</option>
        <option value="BA" {!! $user->state == "BA" ? 'selected' : '' !!}>Bahia</option>
        <option value="CE" {!! $user->state == "CE" ? 'selected' : '' !!}>Ceara</option>
        <option value="DF" {!! $user->state == "DF" ? 'selected' : '' !!}>Distrito Federal</option>
        <option value="ES" {!! $user->state == "ES" ? 'selected' : '' !!}>Espírito Santo</option>
        <option value="GO" {!! $user->state == "GO" ? 'selected' : '' !!}>Goiás</option>
        <option value="MA" {!! $user->state == "MA" ? 'selected' : '' !!}>Maranhão</option>
        <option value="MT" {!! $user->state == "MT" ? 'selected' : '' !!}>Mato Grosso</option>
        <option value="MS" {!! $user->state == "MS" ? 'selected' : '' !!}>Mato Grosso do Sul</option>
        <option value="MG" {!! $user->state == "MG" ? 'selected' : '' !!}>Minas Gerais</option>
        <option value="PA" {!! $user->state == "PA" ? 'selected' : '' !!}>Pará</option>
        <option value="PB" {!! $user->state == "PB" ? 'selected' : '' !!}>Paraíba</option>
        <option value="PR" {!! $user->state == "PR" ? 'selected' : '' !!}>Paraná</option>
        <option value="PE" {!! $user->state == "PE" ? 'selected' : '' !!}>Pernambuco</option>
        <option value="PI" {!! $user->state == "PI" ? 'selected' : '' !!}>Piauí</option>
        <option value="RJ" {!! $user->state == "RJ" ? 'selected' : '' !!}>Rio de Janeiro</option>
        <option value="RN" {!! $user->state == "RN" ? 'selected' : '' !!}>Rio Grande do Norte</option>
        <option value="RS" {!! $user->state == "RS" ? 'selected' : '' !!}>Rio Grande do Sul</option>
        <option value="RO" {!! $user->state == "RO" ? 'selected' : '' !!}>Rondônia</option>
        <option value="RR" {!! $user->state == "RR" ? 'selected' : '' !!}>Roraima</option>
        <option value="SC" {!! $user->state == "SC" ? 'selected' : '' !!}>Santa Catarina</option>
        <option value="SP" {!! $user->state == "SP" ? 'selected' : '' !!}>São Paulo</option>
        <option value="SE" {!! $user->state == "SE" ? 'selected' : '' !!}>Sergipe</option>
        <option value="TO" {!! $user->state == "TO" ? 'selected' : '' !!}>Tocantins</option>
    </select>
  </p>
</div>

<div class="tab">
  <p><input placeholder="Fone..." oninput="this.className = ''" id="phone" value="{!! $user->phone !!}"></p>
  <p><input placeholder="Celular..." oninput="this.className = ''" id="cellphone" value="{!! $user->cellphone !!}"></p>
</div>

<div class="tab">
  <p>Finalizado com sucesso...</p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" class="btn btn-danger" onclick="nextPrev(-1)">Anterior</button>
    <button type="button" id="nextBtn" class="btn btn-success" onclick="nextPrev(1)">Próximo</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>