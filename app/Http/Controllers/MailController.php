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

        $path = public_path('uploads');
        $attachment = $request->file('attachment');
        $hora = date("YmdHis").gettimeofday()["usec"];
        $name = $hora.'.'.$attachment->getClientOriginalExtension();
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $attachment->move($path, $name);
        $filename = $path.'/'.$name;
        #sleep(1);

        $attachment1 = $request->file('attachment1');
        $hora = date("YmdHis").gettimeofday()["usec"];
        $name1 = $hora.'.'.$attachment1->getClientOriginalExtension();
        $attachment1->move($path, $name1);
        $filename1 = $path.'/'.$name1;
        #sleep(1);

        $attachment2 = $request->file('attachment2');
        $hora = date("YmdHis").gettimeofday()["usec"];
        $name2 = $hora.'.'.$attachment2->getClientOriginalExtension();
        $attachment2->move($path, $name2);
        $filename2 = $path.'/'.$name2;
        
        $filename = $filename.",".$filename1.",".$filename2;

        $oemail = [];
        $oemail = array("rafael.alves@meuparca.com","ferdinandogalera@gmail.com");
        
        app('App\Http\Controllers\GravaFormController')->index($request);

        try {
           Mail::to($oemail[0])->cc($oemail[1])->send(new Notification($filename));
        } catch (Exception $e) {
            report($e);
            return false;
        }
        $files = explode(",",$filename);
        foreach ($files as $file) { 
            unlink($file) ;
        } 
        echo "<script>alert('Seu CREDENCIAMENTO foi enviado, aguarde contato. Obrigado');document.location='https://www.meuparca.com/';</script>";
        //dd($filename);
        return true;
        //return redirect()->back()->with('success', 'Enviado com Sucesso - Aguarde Contato.');
    }
}