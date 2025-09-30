<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'name' => 'PUR BLAC LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'BOSS ORANGE LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'ROYAL RUMBA LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'CAME LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'ONE MILLION LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'ESKODA LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'PINK LOVE LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'MAQUIS BLEU LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 168000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'PUR BLACK ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'BOSS ORANGE ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => '24H ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'BOSS ECHANTILLOON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => "LUNE D'ÉTÉ SET ECHANTILLON",
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'BOSS BLANC',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'BOSS BLEU',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'BOSS NOIR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'PINK LOVE SET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => "LUNE D'ÉTÉ SET",
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'PUR BLACK SET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'ESKODA SET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'CAME SET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'MY COLOUR SET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => '24H SET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'ERATO ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'MAQUIS BLEU ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'CHEOU IGNACE ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'LA VIE EST BELLE ECHANTILLON',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => 5000,
            ],

            [
                'name' => 'MYWAY LONG',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 78000,
                'seller_price' => null,
            ],

            [
                'name' => 'ONALIA',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 67000,
                'seller_price' => 8500,
            ],
            [
                'name' => 'WARRIOR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 67000,
                'seller_price' => 8500,
            ],
            [
                'name' => 'ELOPE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => '24H',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'ERATO',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'BALILA',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 72000,
                'seller_price' => 9000,
            ],
            [
                'name' => 'KISS ME',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'MAX',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'MAQUIS BLEU',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'AXE APOLO',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'AXE PROVOCATION',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'AXE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'ELEMENT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 52000,
                'seller_price' => 13000,
            ],
            [
                'name' => '24K BLANC',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 80000,
                'seller_price' => 20000,
            ],
            [
                'name' => '24K ROUGE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 80000,
                'seller_price' => 20000,
            ],
            [
                'name' => '24K NOIR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 80000,
                'seller_price' => 20000,
            ],


            [
                'name' => 'DUBAI CHINOIS',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => null,
            ],


            [
                'name' => 'HEAVEN MEN',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 104000,
                'seller_price' => 6500,
            ],
            [
                'name' => 'DOLLAR GRAND',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 64000,
                'seller_price' => 8000,
            ],
            [
                'name' => 'DOLLAR PETIT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 66000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'ROYAL RUMBA',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'EXECUTIF NIGHT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'BLACK MARKET',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'DUBAI ORIGINAL',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 32000,
                'seller_price' => 8500,
            ],
            [
                'name' => '24K ORIGINAL',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 60000,
                'seller_price' => 15000,
            ],
            [
                'name' => 'PERFECT LINE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 56000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'CASABLANCA NOIR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'CASABLANCA BLANC',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'RIO',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 44000,
                'seller_price' => 3000,
            ],
            [
                'name' => 'PROFESSIONNEL',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 56000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'FIVE ELEVEN',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 56000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'CHANGE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 56000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'HERO',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 44000,
                'seller_price' => 3000,
            ],
            [
                'name' => 'NIKITA',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 56000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'GOLD WHITE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 44000,
                'seller_price' => 3000,
            ],
            [
                'name' => 'BLUE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 28000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'ONE LIVE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 40000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'CONTROL NOIR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 40000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'CONTROL ROUGE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 40000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'TECHNO',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 72000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'PARIS EN FLEUR CHINOIS',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'PARIS EN FLEUR ORIGINAL',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 20000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'PUR BLACK PETIT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 110000,
                'seller_price' => 7000,
            ],
            [
                'name' => 'ONE LOVE DEO',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'NOUVEAUTE PARFUM',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 88000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'DEODORANT NOUVEAUTE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'NATADOR DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'FOR HIM BLEU',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'FORHIM NOIR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'FOR HIM BLANC',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'WISH BORN',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 22000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'COTON CLUB DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'CAME DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'TECHNO DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'FIVE ELEVEN DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'PROFESSIONNEL DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'RED DIAMANT DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'RED DIAMANT GRAND',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 60000,
                'seller_price' => 15000,
            ],
            [
                'name' => 'RED DIAMANT PETIT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 48000,
                'seller_price' => 6000,
            ],
            [
                'name' => '24K DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => '24H DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'MALIZIA PARFUM',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'MALIZIA DEODORANT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 14000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'UNIQUE PARFUM',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 6000,
            ],
            [
                'name' => 'INTENSE MAN',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 6000,
            ],
            [
                'name' => 'INTENSE GOLD',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 8000,
            ],
            [
                'name' => 'INTENSE NOIR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 8000,
            ],
            [
                'name' => 'MARTELOT GRAND',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 5000,
            ],
            [
                'name' => 'MARTELOT PETIT',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 2500,
            ],
            [
                'name' => 'SAUVAGE DIOR',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 7000,
            ],
            [
                'name' => 'SUAVE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => null,
                'seller_price' => 6000,
            ],

            [
                'name' => 'MAISON ROUGE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'MAISON BLANCHE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'MAISON DOREE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'MAISON BLEUE',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],
            [
                'name' => "HISTOIRE D'UNE AMOUR",
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'SEE ME',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'SUMMER',
                'category' => 'PARFUM ET DEODORANT',
                'lot_price' => 36000,
                'seller_price' => 4500,
            ],

            [
                'name' => 'DISAAR GRAND',
                'category' => 'POMMADE',
                'lot_price' => 88000,
                'seller_price' => 5500,
            ],
            [
                'name' => 'SLIMING ROUGE',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'SLIMING CREAM',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'MAX MAN CREAM BLEU',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'MAX MAN CREAM JAUNE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'MAX MAN CREAM ROUGE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'MAX MAN CREAM VERT',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'MAX MAN HUILE BLEUE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'MAX MAN HUILE JAUNE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'MAX MAN HUILE ROUGE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'SLIMING HUILE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'BREAST HUILE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'POMMADE FESSE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'HUILE FESSE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'HUILE CHEVEUX',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'CAFEINE',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'HUILE CHEVEUX DISAAR',
                'category' => 'POMMADE',
                'lot_price' => 144000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'HEIGHT PACGE',
                'category' => 'POMMADE',
                'lot_price' => 96000,
                'seller_price' => 12000,
            ],
            [
                'name' => 'DISAAR PETIT',
                'category' => 'POMMADE',
                'lot_price' => 56000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'CREAM SAINT',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'CREAM FESSIER',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'VITFE POMMADE',
                'category' => 'POMMADE',
                'lot_price' => 85000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'VITFE LIQUIDE',
                'category' => 'POMMADE',
                'lot_price' => 120000,
                'seller_price' => 7500,
            ],
            [
                'name' => 'SCORPION POMMADE',
                'category' => 'POMMADE',
                'lot_price' => 25000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'SCORPION LIQUIDE',
                'category' => 'POMMADE',
                'lot_price' => 30000,
                'seller_price' => 7500,
            ],
            [
                'name' => 'RAGOUDJI',
                'category' => 'POMMADE',
                'lot_price' => 75000,
                'seller_price' => 2500,
            ],
            [
                'name' => 'DICLOMOL',
                'category' => 'POMMADE',
                'lot_price' => 65000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'DEEPCUR',
                'category' => 'POMMADE',
                'lot_price' => 44000,
                'seller_price' => 3000,
            ],
            [
                'name' => 'BERLIN POMMADE',
                'category' => 'POMMADE',
                'lot_price' => 75000,
                'seller_price' => 2500,
            ],
            [
                'name' => 'MATRIX CREAM',
                'category' => 'POMMADE',
                'lot_price' => 32000,
                'seller_price' => 1800,
            ],
            [
                'name' => 'JOHNSON CREAM',
                'category' => 'POMMADE',
                'lot_price' => 32000,
                'seller_price' => 1800,
            ],
            [
                'name' => 'PHILOBACT CREAM',
                'category' => 'POMMADE',
                'lot_price' => 70000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'FLAMBACT',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 4000,
            ],
            [
                'name' => 'SULFOREC',
                'category' => 'POMMADE',
                'lot_price' => 70000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'YTACAN',
                'category' => 'POMMADE',
                'lot_price' => 100000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'YTACAN PLUS',
                'category' => 'POMMADE',
                'lot_price' => 100000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'FEVICIDE',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 4000,
            ],
            [
                'name' => 'EPIDERM',
                'category' => 'POMMADE',
                'lot_price' => 80000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'ABONIKI GRAND',
                'category' => 'POMMADE',
                'lot_price' => 100000,
                'seller_price' => 12000,
            ],
            [
                'name' => 'ABONIKI PETIT',
                'category' => 'POMMADE',
                'lot_price' => 200000,
                'seller_price' => 22000,
            ],
            [
                'name' => 'LAYOMI PETIT',
                'category' => 'POMMADE',
                'lot_price' => 14000,
                'seller_price' => 750,
            ],
            [
                'name' => 'SEWA PETIT',
                'category' => 'POMMADE',
                'lot_price' => 14000,
                'seller_price' => 750,
            ],
            [
                'name' => 'SEWA CHEVEUX',
                'category' => 'POMMADE',
                // pas de lot_price précisé pour ce produit
                'lot_price' => null,
                'seller_price' => 5500,
            ],
            [
                'name' => 'HEEL BALM',
                'category' => 'POMMADE',
                'lot_price' => 45000,
                'seller_price' => 4000,
            ],
            [
                'name' => 'HAND CREAM',
                'category' => 'POMMADE',
                'lot_price' => 40000,
                'seller_price' => 4000,
            ],

            [
                'name' => 'LOTION COLLAGEN',
                'category' => 'POMMADE',
                'lot_price' => null,
                'seller_price' => null,
            ],


            [
                'name' => 'VIGOR DOCTOR',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 40000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'CHARCOAL AICHUN',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 22000,
                'seller_price' => 2000,
            ],
            [
                'name' => 'CHARCOAL BECKON PETIT',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 25000,
                'seller_price' => 2400,
            ],
            [
                'name' => 'CHARCOAL BECKON GRAND',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CHARCOAL',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CHARLIE GRAND',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 22000,
                'seller_price' => 2000,
            ],
            [
                'name' => 'CHARLIE PETIT',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 22000,
                'seller_price' => 2000,
            ],
            [
                'name' => 'CHARLIE GEL GRAND',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 29000,
                'seller_price' => 2500,
            ],
            [
                'name' => 'CHARLIE GEL PETIT',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 29000,
                'seller_price' => 2500,
            ],
            [
                'name' => 'MAXAM GEL GRAND',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 22000,
                'seller_price' => 2000,
            ],
            [
                'name' => 'MAXAM GEL PETIT',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 35000,
                'seller_price' => 1500,
            ],
            [
                'name' => 'ALOES BECKON',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 23000,
                'seller_price' => 2200,
            ],
            [
                'name' => 'CAROTTE BECKON',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 27000,
                'seller_price' => 2500,
            ],
            [
                'name' => 'PATE CIGARETTE',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'PATE REFRESH',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 32000,
                'seller_price' => 4200,
            ],
            [
                'name' => 'PATE ORAL B',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 30000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'PATE DARBOUX CLOU DE GIROFE',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 20000,
                'seller_price' => 4000,
            ],
            [
                'name' => 'PATE DARBOUX RED',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 22000,
                'seller_price' => 4200,
            ],
            [
                'name' => 'PATE DARBOUX BASILIC',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 20000,
                'seller_price' => 4000,
            ],
            [
                'name' => 'COLGATE GRAND 230G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 40000,
                'seller_price' => 11000,
            ],
            [
                'name' => 'COLGATE MOYEN 175G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 32000,
                'seller_price' => 8000,
            ],
            [
                'name' => 'COLGATE PETIT 130G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 36000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'COLGATE HERBAL 230G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 50000,
                'seller_price' => 13000,
            ],
            [
                'name' => 'COLGATE HERBAL 175G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 38000,
                'seller_price' => 10000,
            ],
            [
                'name' => 'COLGATE HERBAL 130G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 36000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'COLGATE HERBAL 70G',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 6500,
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CLOSE-UP VERT',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 50000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'CLOSE-UP ROUGE',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 22000,
                'seller_price' => 4500,
            ],
            [
                'name' => 'SIGNAL',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 40000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'COLGATE MAX FRESH',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 40000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'BIODENT',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 32000,
                'seller_price' => 3000,
            ],
            [
                'name' => 'ALOES MORINGA',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => 32000,
                'seller_price' => 3000,
            ],
            [
                'name' => 'VIGOR DOCTOR CLOU DE GIROFE',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CHARCOAL BLACK',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CHARCOAL BLANC',
                'category' => 'PATES DENTIFRICES',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],

            [
                'name' => 'PAPIER PURA',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => 16000,
                'seller_price' => 750,
            ],
            [
                'name' => 'COTON TIGE GRAND',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => 27000,
                'seller_price' => 1700,
            ],
            [
                'name' => 'COTON TIGE PETIT',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => 25000,
                'seller_price' => 900,
            ],
            [
                'name' => 'BALAIE',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'PORTE MANTEAU',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null,
                'seller_price' => 3200,
            ],
            [
                'name' => 'TOILE D\'ARAIGNEE',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'MOP',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CALISSIF OU SLIP',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'SHIRT',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => 24000,
            ],
            [
                'name' => 'SCOTCH',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'HUILE D\'OLIVE',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'BONBON GINSING',
                'category' => 'PAPIER ET DIVERS',
                'lot_price' => 33000,
                'seller_price' => 1100,
            ],

            [
                'name' => 'PENIS ARTIFICIEL',
                'category' => 'SEXTOYS',
                'lot_price' => null,
                'seller_price' => 11000, // prix unité non précisé
            ],
            [
                'name' => 'VIBRO 2 EN 1',
                'category' => 'SEXTOYS',
                'lot_price' => null,
                'seller_price' => 13000, // prix unité non précisé
            ],
            [
                'name' => 'SUCEUSE',
                'category' => 'SEXTOYS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'SPRAY',
                'category' => 'SEXTOYS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'PROTEGE SLIP',
                'category' => 'SEXTOYS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'CORDE',
                'category' => 'SEXTOYS',
                'lot_price' => 4000,
                'seller_price' => null, // prix unité non précisé (4000/12)
            ],
            [
                'name' => 'SHILAJI',
                'category' => 'SEXTOYS',
                'lot_price' => null,
                'seller_price' => 5000, // prix unité non précisé
            ],

            [
                'name' => 'LUDAO GRAND',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 26000,
                'seller_price' => 1000,
            ],
            [
                'name' => 'LUDAO PETIT',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 25000,
                'seller_price' => 700,
            ],
            [
                'name' => 'INSECTICIDES PISTOLET',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 32000,
                'seller_price' => 1500,
            ],
            [
                'name' => 'SAVON NITRO',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 40000,
                'seller_price' => 3500,
            ],
            [
                'name' => 'SAVON ALOES',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 55000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'SAVON COLLAGEN GRAND',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 72000,
                'seller_price' => 6000,
            ],
            [
                'name' => 'SAVON COLLAGEN PETIT',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 40000,
                'seller_price' => 5000,
            ],
            [
                'name' => 'SAVON NOBACTER',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => null, // prix manquant
                'seller_price' => null, // prix manquant
            ],
            [
                'name' => 'SAVON BIG BOY',
                'category' => 'LUDAO ET SAVONS',
                'lot_price' => 40000,
                'seller_price' => 3500,
            ],

            [
                'name' => 'THE ŒIL',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE GENOU',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE TENSION',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE GENSING PETIT',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE GINGEMBRE MIEL',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE PALU',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE FOIE',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE REIN',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE INFLAMMATOIRE',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE TOUX',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE CŒUR',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE TONIC NOIR',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE TONIC ROUGE',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE ULCERE',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE VERT',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE DEFECATION',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE GINSENG GRAND',
                'category' => 'THES',
                'lot_price' => 25000,
                'seller_price' => 600,
            ],
            [
                'name' => 'THE PLAT',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE GENOU 2',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE PROSTATE',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE ŒIL 2',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE FESSE',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE MINCEUR ROSE',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE SLIM LEMON',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE DES NERFS',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE LOLO DEBOUT',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE HOMME FORT',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE MACCA HOMME',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE MACCA FEMME',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE ŒIL ET NERF',
                'category' => 'THES',
                'lot_price' => 65000,
                'seller_price' => 850,
            ],
            [
                'name' => 'THE HERBAL SLIM',
                'category' => 'THES',
                'lot_price' => 140000,
                'seller_price' => 1500,
            ],
            [
                'name' => 'THE CATHERINE DE CHINE',
                'category' => 'THES',
                'lot_price' => 120000,
                'seller_price' => 2500,
            ],
            [
                'name' => 'THE ROSELLE',
                'category' => 'THES',
                'lot_price' => 100000,
                'seller_price' => 1000,
            ],
            [
                'name' => 'THE 28 DAYS BLANC',
                'category' => 'THES',
                'lot_price' => null,
                'seller_price' => 2000, // prix unité non précisé
            ],
            [
                'name' => 'THE 28 DAYS ROUGE',
                'category' => 'THES',
                'lot_price' => null,
                'seller_price' => 2000, // prix unité non précisé
            ],

        ]);
    }
}
