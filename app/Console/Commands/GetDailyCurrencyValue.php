<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDailyCurrencyValue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get currency values for USD and EUR';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currencies = ['usd','eur','rub'];




        foreach ($currencies as $currency)
        {
            $todaysCurrency = ExchangeRates::where('currency', $currency)
                ->whereDate('created_at', Carbon::now())
                ->first();
            if ($todaysCurrency !== null) {
                continue;
            } else{
                $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");
                ExchangeRates::create([
                    'currency' => $currency,
                    'value' => $response->json()['exchange_middle']
                ]);
            }

        }

    }
}
