<?php

namespace ListaShop\Api\V1\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use ListaShop\Customer\Models\Customer;
use ListaShop\Api\Traits\TokensManagerTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use TokensManagerTrait;

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
  
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        return $this->issuePasswordToken($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => ['required', 'digits:11'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = Customer::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone'),
            'password' => bcrypt($request->get('password')),
        ]);

        return $this->issuePasswordToken($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function refresh(Request $request)
    {

        $request->validate([
            'refresh_token' => 'required',
        ]);
        return $this->issueRefreshToken($request);
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => '1']);

        $accessToken->revoke();

        return response()->json(['message' => 'You Logged out Successfully',], 200);
    }

}
