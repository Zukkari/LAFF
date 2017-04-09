<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{

    //Antud kontroller vastutab data pushi eest, töötab long polling alusel
    public function index()
    {

        //time out meil pole, päring jääb aktiivseks kuni server sellele vastab
        set_time_limit(0);


        while (true) { //sattume tsüklisse, millest tullakse välja vaid siis, kui mingi uus data on sisestatud andmebaasi
            $postitus = DB::table('postitus_vaade')->first(); //data push töötab järgmiselt: kui tekib uue postitus, lisatakse see kasutajal esimeseks ritta ja kirjtuatakse, et uued postitused olemas
            $postituste_arv = DB::table('postitus_vaade')->count(); //lisaks uuendame dünaamiliselt ka postituste arvu


            $last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null; //nö viimane ajaxi pöördumine, esimene kord võib ka null olla

            clearstatcache();

            //Saame teada, viimase andmebaasi sisestatud postituse timestampi
            $last=$timestamp = $postitus->date;
            $last_change_in_data_file = strtotime($last);


            //Kui timestamp on null või kui see on suurem kui eelmine ajaxi timestamp, järelikult, mida uut lisati andmebaasi
            if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call) {
                if ($last_ajax_call == null) { //Kui endine timestamp oli null, siis järelikult tsükkel alles algas, meil vaja initsialiseerida see timestamp, teeme seda ja kliendile saadame vaid aja, kuna uut postitust ei ole lisatud
                    $result = array('timestamp' => $last_change_in_data_file,
                        'arv'=>$postituste_arv);
                    $json = json_encode($result);
                    echo $json;
                    break;

                }
                else { //teisel juhul on uus postitus ja on vaja saata info serverilt kasutajale (postitus.php)

                $result = array(
                    'pealkiri' => $postitus->pealkiri,
                    'info'=>$postitus->kirjeldus,
                    'timestamp' => $last_change_in_data_file,
                    'kasutaja'=>$postitus->kasutaja,
                    'tag'=>$postitus->peatag,
                    'pildilink'=>$postitus->pildilink,
                    'aeg'=>$last,
                    'arv'=>$postituste_arv
                );
                // encode to JSON, render the result (for AJAX)
                $json = json_encode($result);
                echo $json;

                break;}
            } else {
                sleep( 1 );
                continue;
            }
        }
    }
}