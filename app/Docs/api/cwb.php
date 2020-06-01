<?php

/**
 * @OA\Get(
 *      path="/api/cwb/{county}",
 *      operationId="cwb",
 *      tags={"cwb"},
 *      summary="取得中央氣象局 opendata api",
 *      description="county 指定縣市",
 *
 *     @OA\Parameter(
 *         name="county",
 *         description="輸入中文縣市. e.g. 臺北市、臺中市",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="string",
 *             enum={"臺北市", "新北市", "臺中市", "臺南市"},
 *         )
 *     ),

 *      @OA\Response(
 *          response=200,
 *          description="請求成功"
 *       )
 * )
 * Returns list of articles
 */
