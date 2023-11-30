<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContentResource;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class LessonContentController extends Controller
{
    public function index(Lesson $lesson): AnonymousResourceCollection
    {
        return ContentResource::collection($lesson->contents()->get());
    }
}
