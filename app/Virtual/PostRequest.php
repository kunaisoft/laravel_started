<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="JobPost request",
 *      description="Store Post request body data",
 *      type="object",
 *      required={"title","description"}
 * )
 */
class PostRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="title of the new JobPost",
     *      example="A nice JobPost"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new JobPost",
     *      example="This is new JobPost's description"
     * )
     *
     * @var string
     */
    public $description;

}
