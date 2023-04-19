<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Unit;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les unités avec leurs activités
    
        $journalTotals = [];
        $activities = Activite::all();
        $units = Unit::with('activites')->get();
    
        // Pour chaque unité, calculer la somme des champs souhaités
        foreach ($units as $unit) {
            if ($unit->journals) {
                $journalTotals[$unit->id] = [
                    'Realisation_Production' => $unit->journals->sum('Realisation_Production'),
                    'Realisation_Vent' => $unit->journals->sum('Realisation_Vent'),
                    'Realisation_ProductionVendue' => $unit->journals->sum('Realisation_ProductionVendue'),
                    'Previsions_Production' => $unit->journals->sum('Previsions_Production'),
                    'Previsions_Vent' => $unit->journals->sum('Previsions_Vent'),
                    'Previsions_ProductionVendue' => $unit->journals->sum('Previsions_ProductionVendue'),
            
                  ];
                    //create a new array activitesTotals and sum  units that have same activites
                    $activitesTotals = [];
                    foreach ($unit->activites as $activite) {
                        if ($activite->journals) {
                            $activitesTotals[$activite->id] = [
                                'Realisation_Production' => $activite->journals->sum('Realisation_Production'),
                                'Realisation_Vent' => $activite->journals->sum('Realisation_Vent'),
                                'Realisation_ProductionVendue' => $activite->journals->sum('Realisation_ProductionVendue'),
                                'Previsions_Production' => $activite->journals->sum('Previsions_Production'),
                                'Previsions_Vent' => $activite->journals->sum('Previsions_Vent'),
                                'Previsions_ProductionVendue' => $activite->journals->sum('Previsions_ProductionVendue'),
                            ];
                        }
                    }
                    $journalTotals[$unit->id]['activitesTotals'] = $activitesTotals;
                    
                    
            } else {
                $journalTotals[$unit->id] = [
                    'Realisation_Production' => 0,
                    'Realisation_Vent' => 0,
                    'Realisation_ProductionVendue' => 0,
                    
                ];
            }
        }
    
        return view('admin.index', ['journalTotals' => $journalTotals, 'units' => $units  , 'activities' => $activities]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
