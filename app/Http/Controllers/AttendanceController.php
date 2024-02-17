<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Log;

class AttendanceController extends Controller
{
    //

    public function index()
    {
        $client = new Client();
        try {

            $response = $client->get('https://app.shabujglobal.com/api/user-list');
            if ($response->getStatusCode() === 200) {
                $usersData = json_decode($response->getBody());
                $users = new Collection($usersData);

                // Log the users data (optional)
                Log::info($users);

                // Return view with users data
                return view('attendance', compact('users'));
            } else {

                return response()->json(['error' => 'Failed to fetch users from API'], $response->getStatusCode());
            }
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function submitAttendance(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'email' => 'required|exists:users,id',
        ]);

        $attendanceCount = Attendance::where('user_id', $request->email)
            ->whereDate('created_at', now()->toDateString())
            ->count();
        if ($attendanceCount == 0) {
            $attendanceType = 'in';
        } elseif ($attendanceCount == 1) {
            $attendanceType = 'out';
        } else {
            return response()->json(['message' => 'Both attendance entries already done for the day'], 400);
        }
        $base64Image = $request->input('image');
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        $imageName = 'image_' . uniqid() . '.png';

        Storage::disk('public')->put('attendance_images/' . $imageName, $imageData, 'public');
        $imagePath = 'attendance_images/' . $imageName;

        $attendance = new Attendance();
        $attendance->user_id = $request->email;
        $attendance->user_image = $imagePath;
        $attendance->attendance_type = $attendanceType;
        $attendance->save();
        return response()->json(['message' => 'Attendance submitted successfully'], 200);
    }
}
