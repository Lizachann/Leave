<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'position_staff',
        'gender',
        'dob',
        'department',
        'address',
        'av_leave',
        'phone_num',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
//
//class User extends Authenticatable implements MustVerifyEmail
//{
//    use HasApiTokens, HasFactory, Notifiable;
//
//    protected $fillable = [
//        'first_name',
//        'last_name',
//        'email',
//        'password',
//        'position_staff',
//        'gender',
//        'dob',
//        'department',
//        'address',
//        'av_leave',
//        'phone_num',
//        'role',
//
//    ];
//
//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];
//}
//
//// Verification Email Notification
//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Messages\MailMessage;
//use Illuminate\Notifications\Notification;
//
//class VerifyEmailNotification extends Notification implements ShouldQueue
//{
//    use Queueable;
//
//    public function via($notifiable)
//    {
//        return ['mail'];
//    }
//
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//            ->subject('Verify your email address')
//            ->line('Click the button below to verify your email address.')
//            ->action('Verify Email', route('verification.verify', $notifiable->verification_token));
//    }
//}
//
//// Verification Route
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\VerificationController;
//
//Route::get('/email/verify/{token}', [VerificationController::class, 'verify'])->name('verification.verify');
//
//// Verification Controller
//use App\Models\User;
//
//class VerificationController extends Controller
//{
//    public function verify($token)
//    {
//        $user = User::where('verification_token', $token)->firstOrFail();
//        $user->email_verified = true;
//        $user->save();
//
//        return redirect()->route('home')->with('success', 'Your email has been verified.');
//    }
//}
