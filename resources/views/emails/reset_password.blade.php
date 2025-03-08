<p>Hello {{ $user->name }},</p>
<p>Your account has been created. Please set a new password using the link below:</p>
<a href="{{ url('/reset-password/'.$user->reset_token) }}">Reset Password</a>
<p>If you did not request this, you can ignore this email.</p>
<p>HR-</p>
