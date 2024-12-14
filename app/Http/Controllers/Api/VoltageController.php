<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voltage;
use Illuminate\Support\Facades\Validator;

class VoltageController extends Controller
{
    /**
     * Create Data
     */
    public function store(Request $request)
    {
        //validation data
        $validator = Validator::make($request->all(), [
            'time'      => 'required',
            'voltage'   => 'required',
        ],
            [
                'time.required' => 'Masukkan Waktu Voltage!',
                'voltage.required' => 'Masukkan Voltage Data!',
            ]
        );
        
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan isi data yang masih kosong!',
                'data'    => $validator->errors()
            ], 401);
        } else {
            $voltage = Voltage::create([
                'time'      => $request->input('time'),
                'voltage'   => $request->input('voltage'),
            ]);
        
            if ($voltage) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan',
                ], 200);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data gagal disimpan',
                ], 401);
            }
        }

    }

    /**
     * Get All Data
     */
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $date = $request->input('date');

        $voltageQuery = Voltage::query();

        if ($startDate && $endDate) {
            $voltageQuery->whereBetween('created_at', [$startDate, $endDate]);
        } else if ($date) {
            $voltageQuery->whereDate('created_at', $date);
        }

        // Ambil data dengan urutan rentan terbaru
        $voltage = $voltageQuery->latest()->get();

        return response([
            'success' => true,
            'message' => 'Data Voltage',
            'data'  => $voltage
        ], 200);
    }
    /**
     * Get data by Id
     */
    public function show($id)
    {
        $voltage = Voltage::whereId($id)->first();

        if ($voltage) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Voltage',
                'data'    => $voltage
            ], 200);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Voltage Tidak Ditemukan',
                'data'      => ''
            ], 401);
        }
    }

    /**
     * Update data
     */
    public function update(Request $request)
    {
        // validate data
        $validator = Validator::make($request->all(), [
            'time'      => 'required',
            'voltage'   => 'required',
        ],
            [
                'time.required' => 'Masukkan Waktu Voltage!',
                'voltage.required' => 'Masukkan Voltage Data!',
            ]
        
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan isi data yang masih kosong!',
                'data'    => $validator->errors()
            ], 401);
        } else {
            $voltage = Voltage::whereId($request->input('id'))->update([
                'time'  => $request->input('time'),
                'voltage' => $request->input('voltage'),
            ]);

            if ($voltage) {
                return response()->json([
                    'success'   => true,
                    'message'   => 'Data berhasil diperbaharui',
                ], 200);
            } else {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data gagal diperbaharui',
                ], 401);
            }
        }
    }

    /**
     * Delete data
     */
    public function destroy($id)
    {
        $voltage = Voltage::findOrFail($id);
        $voltage->delete();

        if ($voltage) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus!',
            ], 400);
        }
    }

}
