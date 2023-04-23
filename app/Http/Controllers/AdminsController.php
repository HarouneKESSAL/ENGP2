<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Unit;
use Carbon\Carbon;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
   // Get the selected button's from the request


   $selectedDate = $request->input('selected_date');
   $cumule = $request->input('cumule');

   if ($request->has('selected_date')) {
    // Filter button was clicked
    $selectedDate = $request->input('selected_date');

  } else if ($request->has('cumule')) {
    // Cumule button was clicked
    $cumule = $request->input('cumule');

  }
  
   $today = date('Y-m-d');

    // If no date is selected, use today's date
    if (!$selectedDate) {
        $selectedDate = $today;
    }


    // Récupérer toutes les unités avec leurs activités
    $journalTotals = [];
    $activities = Activite::all();
    $units = Unit::with('activites', 'journals')->get();

    // Pour chaque unité, calculer la somme des champs souhaités
    foreach ($units as $unit) {
        if ($unit->journals) {
             // Filter the journals by date if filter button is clicked
            if ($selectedDate && !$cumule) {
                $journals = $unit->journals->where('date', $selectedDate);

                
            } else {
                // Calculate cumule between first day of the selectedDate's month and the selectedDate
                $startDate = date('Y-m-01', strtotime($selectedDate));
                $endDate = $selectedDate;
                $journals = $unit->journals->whereBetween('date', [$startDate, $endDate])->sortBy('date');
            }
            $journalTotals[$unit->id] = [
                'Realisation_Production' => $journals->sum('Realisation_Production'),
                'Realisation_Vent' => $journals->sum('Realisation_Vent'),
                'Realisation_ProductionVendue' => $journals->sum('Realisation_ProductionVendue'),
                'Previsions_Production' => $journals->sum('Previsions_Production'),
                'Previsions_Vent' => $journals->sum('Previsions_Vent'),
                'Previsions_ProductionVendue' => $journals->sum('Previsions_ProductionVendue'),
            ];

            //create a new array activitesTotals and sum  units that have same activites
            $activitesTotals = [];
            foreach ($unit->activites as $activite) {
                if ($activite->journals) {
                      // Filter the journals by date if filter button is clicked
                     if ($selectedDate && !$cumule) {
                        $journals = $activite->journals->where('date', $selectedDate);

                    } else {
                         // Calculate cumule between first day of the selectedDate's month and the selectedDate
                        $startDate = date('Y-m-01', strtotime($selectedDate));
                        $endDate = $selectedDate;
                        $journals = $activite->journals->whereBetween('date', [$startDate, $endDate])->sortBy('date');
                    }
                    $activitesTotals[$activite->id] = [
                        'Realisation_Production' => $journals->sum('Realisation_Production'),
                        'Realisation_Vent' => $journals->sum('Realisation_Vent'),
                        'Realisation_ProductionVendue' => $journals->sum('Realisation_ProductionVendue'),
                        'Previsions_Production' => $journals->sum('Previsions_Production'),
                        'Previsions_Vent' => $journals->sum('Previsions_Vent'),
                        'Previsions_ProductionVendue' => $journals->sum('Previsions_ProductionVendue'),
                    ];
                }
            }
            $journalTotals[$unit->id]['activitesTotals'] = $activitesTotals;
            $journalTotals[$unit->id]['journals'] = $journals; // Add filtered and sorted journals to the result

        } 
        else {
            $journalTotals[$unit->id] = [
                'Realisation_Production' => 0,
                'Realisation_Vent' => 0,
                'Realisation_ProductionVendue' => 0,
                'Previsions_Production' => 1,
                'Previsions_Vent' => 1,
                'Previsions_ProductionVendue' => 1,
            ];
        }
    }

    return view('admin.index', ['journalTotals' => $journalTotals, 'units' => $units, 'activities' => $activities,  'selectedDate'=>$selectedDate,'cumule'=> $cumule]);
}



public function show(Request $request)
{
    
    
    
    $activities = Activite::all();
    $units = Unit::with('activites', 'journals')->get();
    $selectedDate = $request->query('selected_date');
    $journals = Journal::where('date', $selectedDate)->get();



    return view('admin.show', ['journals' => $journals, 'units' => $units, 'activities' => $activities,'selectedDate' => $selectedDate]);
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
