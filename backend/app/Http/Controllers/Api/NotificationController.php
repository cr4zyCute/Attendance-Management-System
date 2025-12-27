<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    /**
     * Get all notifications for the authenticated user
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $guard = $request->attributes->get('guard', 'student');
        
        $query = Notification::query();
        
        if ($guard === 'student') {
            $query->forStudent($user->id);
        } else {
            $query->forTeacher($user->id);
        }
        
        $notifications = $query->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page', 15));
        
        return response()->json([
            'success' => true,
            'data' => $notifications
        ]);
    }

    /**
     * Get unread notifications count and recent notifications for dropdown
     */
    public function dropdown(Request $request): JsonResponse
    {
        $user = $request->user();
        $guard = $request->attributes->get('guard', 'student');
        
        $query = Notification::query();
        
        if ($guard === 'student') {
            $query->forStudent($user->id);
        } else {
            $query->forTeacher($user->id);
        }
        
        $unreadCount = (clone $query)->unread()->count();
        $recentNotifications = $query->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'type' => $notification->type,
                    'title' => $notification->title,
                    'message' => $notification->message,
                    'time' => $notification->created_at->diffForHumans(),
                    'read' => $notification->isRead(),
                ];
            });
        
        return response()->json([
            'success' => true,
            'unread_count' => $unreadCount,
            'notifications' => $recentNotifications
        ]);
    }

    /**
     * Mark a notification as read
     */
    public function markAsRead(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        $guard = $request->attributes->get('guard', 'student');
        
        $query = Notification::query();
        
        if ($guard === 'student') {
            $query->forStudent($user->id);
        } else {
            $query->forTeacher($user->id);
        }
        
        $notification = $query->findOrFail($id);
        $notification->markAsRead();
        
        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read'
        ]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(Request $request): JsonResponse
    {
        $user = $request->user();
        $guard = $request->attributes->get('guard', 'student');
        
        $query = Notification::query();
        
        if ($guard === 'student') {
            $query->forStudent($user->id);
        } else {
            $query->forTeacher($user->id);
        }
        
        $query->unread()->update(['read_at' => now()]);
        
        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read'
        ]);
    }

    /**
     * Delete a notification
     */
    public function destroy(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        $guard = $request->attributes->get('guard', 'student');
        
        $query = Notification::query();
        
        if ($guard === 'student') {
            $query->forStudent($user->id);
        } else {
            $query->forTeacher($user->id);
        }
        
        $notification = $query->findOrFail($id);
        $notification->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Notification deleted'
        ]);
    }
}
