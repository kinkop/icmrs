<?php

class BaseController extends Controller {

    protected $layoutName = '';
    protected $teeplusTheme;
    protected $loginUserId;
    protected $message;
    protected $loginUserDetail;
    protected $theme = 'default';

    function __construct() {
        $this->teeplusTheme = Theme::uses($this->theme)->layout($this->layoutName);

        $this->loginUserId = null;
        $isLogin = false;
        $userDetail = null;
        if (Auth::check()) {
            $this->loginUserId = Auth::user()->id;
            $isLogin = true;
            $userDetail = UserDetail::where('user_id', $this->loginUserId)->first()->toArray();
            $this->loginUserDetail = $userDetail;
        }

        Theme::setLoginUserDetail($userDetail);
        Theme::setLoginUserId($this->loginUserId);
        Theme::setIsLogin($isLogin);

        $this->setPageTitle('');
        $this->setPageSubTitle('');

        $this->message = new Illuminate\Support\MessageBag(array());
    }


/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function render($view, $data = array())
    {
        return $this->teeplusTheme->scope($view, $data)->render();
    }

    protected function json($status, $message = '', $data = array())
    {
        $output = array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        );
        return Response::json($output);
    }

    protected function setPageTitle($title)
    {
        Theme::setPageTitle($title);
    }

    protected function setPageSubTitle($title)
    {
        Theme::setPageSubTitle($title);
    }

    protected function getMessageOutput($delimeter = '')
    {
        $output['messages'] = $this->message->all();
        $output['messages_format'] = $this->message->all($delimeter);
        $output['messages_raw'] = implode('', $output['messages_format']);

        return $output;

    }

    protected function setBreadcrumbsContent($datas = array(), $site = 'frontend')
    {
        $homeUrl = '';
        $partial = '';
        switch ($site) {
            case 'frontend':
                $homeUrl = URL::to('');
                $partial = 'breadcrumb.frontend';
                break;
            case 'admin':
                $homeUrl = URL::to('admin');
                $partial = 'breadcrumb.admin';
                break;
            default:
                $homeUrl = URL::to('');
                $partial = 'breadcrumb.frontend';
                break;
        }

        if (empty($datas)) {
            $homeUrl = '';
        }

        $dashboard = array(
            array(
                'name' => 'Dashboard',
                'url' => $homeUrl
            )
        );

        $datas = array_merge($dashboard, $datas);
        $result = Theme::partial($partial, array('datas' => $datas));
        Theme::setBreadcrumbsContent($result);
    }

    protected function setActiveMenu($menuName = 'home')
    {
        Theme::setActiveMenu($menuName);
    }

}
