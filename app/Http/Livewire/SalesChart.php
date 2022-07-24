<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Sale;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class SalesChart extends Component
{
    protected $listeners = ['filter', 'refreshComponent'=>'$refresh'];
    public $branch_id = null;

    public function render()
    {
        $branches = Branch::all();

        if($this->branch_id == null){
            $chart = (new ColumnChartModel())
                ->setAnimated(true)
                ->withDataLabels()
                ->withGrid()
                ->setColumnWidth(90)
                ->addColumn('Enero', Sale::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->count('id'), '#f6ad55')
                ->addColumn('Febrero', Sale::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->count('id'), '#fc8181')
                ->addColumn('Marzo', Sale::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->count('id'), '#90cdf4')
                ->addColumn('Abril',  Sale::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->count('id'), '#b01a1b')
                ->addColumn('Mayo',  Sale::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->count('id'), '#d41b2c')
                ->addColumn('Junio',  Sale::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->count('id'), '#ec3c3b')
                ->addColumn('Julio',  Sale::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->count('id'), '#f66665')
                ->addColumn('Agosto',  Sale::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->count('id'), '#90cdf4')
                ->addColumn('Septiembre',  Sale::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->count('id'), '#90cdf4')
                ->addColumn('Octubre',  Sale::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->count('id'), '#90cdf4')
                ->addColumn('Noviembre', Sale::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->count('id'), '#90cdf4')
                ->addColumn('Diciembre', Sale::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->count('id'), '#90cdf4')
            ;
        }else {
            $chart =
            (new ColumnChartModel())
                ->addColumn('Enero', Sale::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#f6ad55')
                ->addColumn('Febrero', Sale::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#fc8181')
                ->addColumn('Marzo', Sale::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Abril',  Sale::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Mayo',  Sale::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Junio',  Sale::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Julio',  Sale::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Agosto',  Sale::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Septiembre',  Sale::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Octubre',  Sale::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Noviembre', Sale::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')
                ->addColumn('Diciembre', Sale::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', date("Y"))->where('branch_id', '=', $this->branch_id)->count('id'), '#90cdf4')

            ;
        }

        return view('livewire.sales-chart',
            compact('branches','chart')
        );

    }
    public function filter($branch_id)
    {
        $this-> branch_id = $branch_id;
    }
}
