<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Carbon\Carbon; 
use App\Notifications\RequestStatusNotification; 

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::where('user_id', auth()->id())->get();
        
        return view('administrations.index', compact('leaves'));

    }

    // public function accept(Leave $leave)
    // {
    //     $leave->status = 'accepted';
    //     $leave->save();
    //     return back();
    // }

    // public function refuse(Leave $leave)
    // {
    //     $leave->status = 'refused';
    //     $leave->save();
    //     return back();
    // }
    public function accept(Leave $leave)
    {
        $leave->status = 'accepted';
        $leave->save();
    
        // Notify the user
        $leave->user->notify(new RequestStatusNotification('accepted'));
    
        // Return updated notification count
        return response()->json([
            'message' => 'Leave request accepted!',
            'notificationCount' => auth()->user()->unreadNotifications->count()
        ]);
    }
    
    public function refuse(Leave $leave)
    {
        $leave->status = 'refused';
        $leave->save();
    
        // Notify the user
        $leave->user->notify(new RequestStatusNotification('refused'));
    
        // Return updated notification count
        return response()->json([
            'message' => 'Leave request refused!',
            'notificationCount' => auth()->user()->unreadNotifications->count()
        ]);
    }
    
    public function updateRequestStatus(Request $request, $id)
{
    $employee = User::findOrFail($request->employee_id); // geting the user
    $status = $request->status; 

    // save data in the db
    $requestModel = RequestModel::findOrFail($id);
    $requestModel->status = $status;
    $requestModel->save();

    //send notificatiob
    $employee->notify(new RequestStatusNotification($status));

    return response()->json(['message' => 'your request update with success']);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        
    //     // Validate the request
    //     $validated = $request->validate([
    //         'days_off' => 'required|integer|min:1',
    //         'description' => 'required|string',
    //         'start_date' => 'required|date|after_or_equal:today',
    //     ]);
    
    //     $daysOff = $validated['days_off'];
    //     $user = auth()->user();
    //     $availableLeave = $user->leaveBalance();
    //     if ($validated['days_off'] > $availableLeave) {
    //         return back()->withErrors(['message' => 'You do not have enough leave balance.']);
    //     }


    //     // Create a new leave request
    //     $leave = Leave::create([
    //         'user_id' => auth()->id(),
    //         'first_name' => auth()->user()->first_name,
    //         'description' => $validated['description'],
    //         'start_date' => $validated['start_date'],
    //         'days_off' => $daysOff,
    //         'status' => 'pending',
    //     ]);
    
    //     return redirect()->back()->with('success', 'Leave request submitted successfully!');
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'days_off' => 'required|integer|min:1',
            'description' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
        ]);
    
        $user = auth()->user();
        $availableLeave = $user->leaveBalance();
    
      
        if ($validated['days_off'] > $availableLeave) {
            return back()->withErrors(['message' => 'u do not have  enough balance']);
        }
    
        Leave::create([
            'user_id' => $user->id,
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'days_off' => $validated['days_off'],
            'status' => 'pending',
        ]);
    
        return redirect()->back()->with('success', 'the request sended successfully..!');
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
        $leave = Leave::findOrFail($id);  // Find the leave request by ID
    return view('administrations.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validate the request data
    $validated = $request->validate([
        'days_off' => 'required|integer|min:1',
        'description' => 'required|string',
        'start_date' => 'required|date|after_or_equal:today',
    ]);
    
    $leave = Leave::findOrFail($id);  // Find the leave request by ID

    // Update the leave request with validated data
    $leave->update([
        'description' => $validated['description'],
        'start_date' => $validated['start_date'],
        'days_off' => $validated['days_off'],
    ]);

    // Redirect back with a success message
    return redirect()->route('administrations.index')->with('success', 'Leave request updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    /**
 * Remove the specified resource from storage.
 */
    public function destroy(string $id)
    {
        $leave = Leave::findOrFail($id); 
        $leave->delete();

        return redirect()->route('administrations.index')->with('success', 'Leave request deleted successfully!');
    }

}
