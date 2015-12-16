<?php
/**
 * Created by PhpStorm.
 * User: fukuda
 * Date: 2015/12/15
 * Time: 17:52
 */
namespace App\Http\Controllers;

use App\Player;
use Goutte\Client;

class WtaController extends Controller
{
    public function getPlayers()
    {
        //全部消す
        foreach (Player::all() as $player) {
            $player->delete();
        }

        //一覧更新
        $client = new Client();
        $crawler = $client->request('GET', 'http://www.wtatennis.com/players');

        $crawler->filter('div.col ul li a')->each(function ($node) {
            $player = new Player;

            $name = explode('(', $node->text());
            $player->name = $name[0];

            $national = str_replace(')', '', $name[1]);
            $player->national = $national;

            $player->url = $node->attr('href');
            $player->save();
        });

        $players = Player::all();
        return view('players.list')->with(compact('players'));
    }

    public function getRank()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://www.tennis.com/rankings/WTA/');

        $result = $crawler->filter('table.ranking-table tr');
        $result->first()->nextAll()->each(function ($node) {
            $splt = preg_split('[\s+]', $node->text());
            $ct = 0;
            foreach ($splt as $txt) {
                echo '[' . $ct . ']' . $txt . '/';
                ++$ct;
            }
            echo '<br>';
        });
    }
}