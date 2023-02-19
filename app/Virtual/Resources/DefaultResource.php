<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="DefaultResource",
 *     description="Default Resource",
 *     @OA\Xml(
 *         name="DefaultResource"
 *     )
 * )
 */
class DefaultResource
{

    /**
     * @OA\Property(
     *     title="Success",
     *     description="Status",
     *     type="boolean",
     *     example="true"
     * )
     *
     */
    private $success;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper",
     *     type="object"
     * )
     *
     */
    private $data;

}
