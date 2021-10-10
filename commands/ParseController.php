<?php

namespace app\commands;

use app\models\Quotes;
use app\models\Tickers;
use yii\console\Controller;
use yii\db\Expression;

class ParseController extends Controller
{
    public function actionIndex()
    {
        $tickers = Tickers::find()->indexBy('short_name')->asArray()->all();
        $tickers_list = $this->key_implode($tickers, "+");
        $url = 'https://tradernet.ru/securities/export?tickers=' . $tickers_list . '&params=ltt+bbp+bap+c';
        while (true && count($tickers) > 0) {
            sleep(5);
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $url);
            if ($response->getStatusCode() == 200) {
                $result = json_decode($response->getBody());
                foreach ($result as $data){
                    $quotes = new Quotes();
                    $quotes->ticker_id = $tickers[$data->c]['id'];
                    $quotes->bbp = $data->bbp;
                    $quotes->bap = $data->bap;
                    $quotes->ltt = $data->ltt;
                    $quotes->created_at = (new Expression('NOW()'));
                    $quotes->getSpred();
                    if($quotes->save()){
                        echo 'Успешно сохранен! ID Котировки = '.$quotes->id."\n";
                    }else{
                        echo 'Упс! Не сохранен!';
                    }
                }
            } else {
                echo 'Error! Something went wrong -> ' . $response->getBody();
            }
        }
    }

    protected function key_implode($array, $glue)
    {
        $result = "";
        foreach ($array as $key => $value) {
            $result .= $key . $glue;
        }
        return substr($result, 0, -1);
    }
}
