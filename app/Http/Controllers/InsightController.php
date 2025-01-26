<?php

namespace App\Http\Controllers;

use App\Models\TopicLike;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

        if (!$topic) {
            abort(404);
        }

        $similarTopics = Topic::active()
            ->inrandomOrder()
            ->limit(10)
            ->get();

        // Use cache to track views
        $cacheKey = 'topic_' . $slug . '_viewed';

        if (!Cache::has($cacheKey)) {
            $topic->increment('views');
            Cache::put($cacheKey, true, now()->addMinutes(30)); // Prevent duplicate views for 30 minutes
        }

        return view('pages.insight.show', [
            'topic' => $topic,
            'similarTopics' => $similarTopics,
        ]);
    }

    public function like(Request $request, $topicId): JsonResponse
    {
        $topic = Topic::active()
            ->findOrFail($topicId);

        if (!$topic) {
            return response()
                ->json(['message' => 'Topic not found'], 404);
        }

        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        $existingLike = TopicLike::where('topic_id', $topicId)
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->first();

        if ($existingLike) {
            $existingLike->delete();

            return response()
                ->json([], 204);
        }

        TopicLike::create([
            'topic_id' => $topicId,
            'liked_by' => $userId,
            'ip_address' => $userId ? null : $ipAddress,
        ]);

        return response()
            ->json([], 201);
    }
}
