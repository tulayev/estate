<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\ContactFormSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function submit(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string|max:5000',
            ]);

            // Create submission record for logging
            $submission = ContactFormSubmission::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message'],
                'ip_address' => $request->getClientIp(),
                'user_agent' => $request->userAgent(),
                'status' => 'pending',
            ]);

            // Send email
            try {
                Mail::to(config('mail.from.address'))
                    ->send(new ContactFormMail($submission));

                // Update status to sent with timestamp
                $submission->update([
                    'status' => 'sent',
                    'sent_at' => now()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => __('general.contact_success')
                ]);

            } catch (\Exception $e) {
                // Update status to failed
                $submission->update([
                    'status' => 'failed',
                    'error_message' => $e->getMessage()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => __('general.contact_error')
                ], 500);
            }

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('general.contact_error')
            ], 500);
        }
    }
}
