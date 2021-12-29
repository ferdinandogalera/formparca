@extends('site.master.layout')
@section('content')
<div class="container py-5 mt-5">

    

     <div id='fixo' class='row g3 p-3 mb-2 border rounded' >
        <div class="col-12 fw-bold  text-white">
            <div class='p-3 mb-2 text-center bg-secondary'>PESSOA JURÍDICA - FICHA DE CREDENCIAMENTO PARÇAPAY</div>
        </div> 
        <div class="col-12 fw-bold  text-black p-3" id='cabeform'>
            <div class='text-center'>BAID7 TECNOLOGIA E MEIOS DE PAGAMENTO , pessoa juridíca de direito privado, inscrita no CNPJ 37.529.917/0001-98,</div>
            <div class='text-center'>estabelecida na cidade de Barueri, na Alameda Araguaia, 8ª andar, EDIF I - Conj 812 CEA II, Bairro Alphaville, CEP: 06455-000</div>
        </div> 
     </div>

    
     <div id='aguarde' class='row g3' style='display:none'>
        <h1 class='text-center'>AGUARDE, PROCESSANDO OS DADOS..</h1>
        <div class="row">
            <div class="md-12">
                <div class="card">
                    <div class="class-body">
                        @if(\Session::has('success'))
                            <div class="alert alert-success m-3">{{ \Session::get('success') }}</div>
                            {{ \Session::forget('success') }}
                        @endif
                        @if(\Session::has('error'))
                            <div class="alert alert-danger m-3">{{ \Session::get('error') }}</div>
                            {{ \Session::forget('error') }}
                        @endif
        
                    </div>
                </div>
            </div>
        </div>
     </div>
    
     <form id='fcred' class="Twas-validated" method="post" action="{{ route('mailSend') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name='idfranqueado' id='idfranqueado' value='1'>
        <div id='fases' class='row g3'>
         <div class="col-2">
            <div class="input-group">
                <div id='eform1' i=0 class="fases input-group-text w-100 bg-primary fw-bold">1.</div>
            </div>
         </div>
         <div class="col-2">
            <div class="input-group">
                <div id='eform2' i=0 class="fases input-group-text  w-100 bg-secondary  fw-bold">2.</div>
            </div>
         </div>
         <div class="col-4">
            <div class="input-group">
                <div id='eform3' i=0 class="fases input-group-text  w-100 bg-secondary fw-bold">3.</div>
            </div>
         </div>
         <div class="col-2">
            <div class="input-group">
                <div id='eform4' i=0 class="fases input-group-text  w-100 bg-secondary fw-bold">4.</div>
            </div>
         </div>

         <div class="col-2">
            <div class="input-group">
                <div id='eform5' i=0 class="fases input-group-text  w-100 bg-secondary fw-bold">5.</div>
            </div>
         </div>
      </div>   
      <div id='fTudo' class='text-center bg-primary col-12' style="display:none;color:white" >
        <h1>CONFIRA OS DADOS INFORMADOS, POR FAVOR</h1>
      </div>
 


      <div id='form1' class="forms row g-3 border m-2 mb-3 pb-3">
       
        <div class="col-12 fw-bold">
            <label for="">II. DADOS CADASTRAIS/EMPRESA</label>
        </div>



        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="razao" >Razão Social</label>
               <input type="text" class="form-control" Trequired name='razao' id="razao" placeholder="Entre com o nome da Empresa">
            </div>
        </div>
  
        
        <div class="row">
            <div class="col-sm-7 my-1 fw-bold">
              <label for="fantasia">Nome Fantasia</label>
              <input type="text" class="form-control" Trequired  name='fantasia' id="fantasia" placeholder="Nome Fantasia ou repita o nome">
            </div>
            <div class="col-sm-5 my-1 fw-bold">
              <label for="qtepos">Postos</label>
              <input type="text" class="form-control" Trequired  id="qtepos" name='qtepos' placeholder="Quantidade">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 my-1 fw-bold">
              <label for="cnpj">CNPJ</label>
              <input type="text" class="form-control" Trequired  name='cnpj' id="cnpj" placeholder="Informe o CNPJ da empresa">
            </div>
            <div class="col-sm-6 my-1 fw-bold">
              <label for="ie">Inscrição Estadual</label>
              <input type="text" class="form-control" value='Isento' name='ie' id="ie" placeholder="Informe a INSCRIÇÃO ESTADUAL">
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-6 my-1 fw-bold">
              <label for="endereco" >Endereco</label>
              <input type="text" class="form-control" name='endereco' id='endereco' placeholder="Endereco">
            </div>
            <div class="col-sm-6 my-1 fw-bold">
              <label for="complemento">Complemento</label>
              <input type="text" class="form-control"   name='complemento' id="complemento" placeholder="Informe o complemento">
            </div>
        </div>
  

        <div class="row">
            <div class="col-sm-4 my-1 fw-bold">
              <label for="bairro" class='fw-bold'>Bairro</label>
              <input type="text" class="form-control" name='bairro' id='bairro' placeholder="Endereco">
            </div>
            <div class="col-sm-5 my-1 fw-bold" id="custom-search-input">
              <label for="cidade">Cidade/UF</label>
              <input type='hidden' name='idcidade' id='idcidade' value=''>
              <input type="text" class="form-control" Trequired  name='cidade' id="cidade" placeholder="Digite as primeiras letras para ver a lista">
            </div>
            <div class="col-sm-3 my-1 fw-bold">
              <label for="cep">CEP</label>
              <input type="text" class="form-control" Trequired  name='cep' id="cep" data-inputmask="'alias': 'phonebe'" placeholder="99999-999">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 my-1 fw-bold">
              <label for="telefone">Telefone Comercial</label>
              <input type="text" class="form-control" name='telefone' id="telefone" data-inputmask="'alias': 'phonebe'" placeholder="Informe o telefone da empresa">
            </div>
            <div class="col-sm-6 my-1 fw-bold">
              <label for="celular">Celular / WhatsApp</label>
              <input type="text" class="form-control" Trequired  name='celular' id="celular" data-inputmask="'alias': 'phonebe'" placeholder="Informe o celular para contato">
            </div>
        </div>
        <div class="col-12">
          <button type="button" p='form2' s=1 e=2 class="a1 btn btn-primary float-end">Avançar</button>
        </div>
    </div>

    <div id='form2' class="forms row g-3  border m-2 mb-3 pb-3" style='display:none'>
        <div class="col-12 fw-bold">
            <label for="">III. DADOS BANCARIO</label>
        </div>
        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="banco" >Banco</label>
              <input type="text" class="form-control" Trequired  name='banco' id="banco" placeholder="Nome do Banco">

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="agencia" >Agencia Nº</label>
              <input type="text" class="form-control" Trequired  name='agencia' id="agencia" placeholder="Nº da Agência">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="conta" >Nº da Conta</label>
              <input type="text" class="form-control" Trequired  name='conta' id="conta" placeholder="Nº da Conta">
            </div>
        </div>

        <div class="row" style='margin-left:4px'>
          <div class="col-sm-6 border pb-3 my-1">
            <label for="tpconta">Tipo de Conta</label><br>
            <label class='ms-3'>Conta Corrente</label> <input class="form-check-input ms-3" checked type="radio" name="tpconta" id="tpconta" value="Corrente" aria-label="...">
            <label  class='ms-3'>Poupança </label> <input class="form-check-input ms-3" type="radio" name="tpconta" id="tpconta" value="Poupanca" aria-label="...">
          </div>
          <div class="col-sm-5 border pb-3 my-1" style='margin-left:10px'>
            <label for="tppessoa">Pessoa</label><br>
            <label class='ms-3'>Juridica</label> <input class="form-check-input ms-3 tppessoa" checked type="radio" name="tppessoa" id="tppessoa" value="PJ" aria-label="...">
            <label  class='ms-3'>Fisica</label> <input class="form-check-input ms-3  tppessoa" type="radio" name="tppessoa" id="tppessoa" value="PF" aria-label="...">
          </div>
        </div>

        
        <div class="col-12">
            <button type="button" p='form3' s=2 e=3 class="a1 btn btn-primary float-end">Avançar</button>
            <button type="button" p='form1' s=2 e=1 class="b1 btn btn-primary float-end" style='margin-right:60px'>Voltar</button>
          </div>
  
    </div>
    <div id='form3' class="forms row g-3  border m-2 mb-3 pb-3" style='display:none'>
        <div class="col-12 fw-bold">
            <label for="">IV. TERCEIROS BENEFICIÁRIOS</label>
        </div>
        <div class="col-12 fw-bold">
            <label for="">V. DADOS COMERCIAIS</label>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="faturamento" >Faturamento Esperado/Mês R$</label>
              <input type="text" class="form-control" Trequired  name='faturamento' id="faturamento"  data-inputmask="'alias': 'currency'" style="text-align: right;" placeholder="Informe o valor estimado">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="ticket" >Valor Ticket Mêdio R$</label>
              <input type="text" class="form-control" Trequired  name='ticket' id="ticket"  data-inputmask="'alias': 'currency'" style="text-align: right;" placeholder="Informe o valor mêdio do TICKET">
            </div>
        </div>

        <div class="col-12">
          <button type="button" p='form4' s=3 e=4 class="a1 btn btn-primary float-end">Avançar</button>
          <button type="button" p='form2' s=3 e=2 class="b1 btn btn-primary float-end" style='margin-right:60px'>Voltar</button>
        </div>


    </div>


    <div id='form4' class="forms row g-3  border m-2 mb-3 pb-3" style='display:none'>
       
        <div class="col-12 fw-bold">
            <label for="">VI. DADOS DO REPRESENTANTE LEGAL</label>
        </div>


        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="nome" >Nome</label>
              <input type="text" class="form-control" Trequired  name='nome' id="nome" placeholder="Contato direto na Empresa">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="mae" >Nome da Mãe</label>
              <input type="text" class="form-control" Trequired  name='mae' id="mae" placeholder="Nome da Mãe do Contato">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 my-1 fw-bold">
              <label for="rg" class='fw-bold'>RG</label>
              <input type="text" class="form-control" Trequired  name='rg' id="rg" placeholder="Informe o RG">
            </div>
            <div class="col-sm-5 my-1 fw-bold" id="custom-search-input">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" Trequired  name='cpf' id="cpf" placeholder="Informe o CPF do contato">
            </div>
            <div class="col-sm-3 my-1 fw-bold">
              <label for="estadocivil">Estado Civil</label>
              <select id='estadocivil' name='estadocivil' class='form-control'   >
                <option value='Casado' selected>Casado(a)</option>
                <option value='Solteiro'>Solteiro(a)</option>
                <option value='Divorciado'>Divorciado(a)</option>
                <option value='Separado'>Separado(a)</option>
                <option value='Viuvo'>Viuvo(a)</option>
              </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 my-1 fw-bold">
              <label for="profissao" >Profissão</label>
              <input type="text" class="form-control" Trequired  name='profissao' id="profissao" placeholder="Informe sua profissão">
            </div>
            <div class="col-sm-6 my-1 fw-bold">
              <label for="datanascimento" >Data de Nascimento</label>
              <input type="text" class="form-control" Trequired  name='datanascimento' id="datanascimento" placeholder="Data de Nascimento">
            </div>
        </div>

        
        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
              <label for="endereco1" >Endereço</label>
              <input type="text" class="form-control" Trequired  name='endereco1' id="endereco1" placeholder="Informe o Endereço ">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-sm-4 my-1 fw-bold">
              <label for="bairro1" class='fw-bold'>Bairro</label>
              <input type="text" class="form-control" Trequired  name='bairro1' id="bairro1" placeholder="Informe o Bairro ">
            </div>
            <div class="col-sm-5 my-1 fw-bold" id="custom-search-input">
              <label for="cidade1">Cidade/UF</label>
              <input type='hidden' name='idcidade1' id='idcidade1' value=''>
              <input type="text" class="form-control" Trequired  name='cidade1' id="cidade1" placeholder="Informe a cidade ">
            </div>
            <div class="col-sm-3 my-1 fw-bold">
              <label for="cep1">CEP</label>
              <input type="text" class="form-control" Trequired  name='cep1' id="cep1" data-inputmask="'alias': 'phonebe'" placeholder="99999-999">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 my-1 fw-bold">
              <label for="telefone1">Telefone Contato</label>
              <input type="text" class="form-control" name='telefone1' id="telefone1" data-inputmask="'alias': 'phonebe'" placeholder="Informe o telefone do contato">
            </div>
            <div class="col-sm-6 my-1 fw-bold">
              <label for="celular1">Celular / WhatsApp</label>
              <input type="text" class="form-control" Trequired  name='celular1' id="celular1" data-inputmask="'alias': 'phonebe'" placeholder="Informe o celular para contato">
            </div>
        </div>

        <div class="col-12">
            <button type="button" p='form5' s=4 e=5 class="b1 btn btn-primary float-end">Avançar</button>
            <button type="button" p='form3' s=4 e=3 class="b1 btn btn-primary float-end" style='margin-right:60px'>Voltar</button>
        </div>
  
    </div>
    <div id='form5' class="forms row g-3  border m-2 mb-3 pb-3" style='display:none' >
    
        <div class="jumbotron">
            <h1>Quase lá</h1>
            <p>Por favor, envie os documentos solicitados abaixo:</p>
          </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
                <label for="email" >Email Contato</label>
                <input type="email" class="form-control"  Trequired  name='email' id="email" data-inputmask="'alias': 'email'" placeholder="Email para Contato">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
                <label for="attachment" >Copia do RG</label>
                <input type="file" class="form-control" name='attachment' id="attachment">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
                <label for="attachment1" >Copia do CPF</label>
                <input type="file" class="form-control" name='attachment1' id="attachment1">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 my-1 fw-bold">
                <label for="attachment2" >Comprovante Residência</label>
                <input type="file" class="form-control" name='attachment2' id="attachment2">
            </div>
        </div>

        <div class="row">
          <div class="col-sm-12 my-1 fw-bold">
              <label for="attachment3" >Domicilio Bancario</label>
              <input type="file" class="form-control" name='attachment3' id="attachment3">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 my-1 fw-bold">
              <label for="attachment4" >Extrato Bancario (CABEÇALHO DO EXTRATO)</label>
              <input type="file" class="form-control" name='attachment4' id="attachment4">
          </div>
        </div>

        <div class="row" id='carcnpj'>
          <div class="col-sm-12 my-1 fw-bold">
              <label for="attachment5" >Cartão CNPJ (se for PJ)</label>
              <input type="file" class="form-control" name='attachment5' id="attachment5">
          </div>
        </div>


        



        
       <div class="col-12">
        <button type="button" p='form5' name='finalizando' id='finalizando'  class="btn btn-success float-end">AVANÇAR</button>
        <button type="button" p='form5' name='Send mail' id='enviando'  class="btn btn-success float-end" style='display:none'>FINALIZAR E CONFIRMAR</button>
        <button type="button" p='form4' s=5 e=4 class="b1 btn btn-primary float-end" style='margin-right:60px'>Voltar</button>
       </div>


    </div>

      </form>

    

</div>

@endsection
