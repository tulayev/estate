<h1>Verify your email</h1>
<p>Your verification code is:</p>
<h2>{{ $subscriber->verification_code }}</h2>
<p>It expires at {{ $subscriber->verification_expires_at->format('Y-m-d H:i') }}</p>
