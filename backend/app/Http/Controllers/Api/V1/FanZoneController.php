<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FanZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FanZoneController extends Controller
{
    public function index()
    {
        return FanZone::with('city')->get()->map(function($fz) {
            return [
                'id'           => $fz->id,
                'city_id'      => $fz->city_id,
                'city_name'    => $fz->city?->name,
                'zone_label'   => $fz->zone_label,
                'description'  => $fz->description,
                'image_url'    => $fz->image_url,
                'location_url' => $fz->location_url,
                'capacity'     => $fz->capacity,
            ];
        });
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city_id'      => 'required|exists:cities,id',
            'zone_label'   => 'required|string|max:150',
            'description'  => 'nullable|string',
            'location_url' => 'nullable|string',
            'image_url'    => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'capacity'     => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fan_zones', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $validated['stadium_name'] = 'Official Fan Zone';
        $validated['capacity']     = $validated['capacity'] ?? 'Various';
        $validated['matches_count'] = 64;
        $validated['address']      = 'Official Site';
        $validated['group_label']  = 'Official';
        $validated['status']       = 'active';

        return FanZone::create($validated);
    }

    public function show($id)
    {
        return FanZone::with('city')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $fz = FanZone::findOrFail($id);
        
        $validated = $request->validate([
            'city_id'      => 'sometimes|required|exists:cities,id',
            'zone_label'   => 'sometimes|required|string|max:150',
            'description'  => 'nullable|string',
            'location_url' => 'nullable|string',
            'image_url'    => 'nullable|string',
            'image'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'capacity'     => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists in storage
            if ($fz->image_url && str_contains($fz->image_url, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $fz->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            
            $path = $request->file('image')->store('fan_zones', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $fz->update($validated);
        return $fz;
    }

    public function destroy($id)
    {
        $fz = FanZone::findOrFail($id);
        
        // Delete image from storage
        if ($fz->image_url && str_contains($fz->image_url, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $fz->image_url);
            Storage::disk('public')->delete($oldPath);
        }

        $fz->delete();
        return response()->noContent();
    }
}
