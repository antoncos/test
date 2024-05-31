<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\CoinMarketApiService;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Arr;

class UpdateCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coinmarket:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws ConnectionException
     */
    public function handle()
    {
        $currencies = (new CoinMarketApiService())->getCurrencies();
        foreach (Arr::get($currencies, 'data', []) as $item) {
            $currency = Currency::where('code', $item['symbol'])->first();
            $hasUpdate = false;
            if (!$currency) {
                $currency = new Currency;
                $currency->code = $item['symbol'];
                $currency->name = $item['name'];
                $currency->price = 0;
                $this->info("Added new currency: $currency->code");
                $hasUpdate = true;
            }

            $price = (float)Arr::get($item, 'quote.USD.price', 0);
            if ($currency->price !== $price) {
                $currency->price = $price;
                $currency->updated_at = date('Y-m-d H:i:s');
                $hasUpdate = true;
            }

            if ($hasUpdate) {
                $currency->save();
            }
        }

        return 0;
    }
}
