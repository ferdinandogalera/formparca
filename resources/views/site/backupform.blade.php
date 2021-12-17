@extends('site.master.layout')
@section('content')
<div class="container py-5 mt-5">

    

     <div id='fixo' class='row g3 p-3 mb-2 border rounded'>
        <div class="col-12 fw-bold  text-white">
            <div class='p-3 mb-2 text-center bg-secondary'>PESSOA JURÍDICA - FICHA DE CREDENCIAMENTO PARÇAPAY</div>
        </div> 

        <div class="col-12 fw-bold  text-black p-3">
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
     <form>
        <div class="row">
          <div class="col">
            <label for="razao" class='font-weight-bold'>Razão Social</label>
            <input type="text" class="form-control" name='razao' id='razao' placeholder="Nome">
          </div>
          <div class="col" class='font-weight-bold'>
            <label for="inputPassword4">Password</label>
            <input type="text" class="form-control" placeholder="Sobrenome">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>
     <form id='fcred' class="was-validated" method="post" action="{{ route('mailSend') }}" enctype="multipart/form-data">
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
            <label for="">II. DADOS DO CONTRATANTE/EMPRESA</label>
        </div>




        

        <div class="col-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Razão Social</div>
                <label for="razao">Address</label>
                <input type="text" class="form-control" _required name='razao' id="razao" placeholder="Razão Social da Empresa">
            </div>
        </div>

        <div class="col-md-8">
            <div class="input-group">
                <div class="input-group-text fw-bold">Fantasia</div>
                <input type="text" class="form-control" _required  name='fantasia' id="fantasia" placeholder="Nome Fantasia ou repita o nome">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Qte.Pos</div>
                <input type="text" class="form-control" _required  id="qtepos" name='qtepos' placeholder="Quantidade de Postos">
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-text fw-bold">CNPJ</div>
                <input type="text" class="form-control" _required  name='cnpj' id="cnpj" placeholder="Informe o CNPJ da empresa">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-text  fw-bold">I.E</div>
                <input type="text" class="form-control" value='Isento' name='ie' id="ie" placeholder="Informe a INSCRIÇÃO ESTADUAL">
            </div>
        </div>

        <div class="col-md-8">
            <div class="input-group">
                <div class="input-group-text fw-bold">Endereço</div>
                <input type="text" class="form-control" _required  name='endereco' id="endereco" placeholder="Informe o endereço com numero">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Complemento</div>
                <input type="text" class="form-control"   name='complemento' id="complemento" placeholder="Informe o complemento">
            </div>
        </div>


        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Bairro</div>
                <input type="text" class="form-control" name='bairro' id="bairro" placeholder="Informe o Bairro">
            </div>
        </div>

       <div class="col-md-6">
            <div class="input-group ui-widget" id="custom-search-input">
                <div class="input-group-text fw-bold">Cidade/UF</div>
                <input type='hidden' name='idcidade' id='idcidade' value=''>
                <input type="text" class="form-control" _required  name='cidade' id="cidade" placeholder="Informe a cidade ">
            </div>
        </div>

        <div class="col-md-2">
            <div class="input-group">
                <div class="input-group-text fw-bold">CEP</div>
                <input type="text" class="form-control" _required  name='cep' id="cep" data-inputmask="'alias': 'phonebe'" placeholder="99999-999">
            </div>
        </div>

        <div class="col-md-8">
            <div class="input-group">
                <div class="input-group-text  fw-bold">(DDD)Telefone</div>
                <input type="text" class="form-control" name='telefone' id="telefone" data-inputmask="'alias': 'phonebe'" placeholder="Informe o telefone da empresa">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Celular/Whatsapp</div>
                <input type="text" class="form-control" _required  name='celular' id="celular" data-inputmask="'alias': 'phonebe'" placeholder="Informe o celular para contato">
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

        <div class="col-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Banco</div>
                <input type="text" class="form-control" _required  name='banco' id="banco" placeholder="Nome do Banco">
            </div>
        </div>

        <div class="col-6">
            <div class="input-group">
                <div class="input-group-text fw-bold">Agência</div>
                <input type="text" class="form-control" _required  name='agencia' id="agencia" placeholder="Nº da Agência">
            </div>
        </div>

        <div class="col-6">
            <div class="input-group">
                <div class="input-group-text fw-bold">Conta Nº</div>
                <input type="text" class="form-control" _required  name='conta' id="conta" placeholder="Nº da Conta">
            </div>

        </div>

        <div class="col-12">
            <div class="input-group">
                <div class="input-group">
                    <div class="input-group-text fw-bold">Modelo Conta</div>
                    <label class='ms-2'>Conta Corrente</label> <input class="form-check-input ms-1" checked type="radio" name="tpconta" id="tpconta" value="Corrente" aria-label="...">
                    <label  class='ms-3'>Poupança </label> <input class="form-check-input ms-3" type="radio" name="tpconta" id="tpconta" value="Poupanca" aria-label="...">
                    
                  
                </div>
        </div>

        <div class="col-12">
            <button type="button" p='form3' s=2 e=3 class="a1 btn btn-primary float-end">Avançar</button>
            <button type="button" p='form1' s=2 e=1 class="b1 btn btn-primary float-end" style='margin-right:60px'>Voltar</button>
          </div>
  
    </div>
    </div>
    <div id='form3' class="forms row g-3  border m-2 mb-3 pb-3" style='display:none'>
        <div class="col-12 fw-bold">
            <label for="">IV. TERCEIROS BENEFICIÁRIOS</label>
        </div>
        <div class="col-12 fw-bold">
            <label for="">V. DADOS COMERCIAIS</label>
        </div>

        <div class="col-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Faturamento Esperado/Mês R$</div>
                <input type="text" class="form-control" _required  name='faturamento' id="faturamento"  data-inputmask="'alias': 'currency'" style="text-align: right;" placeholder="Informe o valor estimado">
            </div>
        </div>

        <div class="col-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Valor Ticket Mêdio R$</div>
                <input type="text" class="form-control" _required  name='ticket' id="ticket"  data-inputmask="'alias': 'currency'" style="text-align: right;" placeholder="Informe o valor mêdio do TICKET">
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

        <div class="col-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Nome</div>
                <input type="text" class="form-control" _required  name='nome' id="nome" placeholder="Contato direto na Empresa">
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Nome da Mãe</div>
                <input type="text" class="form-control" _required  name='mae' id="mae" placeholder="Nome da Mãe do Contato">
            </div>
        </div>

        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-text fw-bold">RG</div>
                <input type="text" class="form-control" _required  name='rg' id="rg" placeholder="Informe o RG">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-text  fw-bold">CPF</div>
                <input type="text" class="form-control" _required  name='cpf' id="cpf" placeholder="Informe o CPF do contato">
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-text fw-bold">Estado Civil</div>
                <select id='estadocivil' name='estadocivil' class='form-control'   >
                    <option value='Casado' selected>Casado(a)</option>
                    <option value='Solteiro'>Solteiro(a)</option>
                    <option value='Divorciado'>Divorciado(a)</option>
                    <option value='Separado'>Separado(a)</option>
                    <option value='Viuvo'>Viuvo(a)</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Profissão</div>
                <input type="text" class="form-control" _required  name='profissao' id="profissao" placeholder="Informe sua profissão">
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-text fw-bold">Endereço</div>
                <input type="text" class="form-control" _required  name='endereco1' id="endereco1" placeholder="Informe o Endereço ">
            </div>
        </div>


        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Bairro</div>
                <input type="text" class="form-control" _required  name='bairro1' id="bairro1" placeholder="Informe o Bairro ">
            </div>
        </div>


        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Cidade/UF</div>
                <input type='hidden' name='idcidade1' id='idcidade1' value=''>
                <input type="text" class="form-control" _required  name='cidade1' id="cidade1" placeholder="Informe a cidade ">
            </div>
        </div>

        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">CEP</div>
                <input type="text" class="form-control" _required  name='cep1' id="cep1" placeholder="99999-999">
            </div>
        </div>

        <div class="col-md-8">
            <div class="input-group">
                <div class="input-group-text  fw-bold">(DDD)Telefone</div>
                <input type="text" class="form-control" _required  name='telefone1' id="telefone1" placeholder="Informe o telefone para contato">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-text fw-bold">Celular/Whatsapp</div>
                <input type="text" class="form-control" _required  name='celular1' id="celular1" placeholder="Informe o celular para contato">
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
            <p>Por favor, envie anexe a copia do seu CPF e RG .</p>
          </div>

       <div class="input-group mb-3" style='display:none'>
        <input type="file" class="form-control" name='copiaCPF' id="copiaCPF">
        <label class="input-group-text" for="copiaCPF">CPF</label>
       </div>
       
       <div class="col-md-6">
         <div class="input-group">
            <div class="input-group-text fw-bold">Email</div>
            <input type="email" class="form-control"  _required  name='email' id="email" data-inputmask="'alias': 'email'" placeholder="Email para Contato">
        </div>
      </div>

       <div class="input-group mb-3">
        <input type="file" class="form-control" name='attachment' id="attachment">
        <label class="input-group-text" for="attachment">RG</label>
       </div>

       <div class="input-group mb-3">
        <input type="file" class="form-control" name='attachment1' id="attachment1">
        <label class="input-group-text" for="attachment1">CPF</label>
       </div>

       <div class="col-12">
        <button type="button" p='form5' name='finalizando' id='finalizando'  class="btn btn-success float-end">AVANÇAR</button>
        <button type="button" p='form5' name='Send mail' id='enviando'  class="btn btn-success float-end" style='display:none'>FINALIZAR</button>
        <button type="button" p='form4' s=5 e=4 class="b1 btn btn-primary float-end" style='margin-right:60px'>Voltar</button>
       </div>


    </div>

      </form>

    

</div>

@endsection
