<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use Illuminate\Http\Request;

    public function likePost(Request $request, $topicId)
    {
        $topic = Topic::findOrFail($topicId);

        if (!$topic) {
            return response()->json(['message' => 'Topic not found'], 404);
        }

        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        // Check if the user/IP has already liked the post
        $existingLike = Like::where('topic_id', $topicId)
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->first();

        if ($existingLike) {
            return response()->json(['message' => 'You have already liked this post'], 409);
        }

        // Add the like
        Like::create([
            'post_id' => $topicId,
            'user_id' => $userId,
            'ip_address' => $userId ? null : $ipAddress,
        ]);

        return response()->json(['message' => 'Post liked successfully'], 201);
    }

    public function getLikes($topicId)
    {
        $topic = Topic::findOrFail($topicId);

        if (!$topic) {
            return response()->json(['message' => 'Topic not found'], 404);
        }

        $likesCount = $topic->likes()->count();

        return response()->json(['likes_count' => $likesCount], 200);
    }
}
