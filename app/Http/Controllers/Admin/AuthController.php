<?php

namespace App\Http\Controllers\Admin;

use App\Constants\AuthConstant;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * View login
     *
     * @return void
     */
    public function viewLogin()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $data = $request->only(['email', 'password', '_token']);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $inputUpdate = [
                AuthConstant::LAST_LOGIN => Carbon::now(),
                AuthConstant::REMEMBER_TOKEN => $data['_token']
            ];
            $this->userRepository->update(Auth::user(), $inputUpdate);
            Cookie::queue('remember_token', $data['_token'], 21600);
        }

        return redirect()->route('index');
    }

    /**
     * @return Application|Factory|View
     */
    public function viewRegister()
    {
        $emailList = $this->userRepository->getByCondition([], [AuthConstant::INPUT_EMAIL])->toArray();

        return view('auth.register', compact('emailList'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function register(Request $request)
    {
        try {
            $input = $request->all();
            $userInput = [
                AuthConstant::INPUT_FIRST_NAME => $input[AuthConstant::INPUT_FIRST_NAME],
                AuthConstant::INPUT_LAST_NAME => $input[AuthConstant::INPUT_LAST_NAME],
                AuthConstant::INPUT_EMAIL => $input[AuthConstant::INPUT_EMAIL],
                AuthConstant::INPUT_PASSWORD => Hash::make($input[AuthConstant::INPUT_PASSWORD]),
            ];
            $this->userRepository->create($userInput);
        } catch (\Exception $exception) {
            Log::error('Create user: ' . $exception);
        }

        return view('auth.login')->with('Account successfully created');
    }
}
