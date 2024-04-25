<?php
 
namespace App\Http\Controllers;
use Illuminate\View\View;

use Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function registerCustomer()
    {
        $reqdata = Request::all();
        $postdata = [
			'name' => $reqdata['name'],
			'email' => $reqdata['email'],
            'mobile' => $reqdata['mobile'],
            'dob' => $reqdata['dob'],
            'aadhar' => $reqdata['aadhar']
		];
        
        $api = env('CMS_BASE_API') . '/register';
        $response = Http::timeout(env('API_TIMEOUT'))->post($api, $postdata);
        if($response->status() == 200) {
			//$result = $response->json();
			$result = $response->body();
            if($result == "Success") {
                return view('login', ['email' => $postdata['email']]);
            } else {
                return view('register', ['message' => $result]);
            }
		} else {
			$result= "Failed to register with status code". $response->status();
            return view('register', ['message' => $result]);
		}
    }

    public function login()
    {
        return view('login', ['email' => '']);
    }

    public function getTelecomAllPlans()
    {
        $api = env('CMS_BASE_API') . '/plans';
        $response = Http::timeout(env('API_TIMEOUT'))->get($api);
		$result = $response->json();
        return $result;
    }

    public function getCustomerDetailsByEmail()
    {
        $reqdata = Request::all();
        $postdata = [
			'email' => $reqdata['email'],
		];
        $api = env('CMS_BASE_API') . '/customer-by-email';
        $response = Http::timeout(env('API_TIMEOUT'))->post($api, $postdata);
		$result = $response->json();
        return $result;
    }

    public function getCustomerPlan()
    {
        $reqdata = Request::all();
        $postdata = [
			'cid' => $reqdata['cid'],
		];
        $api = env('CMS_BASE_API') . '/customer-plan';
        $response = Http::timeout(env('API_TIMEOUT'))->post($api, $postdata);
        $result = $response->json();
        return $result;
    }

    public function getCustomerPlanByParam($cid)
    {
        $reqdata = Request::all();
        $postdata = [
			'cid' => $cid,
		];
        $api = env('CMS_BASE_API') . '/customer-plan';
        $response = Http::timeout(env('API_TIMEOUT'))->post($api, $postdata);
        $result = $response->json();
        return $result;
    }

    public function dashboard()
    {
       $customer_profile = $this->getCustomerDetailsByEmail();
       $telecom_plans = $this->getTelecomAllPlans();
       $customer_plan = $this->getCustomerPlanByParam($customer_profile[0]);
       if ($customer_plan == null) {
            return view('onboarding', ['profile' => $customer_profile, 'plans' => $telecom_plans]);
       } else {
            return view('dashboard', ['profile' => $customer_profile, 'plans' => $telecom_plans, 'myplan'=>$customer_plan]);
       }
    }   

    public function createCustomerPlan()
    {
        $reqdata = Request::all();
        $email = $reqdata['email']; //keeping login info without login
        $postdata = [
			'cid' => $reqdata['cid'],
			'pid' => $reqdata['pid']
		];
        
        $reg_api = env('CMS_BASE_API') . '/new-customer-plan';
        $response = Http::timeout(env('API_TIMEOUT'))->post($reg_api, $postdata);
        if($response->status() == 200) {
			//$result = $response->json();
			$result = $response->body();
            if($result == "Success"){
                return view('login', ['email' => $email]);
            } else{
                return view('login', ['email' => $email]);
            }
		} else {
			$result= "Failed to Create Customer Plan with status code". $response->status();
            return view('login', ['email' => $email]);
		}
    }

    public function changeCustomerPlan()
    {
        $reqdata = Request::all();
        $email = $reqdata['email']; //keeping login info without login
        $postdata = [
			'cid' => $reqdata['cid'],
			'opid' => $reqdata['opid'],
            'npid' => $reqdata['npid']
		];
        
        $reg_api = env('CMS_BASE_API') . '/customer-change-plan';
        $response = Http::timeout(env('API_TIMEOUT'))->post($reg_api, $postdata);
        if($response->status() == 200) {
			//$result = $response->json();
			$result = $response->body();
            if($result == "Success"){
                return view('login', ['email' => $email]);
            } else{
                return view('login', ['email' => $email]);
            }
		} else {
			$result= "Failed to Create Customer Plan with status code". $response->status();
            return view('login', ['email' => $email]);
		}
    }

    public function renewCustomerPlan()
    {
        $reqdata = Request::all();
        $email = $reqdata['email']; //keeping login info without login
        $postdata = [
			'cid' => $reqdata['cid'],
			'pid' => $reqdata['pid']
		];
        
        $reg_api = env('CMS_BASE_API') . '/customer-renew-plan';
        $response = Http::timeout(env('API_TIMEOUT'))->post($reg_api, $postdata);
        if($response->status() == 200) {
			//$result = $response->json();
			$result = $response->body();
            if($result == "Success"){
                return view('login', ['email' => $email]);
            } else{
                return view('login', ['email' => $email]);
            }
		} else {
			$result= "Failed to Create Customer Plan with status code". $response->status();
            return view('login', ['email' => $email]);
		}
    }



}