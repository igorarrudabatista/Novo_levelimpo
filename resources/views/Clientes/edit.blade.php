@extends('base')

@section('content')
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Cadastro da empresa de Clientes</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
    </div>
    <div class="app-content-actions">
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter">
            <span>Filter</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Categoria</label>
            <select>
              <option>Todas as Categorias</option>
              <option>Furniture</option>                 
              <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
            <label>Status</label>
            <select>
              <option> Todos</option>
              <option>Ativo</option>
              <option>Inativo</option>
            </select>
            <div class="filter-menu-buttons">
              <button class="filter-button reset">
                Limpar
              </button>
              <button class="filter-button apply">
                Aplicar
              </button>1
            </div>
          </div>
        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
     



    <form action="{{asset('/empresa/update/')}}/{{$editar_empresa->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
   
<div class="form-row">

<div class="col-md-4 mb-3">
  <label for="validationDefault01"> <b> Nome da Empresa / Cliente </b> </label>
  <input type="text" class="form-control" id="Nome_Empresa" name="Nome_Empresa" value="{{$editar_empresa->Nome_Empresa}}" required>
</div>
<div class="col-md-4 mb-3">
  <label for="validationDefault02">  <b> CNPJ </b> </label>

  <input type="text" class="form-control" id="Cnpj" name="Cnpj" onkeypress="$(this).mask('00.000.000/0000-00')" value="{{$editar_empresa->Cnpj}}">
</div>
<div class="col-md-2 mb-3">
  <label for="validationDefault02">  <b> CPF</b> </label>

  <input type="text" class="form-control" id="Cpf" name="Cpf" onkeypress="$(this).mask('000.000.000-00')"value="{{$editar_empresa->Cpf}}">
</div>         
<div class="col-md-2 mb-3">
  <label for="validationDefault02"> <b>Telefone </b> </label>

  <input type="text" class="form-control" id="Telefone" name="Telefone" Placeholder="(DDD)+Telefone" onkeypress="$(this).mask('(00) 00000-0000')" value="{{$editar_empresa->Telefone}}" >             </div>
{{-- OK  --}}

<div class="form-row">
<div class="col-md-3 mb-6">
<label for="validationDefaultUsername"> <b> E-mail </b></label>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupPrepend2">@</span>
  </div>
  <input type="text" class="form-control" id="Email" name="Email" value="{{$editar_empresa->Email}}">
</div>            </div>







<div class="col-md-3 mb-3">
<label for="validationDefault03"> <b> Site </b> </label>
<input type="text" class="form-control" id="Site" name="Site" Placeholder="www.site.com.br" value="{{$editar_empresa->Site}}">
</div>

<div class="col-md-3 mb-3">
<label for="validationDefault03">  <b> Endereço </b> </label>
<input type="text" class="form-control" id="Endereco" name="Endereco"  value="{{$editar_empresa->Endereco}}">
</div>
<div class="col-md-3 mb-3">
<label for="validationDefault03">  <b> CEP </b> </label>
<input type="text" class="form-control" id="Cep" name="Cep"  onkeypress="$(this).mask('00000-000')" value="{{$editar_empresa->Cep}}">
</div>
<div class="col-md-1 mb-1">
<label for="validationDefault03"> <b> N°</b>  </label>
<input type="text" class="form-control" id="Numero" name="Numero"  value="{{$editar_empresa->Numero}}">
</div>
<div class="col-md-2 mb-1">
<label for="validationDefault03"> <b> Bairro </b>  </label>
<input type="text" class="form-control" id="Bairro" name="Bairro"  value="{{$editar_empresa->Bairro}}">
</div>
<div class="col-md-3 mb-3">
<label  for="validationDefault03"> <b> Estado </b> </label>
<select class="form-control" id="estado" name="Estado">
<option value="Acre">Acre</option>
<option value="Alagoas">Alagoas</option>
<option value="Amapá">Amapá</option>
<option value="Amazonas">Amazonas</option>
<option value="Bahia">Bahia</option>
<option value="Ceará">Ceará</option>
<option value="Distrito Federal">Distrito Federal</option>
<option value="Espírito Santo">Espírito Santo</option>
<option value="Goiás">Goiás</option>
<option value="Maranhão">Maranhão</option>
<option value="Mato Grosso">Mato Grosso</option>
<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
<option value="Minas GeraisG">Minas Gerais</option>
<option value="Pará">Pará</option>
<option value="Paraíba">Paraíba</option>
<option value="Paraná">Paraná</option>
<option value="Pernambuco">Pernambuco</option>
<option value="Piauí">Piauí</option>
<option value="Rio de Janeiro">Rio de Janeiro</option>
<option value="Rio Grande do Norte">Rio Grande do Norte</option>
<option value="Rio Grande do Sul">Rio Grande do Sul</option>
<option value="Rondônia">Rondônia</option>
<option value="Roraima">Roraima</option>
<option value="Santa Catarina">Santa Catarina</option>
<option value="São Paulo">São Paulo</option>
<option value="Sergipe">Sergipe</option>
<option value="Tocantins">Tocantins</option>
<option value="Estrangeiro">Estrangeiro</option>
</select>
</div>
<div class="col-md-3 mb-3">
<label for="validationDefault03">  <b> Cidade </b> </label>
<input type="text" class="form-control" id="Cidade" name="Cidade"  value="{{$editar_empresa->Cidade}}">
</div>    </div>
</div>
<div class="form-group">

<div class="col-md-4 mb-3">
<label for="validationDefault03">  <b> Instagram </b> </label>
<input type="text" class="form-control" id="Instagram" name="Instagram"  value="{{$editar_empresa->Instagram}}">
</div>
<div class="col-md-4    mb-3">
<label for="validationDefault03">  <b> Facebook </b> </label>
<input type="text" class="form-control" id="Facebook" name="Facebook"  value="{{$editar_empresa->Facebook}}">
</div>
</div>



   
<div class="form-group">
  <div class="form-check">
 
    <div class="upload">
      <input type="file" title="" id="image" name="image"  class="drop-here">
      <div class="text text-drop">Logo</div>
      <div class="text text-upload">Enviando</div>
      <svg class="progress-wrapper" width="300" height="300">
        <circle class="progress" r="115" cx="150" cy="150"></circle>
      </svg>
      <svg class="check-wrapper" width="130" height="130">
        <polyline class="check" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
      </svg>
      <div class="shadow"></div>
    </div>
    
    <div class="socials">
      <a class="dribbble" href="https://dribbble.com/shots/8571590-Upload-Animation" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32"><path fill-rule="evenodd" clip-rule="evenodd" fill="black" d="M16 0C7.16703 0 0 7.16703 0 16C0 24.833 7.16703 32 16 32C24.8156 32 32 24.833 32 16C32 7.16703 24.8156 0 16 0ZM26.5683 7.37527C28.4772 9.70065 29.6226 12.6681 29.6573 15.8785C29.2061 15.7918 24.6941 14.872 20.1475 15.4447C20.0434 15.2191 19.9566 14.9761 19.8525 14.7332C19.5748 14.0738 19.2625 13.397 18.9501 12.7549C23.9826 10.7072 26.2733 7.75705 26.5683 7.37527ZM16 2.36009C19.4707 2.36009 22.6464 3.66161 25.0586 5.7961C24.8156 6.14317 22.7505 8.90239 17.8915 10.7245C15.6529 6.61171 13.1714 3.24512 12.7896 2.72451C13.8134 2.48156 14.8894 2.36009 16 2.36009ZM10.1866 3.64425C10.551 4.13015 12.9805 7.5141 15.2538 11.5401C8.86768 13.2408 3.22777 13.2061 2.62039 13.2061C3.50542 8.9718 6.36876 5.44902 10.1866 3.64425ZM2.32538 16.0174C2.32538 15.8785 2.32538 15.7397 2.32538 15.6009C2.9154 15.6182 9.54447 15.705 16.3644 13.6573C16.7636 14.4208 17.128 15.2017 17.4751 15.9826C17.3015 16.0347 17.1106 16.0868 16.9371 16.1388C9.89154 18.4121 6.14317 24.6247 5.8308 25.1453C3.6616 22.7332 2.32538 19.5228 2.32538 16.0174ZM16 29.6746C12.8416 29.6746 9.92625 28.5987 7.61822 26.7939C7.86117 26.2907 10.6377 20.9458 18.3427 18.256C18.3774 18.2386 18.3948 18.2386 18.4295 18.2213C20.3557 23.2017 21.1367 27.3839 21.3449 28.5813C19.6963 29.2928 17.8915 29.6746 16 29.6746ZM23.6182 27.3319C23.4794 26.4989 22.7505 22.5076 20.9631 17.5965C25.2495 16.9197 28.9978 18.0304 29.4664 18.1866C28.8764 21.987 26.6898 25.2668 23.6182 27.3319Z" fill="#EA4C89"></path></svg></a>
      <a class="twitter" href="https://twitter.com/MilanRaring" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 72 72"><path fill="black" d="M67.812 16.141a26.246 26.246 0 0 1-7.519 2.06 13.134 13.134 0 0 0 5.756-7.244 26.127 26.127 0 0 1-8.313 3.176A13.075 13.075 0 0 0 48.182 10c-7.229 0-13.092 5.861-13.092 13.093 0 1.026.118 2.021.338 2.981-10.885-.548-20.528-5.757-26.987-13.679a13.048 13.048 0 0 0-1.771 6.581c0 4.542 2.312 8.551 5.824 10.898a13.048 13.048 0 0 1-5.93-1.638c-.002.055-.002.11-.002.162 0 6.345 4.513 11.638 10.504 12.84a13.177 13.177 0 0 1-3.449.457c-.846 0-1.667-.078-2.465-.231 1.667 5.2 6.499 8.986 12.23 9.09a26.276 26.276 0 0 1-16.26 5.606A26.21 26.21 0 0 1 4 55.976a37.036 37.036 0 0 0 20.067 5.882c24.083 0 37.251-19.949 37.251-37.249 0-.566-.014-1.134-.039-1.694a26.597 26.597 0 0 0 6.533-6.774z"></path></svg></a>
    </div>
  </div>
</div>

<div class="col-md-4 mb-4">
<button class="btn btn-primary" type="submit">Cadastrar Cliente</button>
</div>
</div>
</form>



    </div>
  </div>
</div>
</div>
<!-- partial -->
@endsection