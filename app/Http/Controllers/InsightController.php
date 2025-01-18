<?php

namespace App\Http\Controllers;

use App\Models\TopicLike;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InsightController extends Controller
{
    public function index(): View
    {
        $topics = Topic::active()->get();

        return view('pages.insight.index', [
            'topics' => $topics,
        ]);
    }

    public function show($slug): View
    {
        $topic = Topic::active()
            ->where('slug', $slug)
            ->first();

        $similarTopics = Topic::active()
            ->inrandomOrder()
            ->limit(10)
            ->get();

        if (!$topic) {
            abort(404);
        }

        return view('pages.insight.show', [
            'topic' => $topic,
            'similarTopics' => $similarTopics,
        ]);
    }

    public function like(Request $request, $topicId): JsonResponse
    {
        $topic = Topic::findOrFail($topicId);

        if (!$topic) {
            return response()
                ->json(['message' => 'Topic not found'], 404);
        }

        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        // Check if the user/IP has already liked the topic
        $existingLike = TopicLike::where('topic_id', $topicId)
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->first();

        if ($existingLike) {
            // Remove the existing like
            $existingLike->delete();

            return response()
                ->json(['message' => 'Like removed successfully']);
        }

        TopicLike::create([
            'topic_id' => $topicId,
            'liked_by' => $userId,
            'ip_address' => $userId ? null : $ipAddress,
        ]);

        return response()
            ->json(['message' => 'Topic liked successfully'], 201);
    }

    public function likes($topicId): JsonResponse
    {
        $topic = Topic::findOrFail($topicId);

        if (!$topic) {
            return response()
                ->json(['message' => 'Topic not found'], 404);
        }

        $likesCount = $topic->likes()->count();

        return response()
            ->json(['likes_count' => $likesCount]);
    }

    public function likedByUser(Request $request): JsonResponse
    {
        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        // Fetch the topics liked by the user or their IP address
        $likedTopics = TopicLike::query()
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->with('topic')
            ->get();

        return response()
            ->json($likedTopics);
    }
}
