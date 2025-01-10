<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/v1/testing",function(){
$data = json_decode('{
        "code": "ct-200",
        "message": "ok",
        "success": true,
        "response": {
                "id": 15299960,
                "ref": "VPE-15299960",
                "date": "10/01/2025",
                "trim": "GLE 450",
                "year": 2023,
                "model": "GLE-Class",
                "lower_limit": 243473,
                "upper_limit": 297897,
                "manufacturer": "Mercedes Benz",
                "specifications": {
                        "axel": "2",
                        "drive": "AWD",
                        "liter": "3",
                        "width": "2010",
                        "height": "1797",
                        "length": "4924",
                        "weight": null,
                        "body_type": "SUV",
                        "fuel_type": "Petrol 95",
                        "top_speed": "250",
                        "wheelbase": "2995",
                        "engine_type": "Gasoline",
                        "acceleration": "5.6",
                        "engine_power": "381",
                        "gearbox_type": "Automatic",
                        "power_torque": "500",
                        "vehicle_type": "Car",
                        "fuel_capacity": "85",
                        "engine_turbine": "Turbo",
                        "trunk_capacity": "630 - 2055",
                        "engine_cylinder": "6 Cylinders",
                        "number_of_doors": 5,
                        "number_of_gears": "9",
                        "fuel_consumption": "10.5",
                        "number_of_passengers": "5"
                },
                "evaluated_price": 286439,
                "safety_features": {
                        "airbags": "yes",
                        "seatbelt": "yes",
                        "parking_sensors": "yes",
                        "anti_lock_brakes": "yes",
                        "heads_up_display": "no",
                        "rear_view_camera": "yes",
                        "traction_control": "no",
                        "anti_theft_device": "yes",
                        "driver_monitoring": "yes",
                        "blind_spot_warning": "yes",
                        "adaptive_headlights": "yes",
                        "lane_keeping_assist": "no",
                        "pedestrian_detection": "no",
                        "tire_pressure_monitor": "yes",
                        "daytime_running_lights": "yes",
                        "dynamic_turning_lights": "no",
                        "lane_departure_warning": "no",
                        "adaptive_cruise_control": "yes",
                        "forward_collision_warning": "yes",
                        "electronic_stability_control": "yes"
                },
                "reliability_index_score": "90"
        }
}', true);
// dd($data);
return response()->json(["data"=>$data]);
});