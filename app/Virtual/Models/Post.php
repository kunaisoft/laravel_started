<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Post",
 *     description="Post model",
 *     @OA\Xml(
 *         name="Post"
 *     )
 * )
 */
class Post
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="uuid",
     *      description="UUID",
     *      example="8eb1be3a-3eee-4313-bfd9-8e936e3b3517"
     * )
     *
     * @var string
     */
    public $uuid;

    /**
     * @OA\Property(
     *      title="User ID",
     *      description="User's id of the new project",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="Title",
     *      description="Title of the New Job Post",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the Job Post",
     *      example="This is Job Post's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
    */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

}
