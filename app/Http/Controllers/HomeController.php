<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jose\Object\JWK;
use Jose\Loader;
use Jose\Factory\JWKFactory;
use Jose\Checker\ExpirationTimeChecker;
use Jose\Checker\CheckerManager;
use Assert\Assertion;
use App\GelombangLomba;
use App\Jawaban;
use App\Soal;
use App\SoalJawaban;
use Uuid;


class HomeController extends Controller
{
    public function signdecypt($token)
    {
        $token = 'eyJhbGciOiJSU0EtT0FFUCIsImVuYyI6IkEyNTZHQ00ifQ.iB223YUgHgpMKn6zzWmuPUBB9AiXqcu4avhEJtEj4izbknEoo2yC9-9ZH__YHxuwpQkCZXfDDNaSZ5MprJ6BiUB2eKVOar6xZrEHbezxZJ62bOACATX1ikt3wdEE7M1gfheiQSWyPGb0-tlv7rkpN5wFQFPl25XEISwlntQ8BeAX861eq-CB-nfK2WkQFBC_J7-_Y2Y8Vj27VJJJLeDL3xeMqOFtDXPCOAky7x7whpUkp09-wO2oMhtICf5KGzyrpiYyyHQFohOjoK2W5SckR1S4QF2dmcwnRPOtclGTxj0Nd5GOQCVVqfokT0RZn2xqb5OhlkRzyXOZv6__rJVFgg.mDHsozpboAqXvFh1.PyNTLavCxq0-g-wGGlZLFLrrzEun_VkkLfSTB8VCSCywRc4DBcLmBwNLM3iDbXjb81NYUpLpmWpmnwhL9eYDZZp9Hu0xLjAoLyITRhjmSUi2ld-SCudHry8q8762YKjouZRbLqWGeyx7V7qQNRZDg7utNK6x6zMzPDDrRLV8yA.GjNd1gn0Fo64RFIt9opc6g';

    	$key = json_decode('{"d":"LPB7p2mH80oEcx1tAjJEXPYkh_MfqT3YDj0pUyZclw-8gdMm15REZK_lNPQXaYqt6s5qaZDtN8ytQBDWWlZPdLor3DjLX-bHkr1hOBf94vtpcbGgpi64xuUoG--tUnCqaIdNU84x8px2l99IUdsmuAuZcf-XxD5GPHRTYY1MSOj0u6rTwFw1NP4iGI751cSiBtahmaAHZsLUhOs-sYO-dWaYwLouDHFOom5OkwOFaq-FXvSRkQ6PAoGNTNxHLJW7JLbFrrMJP_OS1JoUGTiIQ5ayjbzUa69Lxa2FwHEa1H4fs5fHndDVZxSXOxiSvhFmGIzOP9Eo5GkamZ-gpKs1QQ","dp":"PgISbGuL-X689M8GXKDD8tLQHY_k3kyLLb-Hrre9AgRzIo-XCfZknGn1S-SyGFbHV9APRNPrGkBfliWj5-TWBaLuNyPPDWA3ra7CbGDLY7gWJ-LhuWnEWNk8YOy8GsGoeo9a4Dx3HJP0ZVpUQtr3I8EEMi9BJFEULyaiIIzUDDk","dq":"XGRHSNOXaVozFi0y0qWjXJbkil_voxHfRzTAdoRbYGWLBtwFLu17ZT-_dhXr0ZwI8e6Yzwvcs84lstMdolNRYWi7g2g0DOjcP7i3euZZY7aMFq1wbu5rSWrwQoCxXixTVGmjFiBcRiHanB-1KSPOLAGOfFynBP9HBbJSty8L_KU","e":"AQAB","kty":"RSA","n":"uEJAcl-SyK4fN6M8ugfK8U4um6uOrTB0BXcGJ7b2eizm6XGpC3QFAyTNmF15rw54RaSZoBXj85oXRGPJVxLdEdX7vvxHH0w6UpgF-0dVw-2_oiGbapev4bqJ4iSJYyORs2giQo4O4DLi2zF15WeqNJHVbEju5GvLo6kgYeaYkmm0PBPJOgm3Ftmidmdku52l70MnnkZNxfbqQ5adDCf20l7_x83-Vdn6M_bFSQlbZYO8KJEm0pK3l0GuLobERZCRuUAKF-8weHnWYxKgQqhU2mg69dTr6L6MxVyk0vKLzhicb-XaCOWbO97BJ6UgCwVix1qGMxLqjtrp4hjGjO-91Q","p":"6ngtlq_VECtXydJvmYozN7IOTaIYq1trvUcnvGb5lgeFNs8LizeTGGEnuudzlCFRN1m7LuYP7MpwtKFSnllrJrZh3pb8S50N2mavZm-K2Vpc_muNU8UfLLBgVa9ANstn_JIhMp-CpQAxDpMEvnecQGauz21Kb7Jf1WKB95hSI4c","q":"yS29dkTCyPuZDVJ2FvgJ9BPPfsD0_EDdxA2bJulOaRo1jepcvE0undsO1Q8JeJ_bpaIWiWMn0fVLuYNQA_RlW7mMQfd0sEbYFHSfDO1OqOtukMcFs62vZmih7INtN_bCPS4c4gE2EMHL9n5V2F9TB5FQHx97dqwEMWljIvBTYsM","qi":"OFTFEhHAYuIEelPiVeh0sqGmKVGWIKAu8-PV4kPGuc-CuU4_9WkhQvY955ZHThEM06VBfSCfyv13fEg-GLI70QWgstt_sMPY5j0zEDUcGLeNm4Tux-BxpXCQw6XF6BYPF1d35U7VZrEWmDSdqQxqAEQ8GyXAS_8H5NqoyLYay38"}', true);

       
        
        try {
             $jwk = new JWK($key);
        
        
            $loader = new Loader();
            $jws = $loader->loadAndDecryptUsingKey(
                $token,            
                $jwk,               
                ['RSA-OAEP'],      
                ['A256GCM'],       
                $recipient_index   
            );

            $test = $jws->getPayload();

            $key2 = json_decode('{"k":"QMeHEupswaLv5uFNPgqdZF-PsAs9_emFG8g-aear8XM","kty":"oct"}', true);

            $jwk2 = JWKFactory::createFromValues($key2);
            $loader2 = new Loader();
            $jws = $loader2->loadAndVerifySignatureUsingKey(
                $test,
                $jwk2,
                ['HS256'],
                $signature_index
            );
            $checker_manager = new CheckerManager();
            $checker_manager->addClaimChecker(new ExpirationTimeChecker());
            $checker_manager->checkJWS($jws, $signature_index);
        } catch (\Exception  $e) {

            // dd($e->getMessage());

            return False;
        }
       
        
        // dd($checker_manager->checkJWS($jws, $signature_index));

// dd($checker_manager);
        return $jws->getPayload();
    }

    public function index(Request $request)
	{
		// echo 'a';
		// echo time();
        $a = $this->signdecypt('a');
        if($a) return $a;
        else return 'curang'; 
	}

    public function session(Request $request)
    {
        

    }

    public function soal(Request $request)
    {
        $this->data['soal'] = Soal::get();
        $this->data['gelombang'] = GelombangLomba::get();
        return view('admin.users.index', $this->data);
    }
    public function addSoal(Request $request)
    {

        $soal = new Soal;
        $soal_id = Uuid::generate(4)->string;
        // dd($soal_id);
        $soal->id = $soal_id;
        $soal->deskripsi_soal = $request->deskripsi;
        $soal->gelombang_lomba_id = $request->gelombang;
        $soal->save();

        foreach ($request->jawaban as $key => $value) {

            $jawaban = new Jawaban;
            $id = Uuid::generate(4)->string;
            $jawaban->id = $id;
            $jawaban->deskripsi_jawaban = $request->jawaban[$key];
            $jawaban->soal_id = $soal_id;
            $jawaban->save();
            if($key == $request->key) {
                $updateSoal = Soal::find($soal_id);
                $updateSoal->jawaban_id = $id;
                $updateSoal->save();
            }
        }

        return back()->with('status', 'sukses');
    }

}