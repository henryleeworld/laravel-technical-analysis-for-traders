<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use LupeCode\phpTraderInterface\Trader;

class TraderController extends Controller
{
    private $trader;

    private $stock;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct(Trader $trader)
    {
        $this->trader = $trader;
        $this->stock = json_decode(Storage::disk('data')->get('aapl.json'), true);
        $this->stock = array_slice($this->stock, 0, 15);
    }

    /**
     * Accumulation/Distribution Line 累積/派發線是一個考慮到價格和成交量的動能指標。
     * 成交量指標背後的信念是成交量變化先於價格。很多時候，在股價開始上升前成交量都會在之前大增。
     * 大部分資金流向指標的目的是想在股價變動前及早發現流入或流出的成交量增加。.
     */
    public function getChaikinAccumulationDistributionLine() 
    {
        $this->stock = $this->stock[0];
        echo '今天的最高價：' . $this->stock['high'] . PHP_EOL;
        echo '今天的最低價：' . $this->stock['low'] . PHP_EOL;
        echo '今天的收盤價：' . $this->stock['close'] . PHP_EOL;
        echo '今天的成交量：' . $this->stock['volume'] . PHP_EOL;
        echo '累積/派發線：' . ($this->trader->chaikinAccumulationDistributionLine([$this->stock['high']], [$this->stock['low']], [$this->stock['close']], [$this->stock['volume']]))[0] . PHP_EOL;
    }

    /**
     * 相對強弱指標。
     * 這個指標主要是透過市場近期漲跌的變化量，衡量近期一段時間內的買盤與賣盤，雙方的相對力量強弱程度。.
     */
    public function getRelativeStrengthIndex() 
    {
        $closeAry = array_column($this->stock, 'close');
        foreach ($this->stock as $value) {
            echo '今天的收盤價：' . $value['close'] . PHP_EOL;
        }
        foreach ($this->trader->relativeStrengthIndex($closeAry, 2) as $value) {
            echo '相對強弱指標：' . $value . PHP_EOL;
        }
    }
}
