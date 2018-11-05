<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Khill\Lavacharts\Lavacharts;
date_default_timezone_set("America/Denver");

class ChartsController extends Controller
{
    public function weather($date){
        $myfile = fopen("../data/" . $date . ".txt", "r") or die("Unable to open file!");
        $values = array(array());
        $splitIndex = 0;
        $pos = 0;
        $row = 0;
        $col = 0;
        while(!feof($myfile)){
            $curr = (string)fgets($myfile);
            if ($curr == "") break;
            for ($col = 0; $col < 12; $col++){
                $splitIndex = strpos($curr,"|",$pos+1);
                $values[$row][$col] = substr($curr,$pos,$splitIndex-$pos);
                $pos = $splitIndex + 1;
            }
            $values[$row][$col] = substr($curr,$pos);
            $row++;
            $pos = 0;
        }
        $numofRows = $row;
        fclose($myfile);

        //Build the Charts//////////////////////////////////////////////////////////////////////////////
        $lava = new Lavacharts;
        //Temperature Charts////////////////////////////////////////////////////////////////////////////
        $temperatures = $lava->DataTable();
        $temperatures->addTimeOfDayColumn('Time')
            ->addNumberColumn('Temp')
            ->addNumberColumn('Dew Point');
        for ($row = 0; $row < $numofRows - 1; $row++){
            $temperatures->addRow([[(int)$values[$row][0],(int)$values[$row][1],(int)$values[$row][2]],
                (float)$values[$row][8],
                (float)$values[$row][12]]);
        }
        $lava->LineChart('Temps', $temperatures, ['title' => 'Temperatures',
            'hAxis' => [
                'viewWindow' => ['min' => [0,0,0], 'max' => [23,59,0]],
                'ticks' => [['v'=>[0,0,0], 'f'=>'12:00'],['v'=>[2,0,0], 'f'=>'2:00'],['v'=>[4,0,0], 'f'=>'4:00'],
                    ['v'=>[6,0,0], 'f'=>'6:00'],['v'=>[8,0,0], 'f'=>'8:00'],['v'=>[10,0,0], 'f'=>'10:00'],
                    ['v'=>[12,0,0], 'f'=>'12:00'],['v'=>[14,0,0], 'f'=>'2:00'],['v'=>[16,0,0], 'f'=>'4:00'],
                    ['v'=>[18,0,0], 'f'=>'6:00'],['v'=>[20,0,0], 'f'=>'8:00'],['v'=>[22,0,0], 'f'=>'10:00']]
            ],
            'vAxis' => [
                'title' => 'Fahrenheit']]);

        //Wind Speed Charts/////////////////////////////////////////////////////////////////////////////
        $windSpeed = $lava->DataTable();
        $windSpeed->addTimeOfDayColumn('Time')
            ->addNumberColumn('Wind Speed')
            ->addNumberColumn('Wind Gusts');
        for ($row = 0; $row < $numofRows - 1; $row++){
            $windSpeed->addRow([[(int)$values[$row][0],(int)$values[$row][1],(int)$values[$row][2]],
                (float)$values[$row][4],
                (float)$values[$row][5]]);
        }
        $lava->ComboChart('WindSpeed', $windSpeed, [
            'title' => 'Wind Speed',
            'seriesType' => 'line',
            'series' => [
                1 => ['type' => 'scatter']
            ],
            'hAxis' => [
                'viewWindow' => ['min' => [0,0,0], 'max' => [23,59,0]],
                'ticks' => [['v'=>[0,0,0], 'f'=>'12:00'],['v'=>[2,0,0], 'f'=>'2:00'],['v'=>[4,0,0], 'f'=>'4:00'],
                    ['v'=>[6,0,0], 'f'=>'6:00'],['v'=>[8,0,0], 'f'=>'8:00'],['v'=>[10,0,0], 'f'=>'10:00'],
                    ['v'=>[12,0,0], 'f'=>'12:00'],['v'=>[14,0,0], 'f'=>'2:00'],['v'=>[16,0,0], 'f'=>'4:00'],
                    ['v'=>[18,0,0], 'f'=>'6:00'],['v'=>[20,0,0], 'f'=>'8:00'],['v'=>[22,0,0], 'f'=>'10:00']]
            ],
            'vAxis' => [
                'title' => 'MPH']
        ]);

        //Wind Direction Charts/////////////////////////////////////////////////////////////////////////
        $windDirection = $lava->DataTable();
        $windDirection->addTimeOfDayColumn('Time')
            ->addNumberColumn('Wind Direction');
        for ($row = 0; $row < $numofRows - 1; $row++){
            $windDirection->addRow([[(int)$values[$row][0],(int)$values[$row][1],(int)$values[$row][2]],
                (float)$values[$row][3]]);
        }
        $lava->ScatterChart('WindDirection', $windDirection, [
            'title' => 'Wind Direction',
            'hAxis' => [
                'viewWindow' => ['min' => [0,0,0], 'max' => [23,59,0]],
                'ticks' => [['v'=>[0,0,0], 'f'=>'12:00'],['v'=>[2,0,0], 'f'=>'2:00'],['v'=>[4,0,0], 'f'=>'4:00'],
                    ['v'=>[6,0,0], 'f'=>'6:00'],['v'=>[8,0,0], 'f'=>'8:00'],['v'=>[10,0,0], 'f'=>'10:00'],
                    ['v'=>[12,0,0], 'f'=>'12:00'],['v'=>[14,0,0], 'f'=>'2:00'],['v'=>[16,0,0], 'f'=>'4:00'],
                    ['v'=>[18,0,0], 'f'=>'6:00'],['v'=>[20,0,0], 'f'=>'8:00'],['v'=>[22,0,0], 'f'=>'10:00']]
            ],
            'vAxis' => [
                'gridlines' => ['count' => 5],
                'ticks' => [['v'=>0, 'f'=>'N'],['v'=>90, 'f'=>'E'],
                    ['v'=>180, 'f'=>'S'],['v'=>270, 'f'=>'W'],['v'=>360, 'f'=>'N']],
                'viewWindow' => ['max' => 360],
                'maxValue' => 360,
                'minValue' => 0,
                'title' => 'From'
            ]]);

        //Precipitation Charts//////////////////////////////////////////////////////////////////////////
        /*
        $precipitation = $lava->DataTable();
        $precipitation->addTimeOfDayColumn('Time')
            ->addNumberColumn('Precip. Rate')
            ->addNumberColumn('Precip. Accum. Total');
        for ($row = 0; $row < $numofRows - 1; $row++){
            $precipitation->addRow([[(int)$values[$row][0],(int)$values[$row][1],(int)$values[$row][2]],
                (float)$values[$row][9],
                (float)$values[$row][10]]);
        }
        $lava->LineChart('Precipitation', $precipitation, ['title' => 'Precipitation',
            'hAxis' => [
                'viewWindow' => ['min' => [0,0,0], 'max' => [23,59,0]],
                'ticks' => [['v'=>[0,0,0], 'f'=>'12:00'],['v'=>[2,0,0], 'f'=>'2:00'],['v'=>[4,0,0], 'f'=>'4:00'],
                    ['v'=>[6,0,0], 'f'=>'6:00'],['v'=>[8,0,0], 'f'=>'8:00'],['v'=>[10,0,0], 'f'=>'10:00'],
                    ['v'=>[12,0,0], 'f'=>'12:00'],['v'=>[14,0,0], 'f'=>'2:00'],['v'=>[16,0,0], 'f'=>'4:00'],
                    ['v'=>[18,0,0], 'f'=>'6:00'],['v'=>[20,0,0], 'f'=>'8:00'],['v'=>[22,0,0], 'f'=>'10:00']]
            ],
            'vAxis' => [
                'title' => 'in.']]);
        */
        //Pressure Charts///////////////////////////////////////////////////////////////////////////////
        $pressure = $lava->DataTable();
        $pressure->addTimeOfDayColumn('Time')
            ->addNumberColumn('Pressure');
        for ($row = 0; $row < $numofRows - 1; $row++){
            $pressure->addRow([[(int)$values[$row][0],(int)$values[$row][1],(int)$values[$row][2]],
                (float)$values[$row][11]]);
        }
        $lava->LineChart('Pressure', $pressure, ['title' => 'Pressure',
            'hAxis' => [
                'viewWindow' => ['min' => [0,0,0], 'max' => [23,59,0]],
                'ticks' => [['v'=>[0,0,0], 'f'=>'12:00'],['v'=>[2,0,0], 'f'=>'2:00'],['v'=>[4,0,0], 'f'=>'4:00'],
                    ['v'=>[6,0,0], 'f'=>'6:00'],['v'=>[8,0,0], 'f'=>'8:00'],['v'=>[10,0,0], 'f'=>'10:00'],
                    ['v'=>[12,0,0], 'f'=>'12:00'],['v'=>[14,0,0], 'f'=>'2:00'],['v'=>[16,0,0], 'f'=>'4:00'],
                    ['v'=>[18,0,0], 'f'=>'6:00'],['v'=>[20,0,0], 'f'=>'8:00'],['v'=>[22,0,0], 'f'=>'10:00']]
            ],
            'vAxis' => [
                'title' => 'in.']]);

        return view('pages.weather', ['lava' => $lava, 'values' => $values, 'date' => $date]);
    }
}
