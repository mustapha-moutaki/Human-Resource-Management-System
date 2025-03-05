<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContractRequest;
use App\Models\Contract;
class ContractController extends Controller
{
    public function index(){
        $contracts =  Contract::all();
        return view('contracts.index', compact('contracts'));
    }


    public function create(){
        return view('contracts.create');
    }

    public function store(ContractRequest $request){
        Contract::create($request->all());

        return redirect()->route('contracts.index')->with('success', 'contract added successfully!');
    }


    public function edit(Contract $contract)
    {
        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contract moved to trash successfully!');
    }
}