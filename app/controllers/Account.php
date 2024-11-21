<?php
class Account extends Controller
{
  public function index()
  {
    if ($user = Session::data('user')) {
      $model = $this->model('CartModel');
      Session::data('cart', $model->getCartItems($user['id']));
    }
    
    $data['content']['type'] = 'profile';
    $data['component'] = 'account/account';
    $this->render('layouts/main', $data);
  }

  public function login_google()
  {
    require_once 'api/google-api-php-client--PHP8.2/vendor/autoload.php';

    $client = new Google_Client();
    $client->setClientId(_GOOGLE_CLIENT_ID);
    $client->setClientSecret(_GOOGLE_CLIENT_SECRET);
    $client->setRedirectUri(_GOOGLE_REDIRECT_URL);
    $client->addScope("email");
    $client->addScope("profile");

    // nếu đăng nhập tài khoản google thành công
    if (isset($_GET['code'])) {
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
      $client->setAccessToken($token['access_token']);

      // get profile info
      $google_oauth = new Google_Service_Oauth2($client);
      $google_account_info = $google_oauth->userinfo->get();

      $data = [
        'oauth_uid' => $client->getClientId(),
        'oauth_provider' => 'google',
        'first_name' => $google_account_info->familyName,
        'last_name' => $google_account_info->givenName,
        'email' => $google_account_info->email,
        'picture' => $google_account_info->picture,
      ];

      /* Kiểm tra người dùng trong Database 
       * gọi model check email trong database `users` nếu tồn tại xử lí cần thiết rồi redirect về trang mong muốn
       * nếu không tồn tại email tạo một user mới và cũng redirect về trong mong muốn
       */
      $model = $this->model('UserModel');
      $data = $model->checkUser($data);
      Session::data('user', $data);
      header('Location: ' . _WEB_ROOT . '/tai-khoan/');
    } else {
      // chuyển về lại trang login nếu chưa hoặc đăng nhập không thành công
      header('location: ' . $client->createAuthUrl());
    }
  }


  public function login_facebook()
  {
    //initialize facebook sdk
    require 'api/facebook-api/vendor/autoload.php';
    $fb = new Facebook\Facebook([
      'app_id' => _FB_ID,
      'app_secret' => _FB_SECRET,
      'default_graph_version' => _FB_API_VERSION,

    ]);
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email']; // optional

    try {
      if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
      } else {
        $accessToken = $helper->getAccessToken();
      }
    } catch (Facebook\Exceptions\facebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    if (isset($accessToken)) {
      if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
      } else {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
      }

      // redirect the user to the profile page if it has "code" GET variable
      if (isset($_GET['code'])) {
        header('Location: ' . _WEB_ROOT . '/tai-khoan/');
      }

      $profile_request = $fb->get('/me?fields=name,first_name,last_name,middle_name,email');
      $requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
      $picture = $requestPicture->getGraphUser();
      $profile = $profile_request->getGraphUser();

      $data = [
        'oauth_uid' => $profile->getId(),
        'oauth_provider' => 'facebook',
        'first_name' => $profile->getLastName() . ' ' . $profile->getMiddleName(),
        'last_name' => $profile->getFirstName(),
        'email' => $profile->getEmail(),
        'picture' => $picture['url'],
      ];

      $model = $this->model('UserModel');
      $data = $model->checkUser($data);

      Session::data('user', $data);
      header('Location: ' . _WEB_ROOT . '/tai-khoan/');
    } else {
      // replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
      $loginUrl = $helper->getLoginUrl(_FB_REDIRECT_URL, $permissions);
      header('Location: ' . $loginUrl);
    }
  }

  public function logout()
  {
    // xóa tất session của phiên đăng nhập hiện tại
    Session::delete();
    header('location: ' . _WEB_ROOT . '/tai-khoan/');
  }

  public function order() {
    $user = Session::data('user');
    $model = $this->model('OrderModel');

    $data['content']['type'] = 'order';
    
    // $data['content']['orders'] = $model->table('orders')->where('user_id', '=', $user['id'])->get();
    $data['content']['orders'] = $model->getOrder($user['id']);

    // echo '<pre>';
    // print_r($model->getOrder($user['id'], 'ordering'));
    // echo '</pre>';

    $data['component'] = 'account/account';
    $this->render('layouts/main', $data);
  }

  public function profile() {
    $data['content']['type'] = 'profile';
    $data['component'] = 'account/account';
    $this->render('layouts/main', $data);
  }
  public function address() {
    $model = $this->model('AddressModel');
    $user = Session::data('user');

    $data['content']['address'] = $model->getAddress($user['id']);
    $data['content']['type'] = 'address';
    $data['component'] = 'account/account';
    $this->render('layouts/main', $data);
  }

  public function create_order() { 
    $user = Session::data('user');
    $data = [
      'user_id' => $user['id'],
      'address_id' => Helper::input_value('addressId'),
      'payment_methods' => Helper::input_value('paymentMethod'),
      'note' =>  Helper::input_value('note'),
      'total' =>  Helper::input_value('total')
    ];
    $model = $this->model('OrderModel');
    $model->create($data);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }


  public function add_address() { 
    $user = Session::data('user');
    $data = [
      'user_id' => $user['id'],
      'full_name' => Helper::input_value('name'),
      'phone_number' => Helper::input_value('phone'),
      'address' =>  Helper::input_value('ward') .', '.  Helper::input_value('district') .', '.  Helper::input_value('city'),
      'street_address' => Helper::input_value('street_address')
    ];

    $model = $this->model('AddressModel');
    $model->table('addresses')->insert($data);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public function update_address() { 
    $data = [
      'full_name' => Helper::input_value('name'),
      'phone_number' => Helper::input_value('phone'),
      'address' =>  Helper::input_value('ward') .', '.  Helper::input_value('district') .', '.  Helper::input_value('city'),
      'street_address' => Helper::input_value('street_address')
    ];

    $model = $this->model('AddressModel');
    $model->updateData('addresses', $data, "id = " . Helper::input_value('id'));
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public function delete_address() { 
    $id = Helper::input_value('id');
    $model = $this->model('AddressModel');
    $model->deleteData('addresses', "id = " . $id);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

}