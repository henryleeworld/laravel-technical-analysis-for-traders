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
     * Accumulation/Distribution Line
     * to determine the flow of money into or out of a security. It should not be confused with the advance/decline line. 
     * While their initials might be the same, these are entirely different indicators, as are their users. 
     * The advance/decline line provides insight into market movements and the accumulation/distribution line is of use to traders seeking to measure buy/sell pressure on a security or confirm the strength of a trend.
     */
    public function getChaikinAccumulationDistributionLine() 
    {
        $this->stock = $this->stock[0];
        echo __('Today\'s highest price: ') . $this->stock['high'] . PHP_EOL;
        echo __('Today\'s lowest price: ') . $this->stock['low'] . PHP_EOL;
        echo __('Today\'s close price: ') . $this->stock['close'] . PHP_EOL;
        echo __('Today\'s trading volume: ') . $this->stock['volume'] . PHP_EOL;
        echo __('Accumulation/Distribution line: ') . ($this->trader->chaikinAccumulationDistributionLine([$this->stock['high']], [$this->stock['low']], [$this->stock['close']], [$this->stock['volume']]))[0] . PHP_EOL;
    }

    /**
     * Relative Strength Index (RSI)
     * momentum indicator used in technical analysis.
     * RSI measures the speed and magnitude of a security's recent price changes to detect overvalued or undervalued conditions in the price of that security.
     */
    public function getRelativeStrengthIndex() 
    {
        $closeAry = array_column($this->stock, 'close');
        foreach ($this->stock as $value) {
            echo __('Today\'s close price: ') . $value['close'] . PHP_EOL;
        }
        foreach ($this->trader->relativeStrengthIndex($closeAry, 2) as $value) {
            echo __('Relative strength index: ') . $value . PHP_EOL;
        }
    }
}
