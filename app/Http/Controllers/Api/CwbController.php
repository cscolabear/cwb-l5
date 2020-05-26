<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     version="0.1",
 *     title="Task Resource OpenApi",
 *     @OA\Contact(
 *         name="Cola",
 *         email="cola@bear.io"
 *     )
 * )
 */
class CwbController extends Controller
{
    /**
     * source: https://opendata.cwb.gov.tw/dist/opendata-swagger.html
     *
     * @OA\Get(
     *     path="/api/cwb/{county}",
     *     tags={"cwb", "open-api"},
     *     operationId="fetchWeatherByCounty",
     *
     *     @OA\Parameter(
     *         name="county",
     *         description="輸入中文. e.g. 臺北市、臺中市",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="string",
     *             enum={"臺北市", "臺中市"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="ok",
     *     )
     * )
     */
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
