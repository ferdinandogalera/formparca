<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Mail\Notification;
use Illuminate\Http\Request;



class MailController extends Controller
{
    /**
     * email send view.
     *
     * @return $this
     */
    public function mailView()
    {
        return view('mailView');
    }

    /**
     * save file and send mail.
     *
     * @return $this
     */
    public function mailSend(Request $request)
    {
        /*$input = $request->validate([
            'email' => 'required',
            'attachment' => 'required',
            'attachment1' => 'required',
            'attachment2' => 'required'
        ]);*/
        /*
        
        RG = RG
        CPF = CPF
        CR = COMPROVANTE RESIDENCIA
        DB = DOMICILIO BANCARIO 
        EB = EXTRATO BANCARIO 
        CC = CARTAO CNPJ 
        */

        $hora = date("YmdHis").gettimeofday()["usec"];
        $cpf = $request['cpf'];
        $cpf = str_replace("-","",str_replace(".","",$cpf));
        $pfj = $request['tppessoa'];

        $path = public_path('uploads');
        
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        
        $attachment = $request->file('attachment');
        $name = $cpf."_RG.".$attachment->getClientOriginalExtension();
        $attachment->move($path, $name);
        $filename = $path.'/'.$name;
        FILE::chmod($filename,777);
        

        $attachment1 = $request->file('attachment1');
        $name1 = $cpf."_CPF.".$attachment1->getClientOriginalExtension();
        $attachment1->move($path, $name1);
        $filename1 = $path.'/'.$name1;
        FILE::chmod($filename1,777);
        
        $attachment2 = $request->file('attachment2');
        $name2 = $cpf."_CR.".$attachment2->getClientOriginalExtension();
        $attachment2->move($path, $name2);
        $filename2 = $path.'/'.$name2;
        FILE::chmod($filename2,777);
        

        $attachment3 = $request->file('attachment3');
        $name3 = $cpf."_DB.".$attachment3->getClientOriginalExtension();
        $attachment3->move($path, $name3);
        $filename3 = $path.'/'.$name3;
        FILE::chmod($filename3,777);
        

        $attachment4 = $request->file('attachment4');
        $name4 = $cpf."_EB.".$attachment4->getClientOriginalExtension();
        $attachment4->move($path, $name4);
        $filename4 = $path.'/'.$name4;
        FILE::chmod($filename4,777);
        

        $filename = $filename.",".$filename1.",".$filename2.",".$filename3.",".$filename4;

        if ($pfj=="PJ")  {
            $attachment5 = $request->file('attachment5');
            $name5 = $cpf."_CC.".$attachment5->getClientOriginalExtension();
            $attachment5->move($path, $name5);
            $filename5 = $path.'/'.$name5;
            FILE::chmod($filename5,777);
            $filename .= ",".$filename5;
        }
        

        #salva os dados do formulario na tabela CREDENCIADO 
        app('App\Http\Controllers\GravaFormController')->index($request);

        
        $oemail = [];
        $oemail = array("rafael.alves@meuparca.com","ferdinandogalera@gmail.com");

        Mail::to($oemail[1])->cc($oemail[0])->send(new Notification($filename));
        echo "<script>alert('Seu CREDENCIAMENTO foi enviado, aguarde contato. Obrigado');
        setTimeout(function() {window.location.href = 'https://www.meuparca.com';}, 1);</script>";
        return view('mailView');
        //return redirect()->back()->with('success', 'Enviado com Sucesso - Aguarde Contato.');
    }
}