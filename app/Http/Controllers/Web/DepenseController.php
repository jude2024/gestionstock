<?php

namespace App\Http\Controllers\Web;

use App\Models\Depense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepenseController extends Controller
{
   public function index(Request $request)
{
    $query = Depense::query();

    // Filtre par date
    if ($request->filled('date_start')) {
        $query->where('date_depense', '>=', $request->date_start);
    }
    if ($request->filled('date_end')) {
        $query->where('date_depense', '<=', $request->date_end);
    }

    // Pagination (10 par page)
    $depenses = $query->orderBy('date_depense', 'desc')->paginate(10);

    // Garde les filtres dans l'URL pour la pagination
    $depenses->appends($request->all());

    return view('depenses.index', compact('depenses'));
}


    public function create()
    {
        return view('depenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'montant' => 'required|numeric',
            'date_depense' => 'required|date',
        ]);

        Depense::create($request->all());

        return redirect()->route('depenses.index')->with('success', 'Dépense enregistrée.');
    }

    public function show(Depense $depense)
    {
        return view('depenses.show', compact('depense'));
    }

    public function edit(Depense $depense)
    {
        return view('depenses.edit', compact('depense'));
    }

    public function update(Request $request, Depense $depense)
    {
        $request->validate([
            'description' => 'required|string',
            'montant' => 'required|numeric',
            'date_depense' => 'required|date',
        ]);

        $depense->update($request->all());

        return redirect()->route('depenses.index')->with('success', 'Dépense mise à jour.');
    }

    public function destroy(Depense $depense)
    {
        $depense->delete();
        return redirect()->route('depenses.index')->with('success', 'Dépense supprimée.');
    }
}
