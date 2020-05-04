<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class CwbController extends Controller
{
    // https://opendata.cwb.gov.tw/dist/opendata-swagger.html
    public function get(string $county)
    {
        $urlencode_county = urlencode($county);
        $token = env('OPENDATA_CWB_GOV_TW_TOKEN');
        $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization={$token}&locationName={$urlencode_county}";

        $arr_context_options = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];

        try {
            $response = file_get_contents(
                $url,
                false,
                stream_context_create($arr_context_options)
            );
            $data = json_decode($response, true);
            $data['responseTime'] = Carbon::now('Asia/Taipei')->toDateTimeString();
            return $data;
        } catch (\Throwable $th) {
            abort(
                400,
                $th->getMessage()
            );
        }
    }
}
